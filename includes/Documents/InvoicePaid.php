<?php
namespace WPO\IPS\Documents;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( '\\WPO\\IPS\\Documents\\InvoicePaid' ) ) :

class InvoicePaid extends Invoice {
    public function __construct( $order = 0 ) {
        parent::__construct( $order );
        $this->type  = 'invoice-paid';
        $this->title = __( 'Invoice All Payments Completed', 'woocommerce-pdf-invoices-packing-slips' );
    }

    public function get_title() {
        return __( 'Invoice All Payments Completed', 'woocommerce-pdf-invoices-packing-slips' );
    }
}

endif;
?>
