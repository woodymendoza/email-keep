<?php

namespace PLUGIN_NAME;

/**
 * The code used in the admin.
 */
class Admin
{
    private $plugin_slug;
    private $version;
    private $option_name;
    private $settings;
    private $settings_group;

    public function __construct($plugin_slug, $version, $option_name) {
        $this->plugin_slug = $plugin_slug;
        $this->version = $version;
        $this->option_name = $option_name;
        $this->settings = get_option($this->option_name);
        $this->settings_group = $this->option_name.'_group';
    }

    /**
     * Generate settings fields by passing an array of data (see the render method).
     *
     * @param array $field_args The array that helps build the settings fields
     * @param array $settings   The settings array from the options table
     *
     * @return string The settings fields' HTML to be output in the view
     */
    private function custom_settings_fields($field_args, $settings) {
        $output = '<p>Below are your global settings for this plugin</p>';

        if ( $settings['is-active'] == 'no' ) {
            $output .= '<div class="notice notice-warning is-dismissible email-keep-msg" style="display: none;">
                        <p>This plugin is currently not active, you can activate it below. </p>
                    </div>';
        }

        foreach ($field_args as $field) {
            $slug = $field['slug'];
            $setting = $this->option_name.'['.$slug.']';
            $id = 'email-keep-'.$slug;
            $label = esc_attr__($field['label'], 'email-keep');
            $output .= '<div class="'.$id.'">';
            $output .= '<label for="'.$setting.'"><strong>'.$label.'</strong></label>';

            if ($field['type'] === 'text') {
                $output .= '<input type="text" id="'.$id.'" name="'.$setting.'" value="'.$settings[$slug].'">';
            } elseif ($field['type'] === 'textarea') {
                $output .= '<p><textarea id="'.$id.'" name="'.$setting.'" rows="10">'.$settings[$slug].'</textarea></p>';
            }
            elseif ($field['type'] === 'select') {
                $output .= '<p><select id="'.$id.'" name="'.$setting.'">';
                foreach ($field['options'] as $key => $option){
                        $selected = ($settings[$slug] == $key) ? 'selected' : '';
                        $output .= '<option value="'.$key.'" '.$selected.'>'.$option.'</option>';
                }
                $output .= '</select></p>';
            }
            $output .= '</div>';
        }

        return $output;
    }

    public function assets() {
        wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', [], $this->version );
        wp_enqueue_style( 'load-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab', [], $this->version );
        wp_enqueue_style($this->plugin_slug, plugin_dir_url(__FILE__).'css/email-keep-admin.css', [], $this->version);
        wp_enqueue_script($this->plugin_slug, plugin_dir_url(__FILE__).'js/email-keep-admin.js', ['jquery'], $this->version, true);
    }

    public function register_settings() {
        register_setting($this->settings_group, $this->option_name);
    }

    public function add_menus() {
        $plugin_name = Info::get_plugin_title();
        add_submenu_page(
            'options-general.php',
            $plugin_name,
            $plugin_name,
            'manage_options',
            $this->plugin_slug,
            [$this, 'Keep_settings']
        );
        add_menu_page(
            'Email Keep Inbox',
            'Email Keep',
            'manage_options',
            $this->plugin_slug.'/inbox',
            [$this, 'keep_inbox'],
            'dashicons-email',
            60
        );
    }

    /**
     * Render the view using MVC pattern.
     */
    public function keep_settings() {

        // Generate the settings fields
        $field_args = [
            [
                'label'         => 'Is Active',
                'slug'          => 'is-active',
                'description'   => '',
                'type'          => 'select',
                'options'       =>  [
                                        'yes' => 'yes',
                                        'no'  => 'no'
                                    ]
            ],
            [
                'label'         => 'Keep Options',
                'slug'          => 'keep-options',
                'description'   => '',
                'type'          => 'select',
                'options'       =>  [
                    'all' => 'keep all email',
                    'keyword'  => 'keep all email with specific subject keyword(s)'
                ]
            ],
            [
                'label'        => 'Subject Keyword(s)',
                'slug'         => 'subject-keywords',
                'description'  => '',
                'type'         => 'text'
            ],
            [
                'label'         => 'Keep Emails sent via the front end',
                'slug'          => 'is-active-frontend',
                'description'   => 'Emails that are sent through the public facing side of your site. Like contact us or lead forms.',
                'type'          => 'select',
                'options'       =>  [
                                        'yes' => 'yes',
                                        'no'  => 'no'
                                    ]
            ],
            [
                'label'         => 'Keep Emails sent via the admin',
                'slug'          => 'is-active-admin',
                'description'   => 'Emails that are sent through the admin section.',
                'type'          => 'select',
                'options'       =>  [
                                        'yes' => 'yes',
                                        'no'  => 'no'
                                    ]
            ]
        ];

        // Model
        $settings = $this->settings;

        // Controller
        $fields = $this->custom_settings_fields($field_args, $settings);
        $settings_group = $this->settings_group;
        $heading = Info::get_plugin_title();
        $submit_text = esc_attr__('Submit', 'email-keep');

        // View
        require_once plugin_dir_path(dirname(__FILE__)).'admin/partials/view.php';
    }

    private function get_emails($type) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'email_keep';
        $query = $wpdb->prepare( "SELECT * FROM ".$table_name." WHERE `status` = %s ORDER BY email_keep_id DESC", array($type) );
        $emails = $wpdb->get_results($query);

        if($count){
            return count($emails);
        }

        return $emails;
    }

    private function update_status(){
        if (isset($_POST["action"]) && isset($_POST["selected_emails"])) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'email_keep';
            if ($_POST["action"] == 'deleted' && $_POST["type"] == 'deleted'){
                $query = $wpdb->prepare("DELETE FROM " . $table_name . " WHERE `email_keep_id` IN  (" . implode(",", $_POST["selected_emails"]) . ")", array($_POST["action"]));
            } else {
                $query = $wpdb->prepare("UPDATE " . $table_name . " SET status=%s WHERE `email_keep_id` IN  (" . implode(",", $_POST["selected_emails"]) . ")", array($_POST["action"]));
            }
            $wpdb->query($query);

        }
        return true;
    }

    private function get_email_counts() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'email_keep';
        $query = "SELECT `status`, COUNT(*) as 'total' FROM ".$table_name." GROUP BY `status`";
        $totals = $wpdb->get_results($query);

        $counts = [
            'new' => 0,
            'read' => 0,
            'deleted' => 0
        ];

        foreach ($totals as $total) {
            $counts[$total->status] = $total->total;
        }

        return $counts;
    }

    /**
     * Render the view using MVC pattern.
     */
    public function keep_inbox() {

        $this->update_status();

        // Model
        $type = (isset($_GET['type'])) ? $_GET['type'] : 'new';
        $emails = $this->get_emails($type);
        $counts = $this->get_email_counts();

        // View
        require_once plugin_dir_path(dirname(__FILE__)).'admin/partials/inbox.php';
    }

}
