<?php
$bf_browser_name = get_option('bf_browser_name');
$bf_os_name = get_option('bf_os_name');
$bf_clean_class = get_option('bf_clean_class');
?>
<div class="wrap">
    <?php echo "<h2>" . __('About Browser and Operating System Name Finder', 'browser_trdom') . "</h2>"; ?>
    <?php
    echo "<pre>" . __('This plugin is used to add browser name and OS name in body tag class attribute<br>For e.g:<br>'
            . '&lt;body class=".... browser-firefox os-windows"&gt;<br>'
            . '&lt;body class=".... browser-chrome os-apple"&gt;<br>'
            . '&lt;body class=".... browser-safari os-iphone"&gt;<br>'
            . '&lt;body class=".... browser-chrome os-android"&gt;<br>') . "</pre>";
    ?>

    <form name="browser_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	    <?php wp_nonce_field( 'bf_nonce_action', 'bf_nonce_check' ); ?>
	    <input type="hidden" name="bf_browser_hidden" value="Y">
        <?php echo "<h2>" . __('General Settings', 'browser_trdom') . "</h2>"; ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="bf_browser_name"><?php _e("Browser Name Prefix"); ?></label></th>
                    <td><input style="text-transform:lowercase" type="text" class="regular-text" id="bf_browser_name" name="bf_browser_name" value="<?php echo $bf_browser_name; ?>">
                        <p class="description">For e.g. <strong>browser</strong>-firefox</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="bf_os_name"><?php _e("OS Name Prefix"); ?></label></th>
                    <td><input style="text-transform:lowercase" type="text" class="regular-text" id="bf_os_name" name="bf_os_name" value="<?php echo $bf_os_name; ?>">
                        <p class="description">For e.g. <strong>os</strong>-windows</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="bf_clean_class"><?php _e("Clear existing classes"); ?></label></th>
                    <td>
                        <label>
                            <input type="radio" <?php echo ($bf_clean_class) ? 'checked="checked"' : '' ?> value="1" name="bf_clean_class">
                            <abbr title="This will clear all existing classes">Yes</abbr>
                        </label>
                        <label>
                            <input type="radio" <?php echo ($bf_clean_class == 0) ? 'checked="checked"' : '' ?>  value="0" name="bf_clean_class">
                            No
                        </label>
                        <p class="description">For e.g. <strong>&lt;body class="homepage is_login <strong>browser-firefox os-windows</strong>"&gt;</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" class="button button-primary" name="Submit" value="<?php _e('Update Settings', 'browser_trdom') ?>" />
            <input type="button" class="button button-primary" name="reset" value="<?php _e('Reset All', 'browser_trdom') ?>" onclick="location.href='<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI'] . '&type=reset-all'); ?>'"/>
        </p>
    </form>
</div>