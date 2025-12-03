<!DOCTYPE html>
<html class="ng-csp" data-placeholder-focus="false" lang="<?php p($_['language']); ?>" translate="no">
	<head data-requesttoken="<?php p($_['requesttoken']); ?>">
		<meta charset="utf-8">
		<meta name="google" content="notranslate" />
		<title>
		<?php p($theme->getTitle()); ?>
		</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="referrer" content="never">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<?php if ($theme->getiTunesAppId() !== '') {
			?>
			<meta name="apple-itunes-app" content="app-id=<?php p($theme->getiTunesAppId()); ?>">
		<?php
		} ?>
		<meta name="theme-color" content="<?php p($theme->getMailHeaderColor()); ?>">
		<link rel="icon" href="<?php print_unescaped(image_path('', 'favicon.ico')); /* IE11+ supports png */ ?>">
		<link rel="apple-touch-icon-precomposed" href="<?php print_unescaped(image_path('', 'favicon-touch.png')); ?>">
		<link rel="mask-icon" sizes="any" href="<?php print_unescaped(image_path('', 'favicon-mask.svg')); ?>" color="#041e42">
		<?php foreach ($_['cssfiles'] as $cssfile): ?>
			<link rel="stylesheet" href="<?php print_unescaped($cssfile); ?>">
		<?php endforeach; ?>
		<?php foreach ($_['printcssfiles'] as $cssfile): ?>
			<link rel="stylesheet" href="<?php print_unescaped($cssfile); ?>" media="print">
		<?php endforeach; ?>
		<?php foreach ($_['jsfiles'] as $jsfile): ?>
			<script src="<?php print_unescaped($jsfile); ?>"></script>
		<?php endforeach; ?>
		<?php print_unescaped($_['headers']); ?>
		<style>
			
			
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			
			body, html {
				width: 100%;
				height: 100%;
				overflow: hidden; /* Ngăn chặn cuộn trên toàn bộ trang */
			}
			
			.container-cs {
				position: relative;
				overflow: hidden;
				background-color: #1f1f47;
				width: 100vw;
				height: 100vh;
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				text-align: center;
			}
			
			.container-cs:before,
			.container-cs:after {
				content: "";
				position: absolute;
				background: linear-gradient(180deg, rgba(47,184,255,.42) 31.77%, #5c9df1 100%);
				animation: morph 12s linear infinite alternate, spin 18s linear infinite;
				z-index: 1;
				will-change: border-radius, transform;
				pointer-events: none;
				border-radius: 10px;
			}
			
			/* Điều chỉnh kích thước hình cho responsive */
			.container-cs:before {
				width: min(50vmax, 80vw);
				height: min(50vmax, 80vh);
				left: -15vmin;
				top: -15vmin;
				transform-origin: 50% 50%;
			}
			
			.container-cs:after {
				width: min(40vmax, 70vw);
				height: min(40vmax, 70vh);
				right: -10vmin;
				bottom: -10vmin;
				animation: morph 10s linear infinite alternate, spin 24s linear infinite reverse;
				transform-origin: 20% 20%;
			}
			
			/* @keyframes morph {
				0% {
					border-radius: 35% 65% 65% 35% / 60% 40%;
				}
				100% {
					border-radius: 50%; 
				}
			} */
			
			@keyframes spin {
				100% {
					transform: rotate(1turn);
				}
			}
			

			.v-align {
				position: relative; /* hoặc absolute nếu cần */
				z-index: 9999; /* Giá trị cao để đè lên các thành phần khác */
				background-color: rgba(255, 255, 255, 0.15) !important; 
				padding: 30px;
				border-radius: 15px !important;
				border: 1px solid rgba(255, 255, 255, .18) !important;
				box-shadow: 0 8px 32px rgba(31, 38, 135, .18) !important;
				width: 350px; 
				margin: auto;
				text-align: center;
				margin-top: -70px !important;
			}
		</style>
	</head>
	<body id="<?php p($_['bodyid']);?>" <?php
			if ($theme->getName() !== 'ownCloud') {
				print_unescaped('class="theme-' . \str_replace(' ', '-', $theme->getName()) . ' has-theme"');
			} ?> >
		<?php include('layout.noscript.warning.php'); ?>
			<div class="container-cs">
				<div class="wrapper">
					<div class="v-align">
						<?php if ($_['bodyid'] === 'body-login'): ?>
							<header role="banner">
								<div id="header">
									<div class="logo">
										<h1 class="hidden-visually">
											<?php print_unescaped($theme->getHTMLName()); ?>
										</h1>
									</div>
									<div id="logo-claim" style="display:none;"><?php print_unescaped($theme->getLogoClaim()); ?></div>
								</div>
							</header>
						<?php endif; ?>
						<?php print_unescaped($_['content']); ?>
					</div>
				</div>
			</div>

		<footer role="contentinfo">
			<p class="info">
				<?php print_unescaped($theme->getLongFooter()); ?>
			</p>
		</footer>
	</body>
</html>
