<?php 



?>

<div class="wrap">
<h2>WooCommerce Custom CSS Settings:</h2>

<form method="post" action="options.php"> 
	<div style="display: flex;align-items: center;">
		<h3 for="Facebook">Facebook: </h3>
		<input type="text" name="Facebook" value="<?php echo get_option('Facebook'); ?>" style="width:250px; height:25px;" />
	</div>
	<?php submit_button(); ?>
</form>

</div>

