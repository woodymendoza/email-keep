<?php

namespace EMAIL_KEEP;

class EmailKeep
{
    private $type;
    private $plugin_slug;
    private $version;
    private $option_name;
    private $settings;

    public function __construct($plugin_slug, $version, $option_name, $type)
    {
        $this->type = $type;
        $this->plugin_slug = $plugin_slug;
        $this->version = $version;
        $this->option_name = $option_name;
        $this->settings = get_option($this->option_name);
    }

    private function getLocation()
    {
        if ($this->type == 'admin') {
            return is_admin();
        }

        return !is_admin();
    }

    public function mail_catch($args)
    {
        $location_check = $this->getLocation();
        if ($this->settings['is-active'] == 'yes' && $this->settings['is-active-'.$this->type] == 'yes' && $location_check) {
            if ($this->settings['keep-options'] == 'all' || ($this->settings['keep-options'] == 'keyword' && $this->look_for_keyword($args['subject'], $this->settings['subject-keywords']))) {
                $this->email_keep($args);
            }
        }

        return $args;
    }

    public function email_keep($args)
    {
        global $wpdb;
        $table_name = $wpdb->prefix.'email_keep';
        $from = $this->extract_email($args['message']);
        $wpdb->insert($table_name, array('to' => $args['to'], 'from' => $from, 'subject' => $args['subject'], 'message' => $args['message'], 'date' => current_time('mysql'), 'type' => $this->type));

        return true;
    }

    private function extract_email($string)
    {
        $pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
        preg_match_all($pattern, $string, $matches);

        return (empty($matches[0]) || empty($matches[0][0])) ? 'System Sent' : $matches[0][0];
    }

    private function look_for_keyword($subject, $keywords)
    {
        $keywords = explode(',', $keywords);
        foreach ($keywords as $keyword) {
            if (strpos(strtolower($subject), strtolower(trim($keyword))) !== false) {
                return true;
            }
        }

        return false;
    }
}
