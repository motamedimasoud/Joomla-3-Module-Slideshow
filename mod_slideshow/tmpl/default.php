<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

$doc = & JFactory::getDocument();
$doc->addScript('/modules/'.$module->module.'/js/jquery.jcarousel.min.js');
$doc->addScript('/modules/'.$module->module.'/js/jquery.jcarousel-control.min.js');
$doc->addScript('/modules/'.$module->module.'/js/jcarousel.js');
$doc->addStyleSheet('/modules/'.$module->module.'/css/jcarousel.css');
?>

<?php if(count($images)):?>
    <div class="jcarousel">
        <a href="#" class="icon-arrow-left"></a>
        <div class="carousel">
            <ul>
                <?php foreach($images as $image): ?>
                    <li>
                        <img src="<?php echo $image['path']."/".$image['filename']; ?>" />
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="#" class="icon-arrow-right"></a>
    </div>
<?php endif; ?>