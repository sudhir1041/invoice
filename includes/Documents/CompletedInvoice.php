<?php
namespace WPO\IPS\Documents;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Completed Invoice Document
 */
class CompletedInvoice extends Invoice {
    public function __construct( $order = 0 ) {
        $this->type  = 'completed-invoice';
        $this->slug  = 'completed_invoice';
        $this->title = __( 'PDF Invoice All Payments Completed', 'woocommerce-pdf-invoices-packing-slips' );
        parent::__construct( $order );
    }

    /**
     * Display confirmation message.
     */
    public function all_payments_message() {
        echo '<h2 style="text-align:center;">' . esc_html__( 'All Payments Completed', 'woocommerce-pdf-invoices-packing-slips' ) . '</h2>';
    }

    public function get_html( $args = array() ) {
        add_action( 'wpo_wcpdf_after_order_details', array( $this, 'all_payments_message' ) );
        $html = parent::get_html( $args );
        remove_action( 'wpo_wcpdf_after_order_details', array( $this, 'all_payments_message' ) );
        return $html;
    }

    /**
     * Hide due date for completed invoices.
     */
    public function show_due_date(): bool {
        return false;
    }
}
