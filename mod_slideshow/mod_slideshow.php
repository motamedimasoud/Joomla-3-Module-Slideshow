<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( dirname(__FILE__).'/helper.php' );

$images = modSlideshowHelper::getImages($params);

require(JModuleHelper::getLayoutPath('mod_slideshow'));