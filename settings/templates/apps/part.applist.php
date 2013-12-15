<?php
/**
 * ownCloud - App Settings
 * @author Robin Appelman
 * @author Raghu Nayyar
 * @copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * @copyright (c) 2013, Raghu Nayyar <raghu.nayyar.007@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
 ?>
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
		<a class="app-external" target="_blank" href="http://apps.owncloud.com">
			<?php p($l->t('More Apps'));?> …
		</a>
	</li>
</ul>