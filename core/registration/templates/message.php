<?php if ( $_['errors'] ) { 
	foreach ( $_['errors'] as $error ) { ?>
	<div class="error">
		<p><?php echo $error; ?></p>
	</div>
	<?php }
}
if ( $_['messages'] ) {
	foreach ($_['messages'] as $message ) {?>
	<p><?php echo $message; ?> </p>
	<?php } } ?>
