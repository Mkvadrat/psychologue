<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$select_post = sanitize_text_field( $_POST[ 'select_post' ] );
$taxonomies = get_object_taxonomies( $select_post, 'objects' );
?>
<option value="select" <?php if ( isset( $et_option[ 'select_post_taxonomy' ] ) && $et_option[ 'select_post_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Select', ETLAK_TD ); ?></option>

<?php
if ( $select_post == 'post' ) {
    $exclude = array( 'post_format' );
// Filter out all unwanted post types
    foreach ( $taxonomies as $key => $value ) {
        if ( in_array( $key, $exclude ) ) {
            unset( $taxonomies[ $key ] );
        }
    }
    if ( is_array( $taxonomies ) ) {
        foreach ( $taxonomies as $tax ) {
            $value = $tax -> name;
            $label = $tax -> label;
            ?>
            <option value="<?php echo $value; ?>" <?php if ( isset( $et_option[ 'select_post_taxonomy' ] ) && $et_option[ 'select_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
            <?php
        }
    }
}
else {
    foreach ( $taxonomies as $tax ) {
        $value = $tax -> name;
        $label = $tax -> label;
        ?>
        <option value="<?php echo $value; ?>" <?php if ( isset( $et_option[ 'select_post_taxonomy' ] ) && $et_option[ 'select_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
        <?php
    }
}


