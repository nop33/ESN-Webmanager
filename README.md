ESN-Webmanager
==============

A simple event and registration management system for the ESN sections of Thessaloniki.

# Installation
Just download and extract the repository in the public folder of your server. Make sure your .htaccess file is like the following:
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule .* index.php/$0 [PT,L]
```

To create the database together with some sample data, run the `/database/database_structure_and_sample_data.sql`.

Rename the file `/application/config/config.sample.php` to `/application/config/config.php` and change the line
```
$config['base_url'] = 'http://localhost:8888/ESN-Webmanager/';
```
to reflect the base URL of your application.

# Requirements
PHP 5.1.6 or newer

# Configuration
The **Share it!** feature requires the `/application/config/shareIt.php` configuration file. The contents of the file are in the following format:
```PHP
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Facebook App
$config['appId']  = 'xxxxx';
$config['secret'] = 'xxxxx';
$config['redirect_uri'] = '<your-domain>/shareIt/';  //return url (url to script)
$config['homeurl'] = '<your-domain>/shareIt';  //return to home
$config['scope'] = 'publish_stream,manage_pages';  //Required facebook permissions

// Twitter App
$config['twitter_consumer'] = 'xxxxx';
$config['twitter_consumer_secret'] = 'xxxxx';
$config['twitter_token'] = 'xxxxx';
$config['twitter_token_secret'] = 'xxxxx';
```
followed by the Facebook group/pages ids in the format:
```PHP
$config['name-of-group'] = 'group-id';
```
Currently only Thessaloniki's ESN Facebook groups and pages are supported.
