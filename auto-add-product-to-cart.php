<?php

add_action( 'template_redirect', 'add_product_to_cart' );
function add_product_to_cart() {
	if ( ! is_admin() ) {
		$product_id = 500;
		$found = false;
		if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->id == $product_id )
					$found = true;
			}
			if ( ! $found )
				WC()->cart->add_to_cart( $product_id );
		} else {
			WC()->cart->add_to_cart( $product_id );
		}
	}

}

?>
