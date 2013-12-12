<div id="rightcontent">
	<div class="appinfo">
	<h3><strong><span class="name"><?php p($l->t('Select an App'));?></span></strong><span
		class="version"></span><small class="externalapp" style="visibility:hidden;"></small></h3>
	<span class="score"></span>
	<p class="description"></p>
	<img src="" class="preview hidden" />
	<p class="appslink hidden"><a href="#" target="_blank"><?php
		p($l->t('See application page at apps.owncloud.com'));?></a></p>
	<p class="license hidden"><?php
		print_unescaped($l->t('<span class="licence"></span>-licensed by <span class="author"></span>'));?></p>
	<input class="enable hidden" type="submit" />
	<input class="update hidden" type="submit" value="<?php p($l->t('Update')); ?>" />
	<div class="warning hidden"></div>
	</div>
</div>