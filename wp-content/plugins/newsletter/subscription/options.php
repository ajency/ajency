<?php
@include_once NEWSLETTER_INCLUDES_DIR . '/controls.php';
$controls = new NewsletterControls();
$module = NewsletterSubscription::instance();

// TODO: Remove and use the $module->options.
$options = get_option('newsletter', array());

if ($controls->is_action()) {
    if ($controls->is_action('save')) {

        $defaults = $module->get_default_options();

        if (empty($controls->data['profile_text'])) {
            $controls->data['profile_text'] = $defaults['profile_text'];
        }

        // Without the last curly bracket since there can be a form number apended
        if (empty($controls->data['subscription_text'])) {
            $controls->data['subscription_text'] = $defaults['subscription_text'];
        }

        if (empty($controls->data['confirmation_text'])) {
            $controls->data['confirmation_text'] = $defaults['confirmation_text'];
        }

        if (empty($controls->data['confirmation_subject'])) {
            $controls->data['confirmation_subject'] = $defaults['confirmation_subject'];
        }

        if (empty($controls->data['confirmation_message'])) {
            $controls->data['confirmation_message'] = $defaults['confirmation_message'];
        }

        if (empty($controls->data['confirmed_text'])) {
            $controls->data['confirmed_text'] = $defaults['confirmed_text'];
        }

        if (empty($controls->data['confirmed_subject'])) {
            $controls->data['confirmed_subject'] = $defaults['confirmed_subject'];
        }

        if (empty($controls->data['confirmed_message'])) {
            $controls->data['confirmed_message'] = $defaults['confirmed_message'];
        }

        if (empty($controls->data['unsubscribed_text'])) {
            $controls->data['unsubscribed_text'] = $defaults['unsubscribed_text'];
        }

        $controls->data['confirmed_message'] = NewsletterModule::clean_url_tags($controls->data['confirmed_message']);
        $controls->data['confirmed_text'] = NewsletterModule::clean_url_tags($controls->data['confirmed_text']);
        $controls->data['confirmation_text'] = NewsletterModule::clean_url_tags($controls->data['confirmation_text']);
        $controls->data['confirmation_message'] = NewsletterModule::clean_url_tags($controls->data['confirmation_message']);
        $controls->data['unsubscription_text'] = NewsletterModule::clean_url_tags($controls->data['unsubscription_text']);
        $controls->data['unsubscribed_text'] = NewsletterModule::clean_url_tags($controls->data['unsubscribed_text']);
        $controls->data['unsubscribed_message'] = NewsletterModule::clean_url_tags($controls->data['unsubscribed_message']);

        $controls->data['confirmed_url'] = trim($controls->data['confirmed_url']);
        $controls->data['confirmation_url'] = trim($controls->data['confirmation_url']);
        $module->save_options($controls->data);
        $controls->messages = 'Saved.';
    }

    if ($controls->is_action('create')) {
        $page = array();
        $page['post_title'] = 'Newsletter';
        $page['post_content'] = '[newsletter]';
        $page['post_status'] = 'publish';
        $page['post_type'] = 'page';
        $page['comment_status'] = 'closed';
        $page['ping_status'] = 'closed';
        $page['post_category'] = array(1);

        // Insert the post into the database
        $page_id = wp_insert_post($page);

        $controls->data['url'] = get_permalink($page_id);
        $module->save_options($controls->data);
    }

    if ($controls->is_action('reset')) {
        $controls->data = $module->reset_options();
    }

    if ($controls->is_action('reset-template')) {
        $controls->data['template'] = file_get_contents(dirname(__FILE__) . '/email.html');
    }

    if ($controls->is_action('test-template')) {

        $users = NewsletterUsers::instance()->get_test_users();
        if (count($users) == 0) {
            $controls->errors = 'There are no test subscribers. Read more about test subscribers <a href="http://www.thenewsletterplugin.com/plugins/newsletter/subscribers-module#test" target="_blank">here</a>.';
        } else {
            $template = $controls->data['template'];
            if (strpos($template, '{message}') === false) {
                $template .= '{message}';
            }
            $message = '<p>This is a generic example of message embedded inside the template.</p>';
            $message = str_replace('{message}', $message, $template);
            $addresses = array();
            foreach ($users as &$user) {
                $addresses[] = $user->email;
                Newsletter::instance()->mail($user->email, 'Newsletter Messages Template Test', $newsletter->replace($message, $user));
            }
            $controls->messages .= 'Test emails sent to ' . count($users) . ' test subscribers: ' .
            implode(', ', $addresses) . '. Read more about test subscribers <a href="http://www.thenewsletterplugin.com/plugins/newsletter/subscribers-module#test" target="_blank">here</a>.';
        }
    }
} else {
    $controls->data = get_option('newsletter', array());

    // Patch
    if (isset($controls->data['subscribed_text'])) {
        $controls->data['confirmation_text'] = $controls->data['subscribed_text'];
        unset($controls->data['subscribed_text']);
    }
}
?>

