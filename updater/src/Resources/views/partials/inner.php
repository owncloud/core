<link rel="stylesheet" href="<?=$this->uri() . '/pub/' . $this->asset('css/main.css')?>" />
<script src="<?=$this->uri() . '/pub/' . $this->asset('js/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?=$this->uri() . '/pub/' . $this->asset('js/main.js')?>"></script>
<div id="meta-information" data-endpoint="<?= $this->uri() ?>"></div>
<header role="banner"><div id="header">
		<a href="<?= \preg_replace('/\/updater\/.*$/', '', $this->uri()) ?>" id="owncloud" tabindex="1">
			<div class="logo-icon svg">
				<h1 class="hidden-visually">MobiFone</h1>
			</div>
		</a>

		<a href="#" class="header-appname-container" tabindex="2">
			<h1 class="header-appname">Updater</h1>
		</a>

		<div id="logo-claim" style="display:none;"></div>
	</div></header>
<div id="content-wrapper">
	<div id="content">

		<div id="app-navigation">
			<ul>
				<li><a href="#progress">Update</a></li>
				<li><a href="#backup">Backups</a></li>
			</ul>
		</div>
		<div id="app-content">
			<div id="error" class="section hidden"></div>
			<div id="output" class="section hidden"></div>

			<ul id="progress" class="section">
				<li id="step-init" class="step icon-loading current-step">
					<h2>Initializing</h2>
					<div class="output hidden"></div>
				</li>
				<li id="step-check" class="step">
					<h2>Checking system</h2>
					<div class="output hidden"></div>
				</li>
				<li id="step-checkpoint" class="step">
					<h2>Creating a checkpoint</h2>
					<div class="output hidden"></div>
				</li>
				<li id="step-download" class="step">
					<h2>Downloading</h2>
					<div class="output hidden"></div>
				</li>
				<li id="step-coreupgrade" class="step">
					<h2>Updating core</h2>
					<div class="output hidden"></div>
				</li>
				<li id="step-appupgrade" class="step">
					<h2>Updating apps</h2>
					<div class="output hidden"></div>
				</li>
				<li id="step-finalize" class="step">
					<h2>Finishing the update</h2>
					<div class="output hidden"></div>
				</li>
				<li id="step-done" class="step">
					<h2>Done</h2>
					<div class="output hidden"></div>
				</li>
			</ul>

			<div id="backup" class="section">
				<h2>This app will only backup core files (no personal data).</h2>
				<p>Please always do a separate backup of database and personal data before updating.</p>
				<table class="updater-backups-table">
					<thead>
						<tr>
							<th>Backup</th>
							<th>Done on</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr class="template">
							<td class="item"></td>
							<td class="item"></td>
							<td class="item"></td>
						</tr>
						<?php /** @var $checkpoints [] */ ?>
						<?php foreach ($checkpoints as $checkpoint) { ?>
						<tr>
							<td class="item"><?= $this->e($checkpoint['title']) ?></td>
							<td class="item"><?= $this->e($checkpoint['date']) ?></td>
							<td class="item"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<button id="create-checkpoint">Create a checkpoint</button>
			</div>
		</div>
	</div>
</div>
