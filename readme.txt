=== Browser and Operating System Finder ===
Contributors: aftabmuni
Plugin Name: Browser and Operating System Finder
Plugin URI: https://aftabmuni.wordpress.com/
Tags: browser name in body class, os name in body class
Author URI: https://aftabmuni.wordpress.com/
Author: Aftab Muni
Requires at least: 3.2  
Tested up to: 5.9
Stable tag: 1.2
Version: 1.2
License: GPLv2 or later
Donate link: https://www.paypal.me/aftabmuni

== Description ==

This plugin is used to add browser name and OS name in body tag class attribute
<br>For e.g:<br>
&lt;body class=".... browser-firefox os-windows"&gt;<br>
&lt;body class=".... browser-chrome os-apple"&gt;<br>
&lt;body class=".... browser-safari os-iphone"&gt;<br>
&lt;body class=".... browser-chrome os-android"&gt;<br>

This can help in creating responsive websites when website on some device is causing issues but in some device website is working perfectly. So we can use this in CSS as:<br>
.browser-firefox.os-windows{<br>
//Your CSS<br>
}<br>
and for same browser and other OS<br>
.browser-firefox.os-apple{<br>
//Your CSS<br>
}

== Installation ==

To install this plugin follow below steps

1. Upload the plugin files to the '/wp-content/plugins/' directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the 'Settings->Browser Finder' screen to configure the plugin settings
4. Now check the html body tag to find browser name and OS name added in class attribute

== Frequently Asked Questions ==

= When this plugin is useful? =

It is used when you have to apply CSS based on browser or OS, for e.g. ios or android, chrome or firefox etc.

= Is this plugin paid or free? =

This plugin is totally free.

= What about support? =

Create a support ticket at WordPress forum and I will take care of any issue.

== Screenshots ==

1. Click on Browser Finder in Settings
2. Configure plugin settings
3. Body tag after configuring settings


== Changelog ==

= 1.2 = 
* Fix: Added nonce on form submit to prevent CSRF. Thanks to Shinpei Imai.

= 1.1 = 
* Fix: Added new Browser detection class file.

= 1.0 =
* First public release.

== Upgrade Notice ==

= 1.2 = 
* Added CSRF security fix.

= 1.1 = 
* Added new Browser detection class file.

= 1.0 =
* First public release.