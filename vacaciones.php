<?php
/*
Plugin Name: Vacaciones Plugin
Description: Plugin para mostrar un mensaje de vacaciones y un div en el header.
Version: 1.0
Author: Tu Nombre
*/

// Agregar el código JavaScript al footer del sitio
function vacaciones_script() {
    if (is_home() || is_front_page() || is_product() || is_page()) {
        $mensaje = "Estimados clientes,\n\nQueremos informarles que en Destilería Martes Santo estaremos disfrutando de unas merecidas vacaciones desde el sábado 9 de septiembre hasta el lunes 18 de septiembre.\n\nDurante este periodo, todos los pedidos que realicen a través de nuestra página web y por este medio serán procesados en el orden en que se reciban a partir del lunes 18 de septiembre.";
        wp_enqueue_script('vacaciones-script', plugin_dir_url(__FILE__) . 'vacaciones.js', array(), '1.0', true);
        wp_localize_script('vacaciones-script', 'vacacionesData', array('mensaje' => $mensaje));
    }
}
add_action('wp_enqueue_scripts', 'vacaciones_script');

// Agregar el div al header
function vacaciones_header_div() {
    if (is_home() || is_front_page() || is_product() || is_page()) {
        echo '<div id="vacaciones-header">En Destilería Martes Santo estaremos disfrutando de unas merecidas vacaciones desde el sábado 9 de septiembre hasta el lunes 18 de septiembre. Su pedido se procesará por orden de entrada a partir del día 18. ¡Gracias!</div>';
    }
}
add_action('wp_head', 'vacaciones_header_div');
?>
