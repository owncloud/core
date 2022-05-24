<?php
/**
 * @var array $_
 * @var \OCP\IL10N $l
 * @var OC_Defaults $theme
 */
?>
<div class="section">
	<h2 class="app-name"><?php p($l->t('System Status'));?></h2>
	<table>
		<tr>
			<?php
			// show system status
			// do not translate, keep original keywords = same output as via status.php
			foreach ($_['showStatus'] as $statusKey => $statusValue) {
				?>
				<td style="padding: 0 15px;"><?php p($statusKey); ?></td>
				<td style="padding: 0 15px;"><?php p($statusValue); ?></td>
		</tr>
			<?php
			}
			?>
	</table>
</div>
