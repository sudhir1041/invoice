<?php
namespace WPO\IPS\Documents;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( '\\WPO\\IPS\\Documents\\FullPaymentInvoice' ) ) :
class FullPaymentInvoice extends Invoice {
    public function __construct( $order = 0 ) {
        $this->type  = 'full-payment-invoice';
        $this->title = __( 'PDF Invoice All Payments Completed', 'woocommerce-pdf-invoices-packing-slips' );
        $this->icon  = WPO_WCPDF()->plugin_url() . '/assets/images/invoice.svg';
        parent::__construct( $order );
        $this->output_formats = apply_filters( 'wpo_wcpdf_document_output_formats', array( 'pdf' ), $this );
    }
}
endif;
