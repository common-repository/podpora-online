<?php
/*
Plugin Name: Podpora online
Plugin URI: http://wptranslations.eu/podpora-online/
Description: Online podpora pro českou komunitu. Naleznete zde překlady pluginů, šablon a mnoho dalšího.
Version: 3.3
Author: Expres-Web.cz
Author URI: http://expres-web.cz
License: GPLv2 or later
*/

add_action( 'muplugins_loaded', 'my_plugin_override' );

function my_plugin_override() {
    // your code here
}

require_once dirname( __FILE__ ) . '/widget.php';

if(!is_admin()){
    return;
}else{


	/**********  Vytvoreni menu hlavni **********/

	function PridatMenu(){
add_action('admin_menu', 'VytvorMenu');
}

function VytvorMenu(){
add_menu_page('Online podpora', 'Online podpora', 'activate_plugins', 'uvod', 'ObsahKontaktniFormular',plugins_url( 'podpora-online/design/podpora.png' ), 82 );
}

// Obsah Kontaktní fomulář
function ObsahKontaktniFormular() {


include 'kontaktni-formular.php';

}

	/**********  Vytvoreni menu Novinky **********/

add_action('admin_menu', 'wptnews_menu');
function wptnews_menu(){
add_menu_page('WP Trans novinky', 'Poslední novinky', 'activate_plugins', 'wptrans_novinky', 'ObsahWPTransNovinky',plugins_url( 'podpora-online/design/novinky.png' ), '82.1' );
}

// Obsah Video návody
function ObsahWPTransNovinky() {


include 'novinky.php';

}
	/**********  Vytvoreni menu preklady **********/

add_action('admin_menu', 'preklady_menu');
function preklady_menu(){
add_menu_page('Překlady šablon a pluginu', 'Překlady', 'activate_plugins', 'preklady_vse', 'ObsahPreklady',plugins_url( 'podpora-online/design/preklady.png' ), '82.2' );
}

// Obsah Preklady
function ObsahPreklady() {


include 'preklady.php';

}

	/**********  Vytvoreni menu zadost o preklad **********/

add_action('admin_menu', 'zpreklad_menu');
function zpreklad_menu(){
add_menu_page('Žádost o překlad', 'Žádost o překlad', 'activate_plugins', 'zadost_preklad', 'ObsahZPreklad',plugins_url( 'podpora-online/design/zadost.png' ), '82.3' );
}

// Obsah Zadost prekladu
function ObsahZPreklad() {


include 'zadost.php';

}

	/**********  Vytvoreni menu video návody **********/

add_action('admin_menu', 'vnavody_menu');
function vnavody_menu(){
add_menu_page('WordPress Video návody', 'Video návody', 'activate_plugins', 'wordpress_vnavody', 'ObsahWordPressVNavody',plugins_url( 'podpora-online/design/vnavody.png' ), '82.4' );
}

// Obsah Video návody
function ObsahWordPressVNavody() {


include 'wordpress-vnavody.php';

}

// spuštění
PridatMenu();

	// Funkce pro přidání CSS souboru do hlavičky administrace
    function PO_PridaniCssSouboru(){
        wp_enqueue_style('podpora-online-css', plugin_dir_url(__FILE__).'design/style.css');
    }


	/**********   Konec definice funkcí   **********/

	// Spuštění funkce pro přidání CSS souboru do administrace
	add_action('init', 'PO_PridaniCssSouboru');

}

// Kontrola aktualizace
require 'plugin-update-checker/plugin-update-checker.php';
$MyUpdateChecker = PucFactory::buildUpdateChecker(
'http://free.wptranslations.eu/?action=get_metadata&slug=podpora-online', //Metadata URL.
__FILE__, //Full path to the main plugin file.
'podpora-online' //Plugin slug. Usually it's the same as the name of the directory.
);

?>
