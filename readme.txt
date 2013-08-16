=== Plugin Name ===
Contributors: sebat
Tags: widget, sidebar, QR-Code, mobile, piwik, Google Analytics
Requires at least: 3.3
Tested up to: 3.6
Stable tag: 1.4.1
Author: Sebastian Thiele
Author URI: htt://www.sebastian-thiele.net
License: GPLv2

Sidebar-Widget zum generieren von QR-Codes die auf die aktuelle Seite verweisen.

== Description ==

Dieses Plugin stellt ein Sidebar widget zur Verfuegung, welches die aktuelle URL des Artikels oder der Seite anzeigt.
Die groessee der Grafik ist frei anpassbar und passt sich somit an jede Sidebar an. Es besteht auch die Moeglichkeit einen beschreibenden Text unterhalb der Grafik anzugeben um den Benutzern klar zu machen, was es mit der Grafik auf sich hat.

Dabei wird die Google Chart-Api verwendet.

* Die Bilder sind leicht speicherbar und koennen so, zum Beispiel in Praesentationen, eingebaut werden.
* Sollte sich ein Benutzer dazu entschliessen, einen Artikel auszudrucken, kann er/ sie die Ursprungsseite schnell und einfach durch Abfotografieren des Codes wieder oeffnen.
* Ein Benutzer, der in Eile ist, kann die Seite in einem mobilen Entgerart oeffnen und unterwegs lesen.
* Es ist eine relativ neue und inovative Technik

Supported languages: german, english
POT file includes in the `lang` folder.

== Installation ==

1. Die Datei showQRURL.php in das Verzeichnis `/wp-content/plugins/` uploaden
1. Das Plugin im Adminmenue under  'Plugins' aktivieren
1. In das Menue `Design` gehen und unter `Widmest` das Widmet in die Sidebar ziehen und die Optionsfelder ausfuellen

== Frequently Asked Questions ==

= Was ist ein QR-Code =

Der QR-Code ist ein zweidimensionaler Barcode, der von (zum Beispiel) Handys abfotografiert werden kann, entschluesselt wird und in diesem Fall den Benutzer dann auf die URL der aktuellen Seite leitet.

= Kann ich auch andere Dinge als QR-Code darstellen? =
Ja. Es gibt zwei Funktionen, die dies zur verfuegung stellen: 
`getQRURL($size)` diese Funktion erwartet als Parameter nur eine groesse in Pixel z.B. `getQRURL(120)` Gibt einen QR Code der aktuellen Seite mit den Massen 120px x 120px aus
`getQR($encode, $size)` diese Funktion erwartet einen String, der umgewandelt werden soll und die groesse.
Beide Funktionen koennen im Theme verwendet werden z.B.
`<img src="<?php echo getQRURL($size); ?>" alt="xy" />`


== Screenshots ==

1. Einstellungen im Backend fuer das Sidebar Widget
2. Beispielanzeige, wie es im Frontend aussehen kann.

== Changelog ==

= 1.4.1 =
* Kompatibilität mit aktuellen Wordpress > 3.3

= 1.4 =
* Multilanguage support
* german, english
* jquery bugfix

= 1.3 =
* Neue Optionenseite
* Tracking moeglich Pwiki und Google Analytics



= 1.2.1 =
* Bugfixing
* Behoben: trotz einstellungen wo angezeigt und wo nicht wurde dennoch der QR Code angezeigt.

= 1.2 =
* Code verbessert
* Neue Funktion hinzugefuegt `getQR($encode, $size)`
* Auswaehlbar, auf welchen Seiten die GRafik angezeigt werden soll (fuer ein Sidbar Themes)
* Einbau der Moeglichkeit auf die Entwicklerseite zu verlinken, um die Verbreitung des Plugins zu verbessern


= 1.1 =
* Werte aus dem Backend koennen jetzt auch HTML enthalten.

= 1.0 =
* Einbau der der Sidebar
* Groessenanpassung
* Individueller Titel
* Individueller Beschreibungstext

== Upgrade Notice ==

= 1.2 =
* Im Widget Menue nachschauen, welche neuen Einstellungsmoeglichkeiten es gibt.

= 1.1 =
* HTML speicherbar

= 1.0 =
Startversion

