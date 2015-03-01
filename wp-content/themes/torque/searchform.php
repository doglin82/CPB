<?php
/**
 * The template for displaying search forms in _s
 *
 * @package inka
 */
?>
<div class="search-form">
            	<form role="search"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
             		<div class="form-group">
               		<input type="text" class="form-control" placeholder="<?php echo esc_attr_x( 'Search here...', 'placeholder', 'torque' ); ?>"  value="<?php echo esc_attr( get_search_query() ); ?>" name="s"  title="<?php echo esc_attr_x( 'Search for:', 'label', 'torque' ); ?>">
             		</div>
            		</form>
</div>