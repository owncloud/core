<ul>
	<li>
		<a class="app-external" target="_blank" href="http://owncloud.org/dev">
			<?php p($l->t('Add your App'));?> …
		</a>
	</li>

	<?php foreach($_['apps'] as $app):?>
	<li <?php if($app['active']) print_unescaped('class="active"')?> data-id="<?php p($app['id']) ?>"
		<?php if ( isset( $app['ocs_id'] ) ) { print_unescaped("data-id-ocs=\"{".OC_Util::sanitizeHTML($app['ocs_id'])."}\""); } ?>
			data-type="<?php p($app['internal'] ? 'internal' : 'external') ?>" data-installed="1">
		<a class="app<?php if(!$app['internal']) p(' externalapp') ?>"
			href="?appid=<?php p($app['id']) ?>"><?php p($app['name']) ?></a>
		<?php  if(!$app['internal'])
			print_unescaped('<span class="'.OC_Util::sanitizeHTML($app['internalclass']).' list">'.OC_Util::sanitizeHTML($app['internallabel']).'</span>') ?>
	</li>
	<?php endforeach;?>
	<li>
		<a class="app-external" target="_blank" href="http://apps.owncloud.com"><?php p($l->t('More Apps'));?> …</a>
	</li>
</ul>