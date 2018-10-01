<select id="timezoneInput" name="timezoneInput" data-placeholder="<?php p($l->t('Timezone'));?>">
	<?php if($_['activeTimezone'] === null) { ?>
		<option value="<?php p($_['activeTimezone']);?>">
			<?php p($l->t('Server default'));?>
		</option>
	<?php } else { ?>
		<option value="<?php p($_['activeTimezone']);?>">
			<?php p($_['activeTimezone']);?>
		</option>
	<?php } ?>
	<?php foreach ($_['timezones'] as $timezone):?>
		<option value="<?php p($timezone);?>">
			<?php p($timezone);?>
		</option>
	<?php endforeach;?>
</select>
