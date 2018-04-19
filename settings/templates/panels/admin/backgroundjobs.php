<?php
script('settings', 'panels/backgroundjobs');
/**
 * @var array $_
 * @var \OCP\IL10N $l
 */
?>
<div class="section" id="backgroundjobs">
	<h2 class="app-name has-documentation"><?php p($l->t('Cron'));?></h2>
	<?php if ($_['cron_log']): ?>
	<p class="cronlog inlineblock">
		<?php if ($_['lastcron'] !== false):
			$relative_time = relative_modified_date($_['lastcron']);
			$absolute_time = OC_Util::formatDate($_['lastcron']);
			if (\time() - $_['lastcron'] <= 3600): ?>
				<span class="status success"></span>
				<span class="crondate" original-title="<?php p($absolute_time);?>">
					<?php p($l->t("Last cron job execution: %s.", [$relative_time]));?>
				</span>
			<?php else: ?>
				<span class="status error"></span>
				<span class="crondate" original-title="<?php p($absolute_time);?>">
					<?php p($l->t("Last cron job execution: %s. Something seems wrong.", [$relative_time]));?>
				</span>
			<?php endif;
		else: ?>
			<span class="status error"></span>
			<?php p($l->t("Cron was not executed yet!"));
		endif; ?>
	</p>
	<?php endif; ?>
	<a target="_blank" rel="noreferrer" class="icon-info"
		title="<?php p($l->t('Open documentation'));?>"
		href="<?php p(link_to_docs('admin-background-jobs')); ?>"></a>
	<p>
		<input type="radio" name="mode" class="radio" value="ajax"
			   id="backgroundjobs_ajax" <?php if ($_['backgroundjobs_mode'] === "ajax") {
			print_unescaped('checked="checked"');
		} ?>>
		<label for="backgroundjobs_ajax">AJAX</label><br/>
		<em><?php p($l->t("Execute one task with each page loaded")); ?></em>
	</p>
	<p>
		<input type="radio" name="mode" class="radio" value="webcron"
			   id="backgroundjobs_webcron" <?php if ($_['backgroundjobs_mode'] === "webcron") {
			print_unescaped('checked="checked"');
		} ?>>
		<label for="backgroundjobs_webcron">Webcron</label><br/>
		<em><?php p($l->t("cron.php is registered at a webcron service to call cron.php every 15 minutes over http.")); ?></em>
	</p>
	<p>
		<input type="radio" name="mode" class="radio" value="cron"
			   id="backgroundjobs_cron" <?php if ($_['backgroundjobs_mode'] === "cron") {
			print_unescaped('checked="checked"');
		} ?>>
		<label for="backgroundjobs_cron">Cron</label><br/>
		<em><?php p($l->t("Use system's cron service to call the cron.php file every 15 minutes.")); ?></em>
	</p>
</div>