<?php if (isset($controls->data['novisual']) && $controls->data['novisual'] != 1) { ?>
    <script type="text/javascript" src="<?php echo plugins_url('newsletter'); ?>/tiny_mce/tiny_mce.js"></script>

    <script type="text/javascript">
        tinyMCE.init({
            inline_styles: false,
            mode: "specific_textareas",
            editor_selector: "visual",
            theme: "advanced",
            entity_encoding: "raw",
            theme_advanced_disable: "styleselect",
            relative_urls: false,
            remove_script_host: false,
            theme_advanced_buttons1_add: "forecolor,blockquote,code,fontsizeselect,fontselect",
            theme_advanced_buttons3_add: "tablecontrols,fullscreen",
            theme_advanced_toolbar_location: "top",
            theme_advanced_resizing: true,
            theme_advanced_statusbar_location: "bottom",
            document_base_url: "<?php echo get_option('home'); ?>/",
            content_css: "<?php echo plugins_url('newsletter'); ?>/editor.css?" + new Date().getTime()
        });
    </script>
<?php } ?>

<div class="wrap">
    <?php $help_url = 'http://www.thenewsletterplugin.com/plugins/newsletter/subscription-module'; ?>
    <?php include NEWSLETTER_DIR . '/header-new.php'; ?>

    <div id="newsletter-title">
        <?php include NEWSLETTER_DIR . '/subscription/menu.inc.php'; ?>

        <h2>Subscription, Unsubscription, Profile Page Configuration</h2>


        <p>
            In this panel you can configure the subscription and cancellation process, set up every message, the single or double opt in and
            even a customized subscription form.
        </p>
        <p>
            Emails sent during subscription process are themed with the file subscription/email.php. Open that file to learn how to customize it.
        </p>
        <p>
            Page layout where messages are shown is managed by subscription/page.php file which contains instruction on how to
            customize it OR use a WordPress page for messages as described on subscription configuration.
        </p>
    </div>
    <div class="newsletter-separator"></div>


    <?php $controls->show(); ?>
    <form method="post" action="">
        <?php $controls->init(); ?>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-general">General</a></li>
                <li><a href="#tabs-2">Subscription</a></li>
                <li><a href="#tabs-3">Confirmation</a></li>
                <li><a href="#tabs-4">Welcome</a></li>
                <li><a href="#tabs-8">Template</a></li>
                <li><a href="#tabs-9">Profile</a></li>
                <li><a href="#tabs-5">Unsubscription</a></li>
                <li><a href="#tabs-wp">WP Registration</a></li>
                <li><a href="#tabs-7">Docs</a></li>
            </ul>

            <div id="tabs-general">
                <table class="form-table">
                    <tr valign="top">
                        <th>Opt In</th>
                        <td>
                            <?php $controls->select('noconfirmation', array(0 => 'Double Opt In', 1 => 'Single Opt In')); ?>
                            <p class="description">
                                <strong>Double Opt In</strong> means subscribers need to confirm their email address by an activation link sent them on a activation email message.<br />
                                <strong>Single Opt In</strong> means subscribers do not need to confirm their email address.<br />
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Newsletter dedicated page</th>
                        <td>
                            <?php $controls->text('url', 70); ?>
                            <?php
                            if (empty($controls->data['url'])) {
                                $controls->button('create', 'Create a page for me');
                            }
                            ?>

                            <p class="description">
                                Optional (but recommended) an address of a WordPress page (eg. <?php echo get_option('home') . '/newsletter'; ?>)
                                you <strong>manually created</strong> for subscription and messages.
                                <br>
                                The page must have in its body <strong>only</strong> the short code <strong>[newsletter]</strong> (as is).

                                <?php if (!empty($controls->data['url'])) { ?>
                                    <br>
                                    If something is not working as expected with this address you can empty the field above and save: a button will appear
                                    to create that page automatically.
                                <?php } ?>
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Disable visual editors?</th>
                        <td>
                            <?php $controls->yesno('novisual'); ?>
                            <p class="description">
                                If you prefer to edit the messages on this cofiguration panel writing them in HTML, you can
                                disable the visual editors.
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Notifications</th>
                        <td>
                            <?php $controls->yesno('notify'); ?>
                            to: <?php $controls->text_email('notify_email'); ?> (email address, leave empty for the WordPress administration email <?php echo get_option('admin_email'); ?>)
                            <p class="description">
                                Notifications are sent on confirmed subscriptions and cancellations.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>


            <div id="tabs-2">

                <table class="form-table">
                    <tr valign="top">
                        <th>Subscription page</th>
                        <td>
                            <?php $controls->editor('subscription_text'); ?>
                            <p class="description">
                                User <strong>{subscription_form}</strong> to insert the subscription form where you prefere in the text or
                                <strong>{subscription_form_N}</strong> (with N from 1 to 10) to insert one of the custom forms.
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Forced preferences</th>
                        <td>
                            <?php $controls->preferences(); ?>
                            <p class="description">
                                Add to new subscribers these preferences by default.
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Enable the antibot?</th>
                        <td>
                            <?php $controls->yesno('antibot'); ?>
                            <p class="description">
                                Tries to block bot generated subscriptions (without the annoying captcha).
                            </p>
                        </td>
                    </tr>
                </table>

                <h3>Special cases</h3>

                <table class="form-table">
                    <tr valign="top">
                        <th>Already subscribed page content</th>
                        <td>
                            <?php $controls->editor('already_confirmed_text'); ?><br>
                            <?php $controls->checkbox('resend_welcome_email_disabled', 'Do not resend the welcome email'); ?>
                            <p class="description">
                                Shown when the email is already subscribed and confirmed. The welcome email, if not disabled, will
                                be sent. Find out more on this topic on its
                                <a href="http://www.thenewsletterplugin.com/plugins/newsletter/subscription-module#repeated" target="_blank">documentation page</a>.
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Error page content</th>
                        <td>
                            <?php $controls->editor('error_text'); ?>
                            <p class="description">
                                Message shown when the email is bounced or other errors occurred.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>


            <div id="tabs-3">

                <p>This configuration applies only when you sent the double opt-in mode.</p>

                <table class="form-table">
                    <tr valign="top">
                        <th>Confirmation required message</th>
                        <td>
                            <?php $controls->editor('confirmation_text'); ?>
                            <p class="description">
                                This message is shown to just subscribed users which require to confirm the subscription
                                following the instructions sent them with the following email. Invite them to check the mailbox and to
                                give a look to the spam folder if no messages are received within 10 minutes.
                            </p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th>Alternative custom confirmation required page</th>
                        <td>
                            <?php $controls->text('confirmation_url', 70); ?>
                            <p class="description">
                                A full page address (http://yourblog.com/confirm) to be used instead of message above.
                                If left empty the message above is used.
                            </p>
                        </td>
                    </tr>


                    <!-- CONFIRMATION EMAIL -->
                    <tr valign="top">
                        <th>Confirmation email</th>
                        <td>
                            <?php $controls->email('confirmation'); ?>
                            <p class="description">
                                Message sent by email to new subscribers with instructions to confirm their subscription
                                (for double opt-in process). Do not forget to add the <strong>{subscription_confirm_url}</strong>
                                that users must click to activate their subscription.<br />
                                Sometime can be useful to add a <strong>{unsubscription_url}</strong> to let users to
                                cancel if they wrongly subscribed to your newsletter.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>


            <div id="tabs-4">
                <table class="form-table">
                    <tr valign="top">
                        <th>Welcome message</th>
                        <td>
                            <?php $controls->editor('confirmed_text'); ?>
                            <p class="description">
                                Showed when the user follow the confirmation URL sent to him with previous email
                                settings or if signed up directly with no double opt-in process. You can use the <strong>{profile_form}</strong> tag to let the user to
                                complete it's profile.
                            </p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th>Alternative custom welcome page</th>
                        <td>
                            <?php $controls->text('confirmed_url', 70); ?>
                            <p class="description">
                                A full page address (http://yourblog.com/welcome) to be used instead of message above. If empty the message is
                                used.
                            </p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th>Conversion tracking code<br/><small>ADVANCED</small></th>
                        <td>
                            <?php $controls->textarea('confirmed_tracking'); ?>
                            <p class="description">
                                The code is injected AS-IS in welcome page and can be used to track conversion
                                (you can use PHP if needed). It does not work with a custom welcome page.
                                Conversion code is usually supply by tracking services,
                                like Google AdWords, Google Analytics and so on.
                            </p>
                        </td>
                    </tr>

                    <!-- WELCOME/CONFIRMED EMAIL -->
                    <tr valign="top">
                        <th>
                            Welcome email<br /><small>The right place where to put bonus content link</small>
                        </th>
                        <td>
                            <?php $controls->email('confirmed', null, true); ?>
                            <p class="description">
                                Email sent to the user to confirm his subscription, the successful confirmation
                                page, the welcome email. This is the right message where to put a <strong>{unlock_url}</strong> link to remember to the
                                user where is the premium content (if any, main configuration panel).<br />
                                It's a good idea to add the <strong>{unsubscription_url}</strong> too and the <strong>{profile_url}</strong>
                                letting users to cancel or manage/complete their profile.
                            </p>
                        </td>
                    </tr>

                </table>
            </div>

            <!-- TEMPLATE -->
            <div id="tabs-8">
                <p>
                    Edit the default template of confirmation, welcome and cancellation emails. Add the {message} tag where you
                    want the specific message text to be included.
                </p>

                <table class="form-table">
                    <tr valign="top">
                        <th>Enabled?</th>
                        <td>
                            <?php $controls->yesno('template_enabled'); ?>
                            <p class="description">
                                When not enabled, the old templating system is used (see the file
                                wp-content/plugins/newsletter/subscription/email.php).
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Email template</th>
                        <td>
                            <?php $controls->textarea('template'); ?>
                            <?php $controls->button('reset-template', 'Reset this template'); ?>
                            <?php $controls->button('test-template', 'Send a test'); ?>
                        </td>
                    </tr>
                </table>

            </div>

            <!-- PROFILE -->
            <div id="tabs-9">

                <p>
                    The page shown when the subscriber wants to edit hid profile following the link
                    {profile_url} you added to a newsletter.
                </p>


                <table class="form-table">
                    <tr valign="top">
                        <th>Profile page</th>
                        <td>
                            <?php $controls->editor('profile_text'); ?>
                            <?php $controls->hint('This is the page where subscribers can edit their data and it must contain the {profile_form} tag.', 'http://www.thenewsletterplugin.com/plugins/newsletter/subscription-module#profile');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Other messages</th>
                        <td>
                            confirmation after profile save: <?php $controls->text('profile_saved', 50); ?>
                        </td>
                    </tr>
                </table>
            </div>


            <div id="tabs-5">

                <p>
                    A user starts the cancellation process clicking the unsubscription link in
                    a newsletter. This link contains the email to unsubscribe and some unique information
                    to avoid hacking. The user are required to confirm the unsubscription: this is the last
                    step where YOU can communicate with your almost missed user.
                </p>
                <p>
                    To create immediate cancellation, you can use the <strong>{unsubscription_confirm_url}</strong>
                    in your newsletters and upon click on that link goodbye message and email are used directly
                    skipping the confirm request.
                </p>

                <table class="form-table">
                    <tr valign="top">
                        <th>Cancellation message</th>
                        <td>
                            <?php $controls->editor('unsubscription_text'); ?>
                            <p class="description">
                                This text is show to users who click on a "unsubscription link" in a newsletter
                                email. You <strong>must</strong> insert a link in the text that user can follow to confirm the
                                unsubscription request using the tag <strong>{unsubscription_confirm_url}</strong>.
                            </p>
                        </td>
                    </tr>

                    <!-- Text showed to the user on successful unsubscription -->
                    <tr valign="top">
                        <th>Goodbye message</th>
                        <td>
                            <?php $controls->editor('unsubscribed_text'); ?>
                            <p class="description">
                                Shown to users after the cancellation has been completed.
                            </p>
                        </td>
                    </tr>

                    <!-- GOODBYE EMAIL -->
                    <tr valign="top">
                        <th>Goodbye email</th>
                        <td>
                            <?php $controls->email('unsubscribed'); ?>
                            <p class="description">
                                Sent after a cancellation, is the last message you send to the user before his removal
                                from your newsletter subscribers. Leave the subject empty to disable this message.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>




            <div id="tabs-7">

                <h4>User's data</h4>
                <p>
                    <strong>{name}</strong>
                    The user name<br />
                    <strong>{surname}</strong>
                    The user surname<br />
                    <strong>{email}</strong>
                    The user email<br />
                    <strong>{ip}</strong>
                    The IP address from where the subscription started<br />
                    <strong>{id}</strong>
                    The user id<br />
                    <strong>{token}</strong>
                    The user secret token<br />
                    <strong>{profile_N}</strong>
                    The user profile field number N (from 1 to 19)<br />
                </p>

                <h4>Action URLs and forms</h4>
                <p>
                    <strong>{subscription_confirm_url}</strong>
                    URL to build a link to confirmation of subscription when double opt-in is used. To be used on confirmation email.<br />
                    <strong>{unsubscription_url}</strong>
                    URL to build a link to start the cancellation process. To be used on every newsletter to let the user to cancel.<br />
                    <strong>{unsubscription_confirm_url}</strong>
                    URL to build a link to an immediate cancellation action. Can be used on newsletters if you want an immediate cancellation or
                    on cancellation page (displayed on {unsubscription_url}) to ask a cancellation confirmation.<br />
                    <strong>{profile_url}</strong>
                    URL to build a link to user's profile page (see the User Profile panel)<br />
                    <strong>{unlock_url}</strong>
                    Special URL to build a link that on click unlocks protected contents. See Main Configuration panel.<br />
                    <strong>{profile_form}</strong>
                    Insert the profile form with user's data. Usually it make sense only on welcome page.<br />
                </p>
            </div>


            <div id="tabs-wp">

                <p>
                    Configure if and how a regular WordPress user registration can be connected to a Newsletter subscription.
                </p>
                <p>
                    Important! This type of subscription does not require confirmation, it's automatic on first login.
                    <a href="http://www.thenewsletterplugin.com/plugins/newsletter/subscription-module#registration" target="_blank">Read more on documentation page</a>.
                </p>

                <table class="form-table">
                    <tr valign="top">
                        <th>Subscription on registration</th>
                        <td>
                            <?php $controls->select('subscribe_wp_users', array(0 => 'No', 1 => 'Yes, force subscription', 2 => 'Yes, show the option', 3 => 'Yes, show the option already checked')); ?>
                            <?php $controls->hint('Adds a newsletter subscription option on registration.', 'http://www.thenewsletterplugin.com/plugins/newsletter/subscription-module#registration'); ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Check box label</th>
                        <td>
                            <?php $controls->text('subscribe_wp_users_label', 30); ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Send welcome email to registered users</th>
                        <td>
                            <?php $controls->yesno('wp_welcome'); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <p>
            <?php $controls->button('save', 'Save'); ?>
            <?php $controls->button_confirm('reset', 'Reset all', 'Are you sure you want to reset all?'); ?>
        </p>

    </form>
</div>
