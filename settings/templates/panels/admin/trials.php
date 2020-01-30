<div class="section" id="trials">
	<h2 class="app-name"><?php p($l->t('Trials')); ?></h2>
	<table class="grid" id="trial_table">
		<thead>
			<tr>
				<th><?php p($l->t('App id')); ?></th>
				<th><?php p($l->t('Trial started on')); ?></th>
				<th><?php p($l->t('Trial State')); ?></th>
				<th><?php p($l->t('License State')); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
			use OCP\License\ILicenseManager;
			$now = \time();
		?>
		<?php foreach ($_['trialInfo'] as $appid => $info): ?>
			<tr>
				<td><?php p($appid); ?></td>
				<td><?php p(\date('c', $info['trial_start'])); ?></td>

			<?php if ($info['trial_end'] > $now): ?>
				<td class="success_msg"><?php p($l->t('Active')); ?></td>
			<?php else: ?>
				<td class="error_msg"><?php p($l->t('Finished')); ?></td>
			<?php endif; ?>

			<?php if ($info['license_state'] === ILicenseManager::LICENSE_STATE_VALID): ?>
				<td class="success_msg"><?php p($l->t('Valid')); ?></td>
			<?php elseif ($info['license_state'] === ILicenseManager::LICENSE_STATE_MISSING): ?>
				<td class="error_msg"><?php p($l->t('Missing')); ?></td>
			<?php elseif ($info['license_state'] === ILicenseManager::LICENSE_STATE_INVALID): ?>
				<td class="error_msg"><?php p($l->t('Invalid')); ?></td>
			<?php elseif ($info['license_state'] === ILicenseManager::LICENSE_STATE_EXPIRED): ?>
				<td class="error_msg"><?php p($l->t('Expired')); ?></td>
			<?php else: ?>
				<td class="error_msg"><?php p($l->t('Unknown')); ?></td>
			<?php endif; ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>