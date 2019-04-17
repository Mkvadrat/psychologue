<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$select_tax = sanitize_text_field( $_POST[ 'select_tax' ] );
$tax_type = sanitize_text_field( $_POST[ 'tax_type' ] );
if ( $tax_type == 'multiple-taxonomy' ) {
    if ( $select_tax == 'select' ) {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Terms', ETLAK_TD );
        ?></option>
        <?php
    } else {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Terms', ETLAK_TD ); ?></option>
        <?php
        echo $this -> etlak_fetch_category_list( $select_tax, $et_option[ 'taxonomy_terms' ] );
    }
}
if ( $tax_type == 'simple-taxonomy' ) {
    if ( $select_tax == 'select' ) {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Terms', ETLAK_TD );
        ?></option>
        <?php
    } else {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Term', ETLAK_TD ); ?></option>
        <?php
        echo $this -> etlak_fetch_category_list( $select_tax, $et_option[ 'simple_taxonomy_terms' ] );
    }
}