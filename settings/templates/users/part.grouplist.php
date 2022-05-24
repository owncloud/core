<ul id="usergrouplist" data-sort-groups="<?php p($_['sortGroups']); ?>">
	<!-- Add new group -->
	<?php if ($_['isAdmin']) {
	?>
	<li id="newgroup-init">
		<a href="#">
			<span><?php p($l->t('Add Group'))?></span>
		</a>
	</li>
	<?php
} ?>
	<li id="newgroup-form" style="display: none">
		<form>
			<input type="text" id="newgroupname" placeholder="<?php p($l->t('Group')); ?>..." />
			<input type="submit" class="button icon-add" value="" />
		</form>
	</li>
	<!-- Everyone -->
	<li id="everyonegroup" data-gid="_everyone" data-usercount="" class="isgroup">
		<a href="#">
			<span class="groupname" title="<?php p($l->t('Everyone')); ?>">
				<?php p($l->t('Everyone')); ?>
			</span>
			<span class="usercount tag" id="everyonecount">
			</span>
		</a>
		<span class="utils">
		</span>
	</li>

	<!-- The Admin Group -->
	<?php foreach ($_["adminGroup"] as $adminGroup): ?>
		<li data-gid="admin" data-usercount="<?php p($adminGroup['usercount']); ?>" class="isgroup">
			<a href="#">
				<span class="groupname" title="<?php p($l->t('Admins')); ?>">
					<?php p($l->t('Admins')); ?>
				</span>
				<span class="usercount tag">
					<?php p($adminGroup['usercount']); ?>
				</span>
			</a>
			<span class="utils">
			</span>
		</li>
	<?php endforeach; ?>

	<!--List of Groups-->
	<?php foreach ($_["groups"] as $group): ?>
		<li data-gid="<?php p($group['name']) ?>" data-usercount="<?php p($group['usercount']) ?>" class="isgroup">
			<a href="#" class="dorename">
				<span class="groupname" title="<?php p($group['name']); ?>">
					<?php p($group['name']); ?>
				</span>
				<span class="usercount tag">
						<?php p($group['usercount']); ?>
				</span>
			</a>
			<span class="utils">
					<?php if ($_['isAdmin']): ?>
				<a href="#" class="action delete" original-title="<?php p($l->t('Delete'))?>">
					<img src="<?php print_unescaped(image_path('core', 'actions/delete.svg')) ?>" />
				</a>
				<?php endif; ?>
			</span>
		</li>
	<?php endforeach; ?>
</ul>
