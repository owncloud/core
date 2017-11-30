<?php /** @var $_ array */ ?>

<ul class="error-wide">
	<li class='error'>
		<?php p($l->t('You are accessing the server from an untrusted domain.')); ?><br>

		<p class='hint'>
			<?php p($l->t('Please contact your administrator. If you are an administrator of this instance, configure the "trusted_domains" setting in config/config.php. ')) ?>
			<?php print_unescaped($l->t('An example configuration is provided in config/config.sample.php or at the <a target="_blank" rel="noreferrer" href="%s">documentation</a>.', [link_to_docs('admin-untrusted-domain')])); ?>
		</p>
	</li>
</ul>
