<?php
/*************************************************************************
php easy :: one-level site menu builder script
==========================================================================
Author:      php easy code, www.phpeasycode.com
Web Site:    http://www.phpeasycode.com
Contact:     webmaster@phpeasycode.com
*************************************************************************/

// menu items ("title" => "link", comma delimited)
$menu = array(
	"home" => "/",
	"scripts" => "/scripts.php",
	"tutorials" => "/tutorials.php",
	"support" => "/support.php",
	"about us" => "/about.php");

function siteMenu(){
	global $menu;
	
	$curlink = $_SERVER['REQUEST_URI'];
	
	$out = "<div id=\"menu\"><ul>\n";
	foreach($menu as $title => $link) {
		if($link == $curlink) { // highlight current item
			$out.= "<li class=\"current\"><span>" . $title . "</span></li>\n";
		}
		else { // links to all other items
			$out.= "<li><a href=\"" . $link . "\">" . $title . "</a></li>\n";
		}
	}
	$out.= "</ul></div>\n";
	
	return $out;
}

// output the menu
echo siteMenu();
?>