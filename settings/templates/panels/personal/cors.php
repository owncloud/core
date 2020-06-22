<?php
/**
 * @author Noveen Sachdeva "noveen.sachdeva@research.iiit.ac.in"
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

script('settings', 'panels/cors');

?>

<div class="section" id="cors">
	<h2 class="app-name">CORS</h2>
	<span class="app-name">Cross-Origin Resource Sharing</span>

	<h3><?php p($l->t('White-listed Domains')); ?></h3>
	<p id="noDomains" <?php if (!empty($_['domains'])) { ?>class="hidden"<?php } ?>>
		<?php p($l->t('No Domains.')); ?>
	</p>

	<table class="grid">
		<thead>
		<tr>
			<th id="headerName" scope="col"><?php p($l->t('Domain')); ?></th>
			<th id="headerRemove">&nbsp;</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach ($_['domains'] as $id => $domain) { ?>
				<tr>
					<td><?php p($domain); ?></td>
					<td>
						<input data-domain="<?php p($domain) ?>" type="button" class="button icon-delete removeDomainButton" value="">
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3><?php p($l->t('Add Domain')); ?></h3>
		<input id="domain" name="domain" type="text" placeholder="<?php p($l->t('Domain')); ?>">
		<input id="corsAddNewDomain" type="submit" class="button" value="<?php p($l->t('Add')); ?>">
	</form>
</div>
