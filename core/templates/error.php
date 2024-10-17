<ul class="error-wide">
	<?php foreach ($_["errors"] as $error):?>
		<li class='error'>
			<?php p($error['error']) ?><br>
			<a href="<?php p($_['base_url'])?>"><?php p($_['continue_text']) ?></a><br>
			<?php if (isset($error['hint']) && $error['hint']): ?>
				<p class='hint'><?php p($error['hint']) ?></p>
			<?php endif;?>
		</li>
	<?php endforeach ?>
</ul>
