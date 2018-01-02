<?php

global $project;
$project = 'mysite';

global $database;
$database = 'multisite';

require_once 'conf/ConfigureFromEnv.php';

// Set the site locale
i18n::set_locale('en_US');

HtmlEditorConfig::get('cms')->setOption('content_css', project() . '/css/editor.css');
