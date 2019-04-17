<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$select_taxonomy = sanitize_text_field( $_POST[ 'select_type' ] );
$field_title = 'et_option[filter]';
$terms = get_terms( $select_taxonomy, array( 'hide_empty' => 0 ) );
$categoryHierarchy = array();
$this -> etlak_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
$form .= '<div class="et-checkbox-wrap">';

if ( count( $categoryHierarchy ) > 0 ) {
    $form .= $this -> etlak_print_checkbox( $categoryHierarchy, '', $field_title );
}
$form .= '</div>';
echo $form;



