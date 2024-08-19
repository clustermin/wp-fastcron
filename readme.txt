=== FastCron ===
Contributors: fastcron
Tags: wp-cron, cronjob, cron job, online cronjob, web cron
Requires at least: 2.9
Tested up to: 6.6
Stable tag: 1.0.0
License: GPLv2 or later

This plugin will set up a free cronjob at FastCron to run your wp-cron.php file automatically. Completely free, no registration required.

== Description ==

This plugin relies on the free cronjob service provided by
[FastCron](https://www.fastcron.com/?ref=wp).

Upon activated, it will send your site URL to FastCron,
and they will create and run a cronjob every 5 minutes
to visit your `wp-cron.php` file via this URL:
`https://site-url/wp-cron.php?doing_wp_cron=1`

Features:
- Completely free, no registration required.
- Simple and fast, just click activate and done.
- View last 25 execution results on FastCron.

This free plugin is suitable for your personal blog.

If you manage several WordPress blogs/websites for your clients,
please [register an account at FastCron](https://app.fastcron.com/signup?ref=wp)
and set up your cronjobs there.

Upon deactivated, the plugin will request FastCron to remove the cronjob to your `wp-cron.php` file.

By using this plugin, you agreed to their
[Terms of service](https://www.fastcron.com/about/terms?ref=wp) and 
[Privacy policy](https://www.fastcron.com/about/privacy?ref=wp).

== Installation ==
Upload the plugin to your blog, then click Activate it under Plugins > Installed Plugins.

== Frequently Asked Questions ==
= How to delete the cronjob at FastCron? =
When you deactivate the plugin, it will delete the cronjob.

= How to update cronjob URL? =
Please deactivate your plugin, then activate it again.

= I accidentally deleted the plugin without deactivating it first. Can you help? =
Please email support at fastcron dot com, we will help.

== Changelog ==

= 1.0.0 =
First version