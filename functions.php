<?php

function random_featured_exhibit()
{
    $html = '';
    $featuredExhibit = exhibit_builder_random_featured_exhibit();
    if ($featuredExhibit) {
        $html .= get_view()->partial('exhibits/single.php', array('exhibit' => $featuredExhibit));
    } else {
        $html .= '<p>' . __('You have no featured exhibits.') . '</p>';
    }
    $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
    return $html;
}

function public_nav_main_bootstrap() {
    $partial = array('common/menu-main-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

function public_nav_sidebar_bootstrap() {
    $partial = array('common/menu-sidebar-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

function public_nav_pills_bootstrap() {
    $partial = array('common/menu-item-pills-partial.phtml', 'default');
    $nav = public_nav_items();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

function recent_items_bootstrap($recentItems,$type){
	if($type=='list'){
		return recent_items($recentItems);
		}
	elseif($type=='grid'){
	$items = get_recent_items($recentItems);
    if ($items) {
        $html = '';
        foreach ($items as $item) {
            $html .= get_view()->partial('items/grid.php', array('item' => $item));
            release_object($item);
        }
    } else {
        $html = '<p>' . __('No recent items available.') . '</p>';
    }
    return $html;
		}
}

function bs_link_logo_to_navbar($text = null, $props = array())
{
    if (!$text) {
        $text = option('site_title');
    }
    
    if(theme_logo()){$logo= "";}
    else $logo="onlytext";
    
    return '<a  class="navbar-brand '.$logo.'" href="' . html_escape(WEB_ROOT) . '" '. tag_attributes($props) . '>'.theme_logo(). $text . "</a>\n";
}

function bs_header_bg()
{
    $headerImage = get_theme_option('Header Background Image');
    if ($headerImage) {
        $storage = Zend_Registry::get('storage');
        $headerImage = $storage->getUri($storage->getPathByType($headerImage, 'theme_uploads'));
        return $headerImage;
    }
}

function bs_header_logo()
{
    $headerImage = get_theme_option('Header Logo Image');
    if ($headerImage) {
        $storage = Zend_Registry::get('storage');
        $headerImage = $storage->getUri($storage->getPathByType($headerImage, 'theme_uploads'));
        return '<img alt="header-logo" class="img-responsive center-block" src="' . $headerImage . '" />';
    }
}
