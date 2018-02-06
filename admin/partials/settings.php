<div class="wrap mail-keep">
    <?php include 'header.php' ?>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <form action="options.php" method="post">
                    <?php settings_fields($settings_group); ?>
                    <?= $fields ?>
                    <div class="submit-wrap">
                        <?php submit_button($submit_text); ?>
                        <div class="spinner"></div>
                    </div>
                </form>
            </div>
        </div>
        <br class="clear">
    </div>
</div>