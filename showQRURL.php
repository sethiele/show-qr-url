<?php
/*
Plugin Name: Show QR URL
Plugin URI: http://sebastian.thiele.me/projekte/wordpress-plugin-show-qr-url
Description: This Plugin shows a QR-Code with the encoded URL of the corent Page. Useing Google Shart API
Author: Sebastian Thiele
Author URI: htt://sebastian.thiele.me
Version: 1.2.1
*/

// Einfache ausgabe der aktuellen URL
function getQRURL($size)
{
	return getQR("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"], $size);
}

// Erweiterte Ausgabe von beliebigen Text
function getQR($encode, $size) {
	return 'http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&cht=qr&chl='.urlencode ($encode).'&choe=UTF-8';
}


// Zeigt das Widget an
function widget_showQRURL($args) {
	
	extract($args);
	
	$options = get_option("widget_showQRURL");
	if(!is_array($options)){
			$options[title] = "QR URL";
			$options[size] = 200;
			$options[text] = "Das ist ein so genannter QR Code. Wenn ihr ein Handy mit einer Kamera und ein installiertes Leseprogramm habt, koennt ihr den Code einscannen und werdet irgendwo hingeleitet";
	}
	if($options[showQRURLversion] < 1.2) {
		$options[showQRURLhome] = "checked";
		$options[showQRURLsingle] = "checked";
		$options[showQRURLpage] = "checked";
		$options[showQRURLcategory] = "checked";
		$options[showQRURLtag] = "checked";
		$options[showQRURLdate] = "checked";
	}
	
	if (is_home() && $options[showQRURLhome] == 'checked') $showQR = true;	elseif (is_single() && $options[showQRURLsingle] == 'checked') $showQR = true;
	elseif (is_page() && $options[showQRURLpage] == 'checked') $showQR = true;
	elseif (is_category() && $options[showQRURLcategory] == 'checked') $showQR = true;
	elseif (is_tag() && $options[showQRURLtag] == 'checked') $showQR = true;
	elseif (is_date() && $options[showQRURLdate] == 'checked') $showQR = true;
	
	
	echo "<!-- QR Widtget von Sebastian Thiele - http://sebastian.thiele.me -->";
	if($showQR)
	{
		echo $before_widget;
		echo $before_title;
		echo $options[title];
		echo $after_title;
		echo "<div style=\"text-align:center\">";
		echo "<img src=\"".getQRURL($options[size])."\" alt=\"QR Code fuer diese Seite\" />";
		echo "</div>";
		echo "<div class=\"showQRURLtext\">".$options[text]."</div>";
		if($options[showQRURLsupport]) echo "<div class=\"showQRURLsupport\" style=\"text-align:center\">QR-Widget v".$options[showQRURLversion]." by <a href=\"http://sebastian.thiele.me/projekte/wordpress-plugin-show-qr-url\">Sebastian Thiele</a></div>";
		echo $after_widget;
	}
	echo "<!-- QR Widtget von Sebastian Thiele - http://sebastian.thiele.me -->";
}

function showQRURL_control() {
	
	$options = get_option("widget_showQRURL");
	
	
	if($_POST[showQRURLsubmit]) {
		$options[showQRURLversion] = 1.2;
		$options[title] = $_POST[showQRURLtitle];
		$options[size] = htmlspecialchars($_POST[showQRURLsize]);
		$options[text] = $_POST[showQRURLtext];
		$options[showQRURLhome] = $_POST[showQRURLhome];		$options[showQRURLsingle] = $_POST[showQRURLsingle];
		$options[showQRURLpage] = $_POST[showQRURLpage];
		$options[showQRURLcategory] = $_POST[showQRURLcategory];
		$options[showQRURLtag] = $_POST[showQRURLtag];
		$options[showQRURLdate] = $_POST[showQRURLdate];
		$options[showQRURLsupport] = $_POST[showQRURLsupport];
		update_option("widget_showQRURL", $options);
	}
	
	if(!is_array($options)){
			$options[title] = "QR URL";
			$options[size] = 200;
			$options[text] = "Das ist ein so genannter QR Code. Wenn ihr ein Handy mit einer Kamera und ein installiertes Leseprogramm habt, koennt ihr den Code einscannen und werdet irgendwo hingeleitet";
	}
	//Ver√§nderungen im Backend
	if($options[showQRURLversion] < 1.2) {
		$options[showQRURLhome] = "checked";
		$options[showQRURLsingle] = "checked";
		$options[showQRURLpage] = "checked";
		$options[showQRURLcategory] = "checked";
		$options[showQRURLtag] = "checked";
		$options[showQRURLdate] = "checked";
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
		<label for=\"showQRURLtext\">Text unter dem QR Code:</label>
		<textarea id=\"showQRURLtext\" name=\"showQRURLtext\" style=\"width:100%\">$options[text]</textarea>
	</p>
	<hr />
	<p>
		<b>Anzeigeoptionen</b>
	</p>
	<p>
		<label for=\"showQRURLhome\">Anzeigen auf Blog&uuml;bersichtsseite</label>
		<input type=\"checkbox\" name=\"showQRURLhome\" value=\"checked\" $options[showQRURLhome] />
	</p>
	<p>
		<label for=\"showQRURLsingle\">Anzeigen auf Single-Seiten</label>
		<input type=\"checkbox\" name=\"showQRURLsingle\" value=\"checked\" $options[showQRURLsingle] />
	</p>
	<p>
		<label for=\"showQRURLpage\">Anzeigen auf Seiten</label>
		<input type=\"checkbox\" name=\"showQRURLpage\" value=\"checked\" $options[showQRURLpage] />
	</p>
	<p>
		<label for=\"showQRURLcategory\">Anzeigen auf &Uuml;bersichtsseiten f&uuml;r Kategorien</label>
		<input type=\"checkbox\" name=\"showQRURLcategory\" value=\"checked\" $options[showQRURLcategory] />
	</p>
	<p>
		<label for=\"showQRURLtag\">Anzeigen auf &Uuml;bersichtsseiten f&uuml;r Tags</label>
		<input type=\"checkbox\" name=\"showQRURLtag\" value=\"checked\" $options[showQRURLtag] />
	</p>
	<p>
		<label for=\"showQRURLdate\">Anzeigen auf &Uuml;bersichtsseiten f&uuml;r Datum</label>
		<input type=\"checkbox\" name=\"showQRURLdate\" value=\"checked\" $options[showQRURLdate] />
	</p>
	<hr />
	<p>
		<b>Sonstiges</b>
	</p>
	<p>
		<label for=\"showQRURLsupport\">Link auf Entwicklerseite einbinden</label>
		<input type=\"checkbox\" name=\"showQRURLsupport\" value=\"checked\" $options[showQRURLsupport] />
	</p>
	
	";
}

function showQRURL_init(){
	register_sidebar_widget("Show QR URL", "widget_showQRURL");
	register_widget_control("Show QR URL", "showQRURL_control", 300, 200);
}
add_action("plugins_loaded", "showQRURL_init");
?>
