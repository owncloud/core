<!DOCTYPE html>
<!--[if IE 9]><html class="ng-csp ie ie9 lte9" data-placeholder-focus="false" lang="en" ><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="ng-csp" data-placeholder-focus="false" lang="en" ><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<?php /** @var $title string */ ?>
		<title>ownCloud	Updater - <?=$this->e($title)?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="referrer" content="never">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="<?=$this->uri() . '/pub/' . $this->asset('css/main.css')?>" />
		<script src="<?=$this->uri() . '/pub/' . $this->asset('js/vendor/jquery/jquery.min.js')?>"></script>
	</head>
	<?php /** @var $bodyId string */ ?>
	<body id="<?=$this->e($bodyId)?>">
		<noscript>
		<div id="nojavascript">
			<div>
				This application requires JavaScript for correct operation. Please <a href="http://enable-javascript.com/" target="_blank" rel="noreferrer">enable JavaScript</a> and reload the page.
			</div>
		</div>
		</noscript>
		<?=$this->section('login')?>
		<?=$this->section('inner')?>
	</body>
</html>
