<form id="versionssettings">
        <fieldset class="personalblock">
	        <legend><strong><?php echo $l->t('Files Versioning');?></strong></legend>
			
			<input type="checkbox" name="versions" id="versions" value="1" <?php if ($_['versioningEnabled']=='true') echo ' checked="checked"'; ?> />
			<label for="versions"><?php echo $l->t('Enable Versioning'); ?></label> <br/>
			
			<?php echo $l->t('Limit'); ?>: <select name='versionLimitType' id='versionLimitType' <?php if (!$_['versioningEnabled']) echo ' disabled="disabled"'; ?> >
					<option value='size'><?php echo $l->t('Maximal size of versions per file'); ?></option>
					<option value='number'><?php echo $l->t('Maximal number of versions per file'); ?></option>
				</select> <input name="maxVersions" id="maxVersions" style="width:90px;" value='<?php if ( $_['versioningLimitType'] == 'size') echo $_['versioningLimitSize']; else echo $_['versioningLimitNumber']; ?>' title="<?php echo $l->t( '0 is unlimited' ); ?>"<?php if (!$_['versioningEnabled']) echo ' disabled="disabled"'; ?> />
        </fieldset>
</form>
