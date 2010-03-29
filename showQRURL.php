<?php
/*
Plugin Name: Show QR URL
Plugin URI: http://sebastian.thiele.me/projekte/wordpress-plugin-show-qr-url
Description: This Plugin shows a QR-Code with the encoded URL of the corent Page. Useing Google Shart API
Author: Sebastian Thiele
Author URI: htt://sebastian.thiele.me
Version: 1.1
*/

function getQRURL($size)
{
	return 'http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&cht=qr&chl='.urlencode ("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]).'&choe=UTF-8';;
}

function widget_showQRURL($args) {
	
	extract($args);
	
	$options = get_option("widget_showQRURL");
	if(!is_array($options)){
			$options[title] = "QR URL";
			$options[size] = 200;
			$options[text] = "Das ist ein so genannter QR Code. Wenn ihr ein Handy mit einer Kamera und ein installiertes Leseprogramm habt, könnt ihr den Code einscannen und werdet irgendwo hingeleitet";
	}
	
	
	echo $before_widget;
	echo $before_title;
	echo $options[title];
	echo $after_title;
	echo "<div style=\"text-align:center\">";
	echo "<img src=\"".getQRURL($options[size])."\" alt=\"QR Code für diese Seite\" />";
	echo "</div>";
	echo "<div class=\"showQRURLtext\">".$options[text]."</div>";
	echo $after_widget;
}

function showQRURL_control() {
	
	$options = get_option("widget_showQRURL");
	
	
	if($_POST[showQRURLsubmit]) {
		$options[title] = $_POST[showQRURLtitle];
		$options[size] = htmlspecialchars($_POST[showQRURLsize]);
		$options[text] = $_POST[showQRURLtext];
		update_option("widget_showQRURL", $options);
	}
	
	if(!is_array($options)){
			$options[title] = "QR URL";
			$options[size] = 200;
			$options[text] = "Das ist ein so genannter QR Code. Wenn ihr ein Handy mit einer Kamera und ein installiertes Leseprogramm habt, könnt ihr den Code einscannen und werdet irgendwo hingeleitet";

	}
	
	
	echo "
	<p>
		<label for=\"showQRURLtitle\">&Uuml;berschrift:</label>
		<input type=\"text\" id=\"showQRURLtitle\" name=\"showQRURLtitle\" value=\"$options[title]\" />
	</p>
	<p>
		<label for=\"showQRURLsize\">Breite und H&ouml;he:</label>
		<input type=\"text\" id=\"showQRURLsize\" name=\"showQRURLsize\" value=\"$options[size]\" />
		<input type=\"hidden\" name=\"showQRURLsubmit\" value=\"submit\" />
	</p>
	<p>
		<label for\"showQRURLtext\">Text unter dem QR Code:</label>
		<textarea id=\"showQRURLtext\" name=\"showQRURLtext\" style=\"width:100%\">$options[text]</textarea>
	</p>
	";
}

function showQRURL_init(){
	register_sidebar_widget("Show QR URL", "widget_showQRURL");
	register_widget_control("Show QR URL", "showQRURL_control", 300, 200);
}
add_action("plugins_loaded", "showQRURL_init");
?>