<?php /** @var $title string */ ?>
<?php $this->layout('base', ['title' => $title, 'bodyId' => 'body-login']) ?>
<?php $this->start('login') ?>
	<script src="<?=$this->uri() . '/pub/' . $this->asset('js/login.js')?>"></script>
		<div class="wrapper">
			<div class="v-align">
				<header role="banner">
					<div id="header">
						<div class="logo svg">
							<h1 class="hidden-visually">MobiFone</h1>	
						</div>
						<div id="logo-claim" style="display:none;"></div>
					</div>
				</header>
	
				<br/>
				<p class="warning">Please provide the <em>unhashed</em> "updater.secret" from your MobiFone's config/config.php:</p>
				<form method="post" name="login">
					<fieldset>
						<input type="password" name="password" id="password" value=""
							   placeholder="Secret"
							   autocomplete="on" autocapitalize="off" autocorrect="off" required>
						<label for="password" class="infield">Password</label>
						<input type="submit" id="submit" class="login primary icon-confirm svg" title="Log in" value="" />
						
					</fieldset>
					<p class="warning" id="invalidPasswordWarning">Invalid password</p>
				</form>

				<div class="push"></div><!-- for sticky footer -->
			</div>
		</div>
		<footer role="contentinfo">
			<p class="info">
				<a href="https://cloud.mobifone.vn/" target="_blank" rel="noreferrer">MobiFone</a> – web services under your control
			</p>
		</footer>
<?php $this->stop() ?>
