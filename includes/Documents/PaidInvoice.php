<?php
namespace WPO\IPS\Documents;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( '\\WPO\\IPS\\Documents\\PaidInvoice' ) ) :

/**
 * Invoice document shown when all payments are completed.
 */
class PaidInvoice extends Invoice {

    /**
     * Init/load the order object.
     *
     * @param int|object|\WC_Order $order Order to init.
     */
    public function __construct( $order = 0 ) {
        $this->type = 'paid-invoice';
        $this->title = __( 'Invoice', 'woocommerce-pdf-invoices-packing-slips' );
        $this->icon  = WPO_WCPDF()->plugin_url() . '/assets/images/invoice.svg';

        parent::__construct( $order );

        // only pdf output format
        $this->output_formats = apply_filters( 'wpo_wcpdf_document_output_formats', array( 'pdf' ), $this );
    }

    /**
     * Hide due date for this document.
     */
    public function show_due_date(): bool {
        return false;
    }

    /**
     * Add confirmation message to document notes.
     */
    public function get_document_notes() {
        $notes = parent::get_document_notes();
        $notes .= '<p>' . __( 'All Payments Completed', 'woocommerce-pdf-invoices-packing-slips' ) . '</p>';
        return $notes;
    }
}

endif; // class_exists
