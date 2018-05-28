<?php
/**
 * @var array $_
 * @var \OCP\IL10N $l
 * @var OC_Defaults $theme
 */
script('settings', 'panels/legal');
?><div class="section">
	<h2 class="app-name"><?php p($l->t('Legal'));?></h2>
	<p>
		<label for="legal_imprint"><?php p($l->t('Imprint URL:')); ?></label>
		<input type="text" name="legal_imprint" id="legal_imprint" placeholder="<?php p($l->t('Imprint URL'))?>"
			   value='<?php p($_['legal_imprint']) ?>' />
		<span id="legal_imprint_msg" class="msg"></span>
	</p>
	<p>
		<label for="legal_privacy_policy"><?php p($l->t('Privacy Policy URL:')); ?></label>
		<input type="text" name="legal_privacy_policy" id="legal_privacy_policy" placeholder="<?php p($l->t('Privacy Policy URL'))?>"
		   value='<?php p($_['legal_privacy_policy']) ?>' />
		<span id="legal_privacy_policy_msg" class="msg"></span>
	</p>
</div>
