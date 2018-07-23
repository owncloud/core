<select id="<?php p($_['selectId'])?>" name="<?php p($_['selectName'])?>" data-placeholder="<?php p($l->t('Language'));?>">
	<option value="<?php p($_['activelanguage']['code']);?>">
		<?php p($_['activelanguage']['name']);?>
	</option>
	<?php foreach ($_['commonlanguages'] as $language):?>
		<option value="<?php p($language['code']);?>">
			<?php p($language['name']);?>
		</option>
	<?php endforeach;?>
	<optgroup label="––––––––––"></optgroup>
	<?php foreach ($_['languages'] as $language):?>
		<option value="<?php p($language['code']);?>">
			<?php p($language['name']);?>
		</option>
	<?php endforeach;?>
</select>
