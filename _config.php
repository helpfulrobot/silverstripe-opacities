<?php

// Set the module directory so we know where JS, etc lives.
define('OPACITIES_BASE', basename(dirname(__FILE__)));
SiteConfig::add_extension('Opacities_SiteConfigExtension');
LeftAndMain::require_css(OPACITIES_BASE . '/css/cms/min.css');