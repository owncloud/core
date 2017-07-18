<?php /** @var $_ array */ ?>

<ul class="error-wide">
	<li class='error'>
		<?php p($l->t('You are accessing the server from an untrusted domain.')); ?><br>

		<p class='hint'>
			<?php p($l->t('Please contact your administrator. If you are an administrator of this instance, configure the "trusted_domains" setting in config/config.php. An example configuration is provided in config/config.sample.php.')); ?>
		</p>
	</li>
</ul>
