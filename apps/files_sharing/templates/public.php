<input type="hidden" name="dir" value="<?php p($_['path']) ?>" id="dir">
<input type="hidden" name="downloadURL" value="<?php p($_['downloadURL']) ?>" id="downloadURL">
<input type="hidden" name="filename" value="<?php p($_['filename']) ?>" id="filename">
<input type="hidden" name="mimetype" value="<?php p($_['mimetype']) ?>" id="mimetype">
<header><div id="header">
	<a href="<?php print_unescaped(link_to('', 'index.php')); ?>" title="" id="owncloud"><img class="svg"
		src="<?php print_unescaped(image_path('', 'logo-wide.svg')); ?>" alt="ownCloud" /></a>
	<div class="header-right">
	<?php if (isset($_['folder'])): ?>
		<span id="details"><?php p($l->t('%s shared the folder %s with you',
			array($_['displayName'], $_['fileTarget']))) ?></span>
	<?php else: ?>
		<span id="details"><?php p($l->t('%s shared the file %s with you',
			array($_['displayName'], $_['fileTarget']))) ?></span>
	<?php endif; ?>
	<?php if($_['allowUpload'] == "1" or $_['allowUpload'] == "true") { ?>
			<form data-upload-id='1' id="data-upload-form" class="upload_wrapper" action="<?php print_unescaped(OCP\Util::linkTo('files', 'ajax/upload_public.php')); ?>" method="post" enctype="multipart/form-data" target="upload_target">
					<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" id="requesttoken">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php p($_['upload_max_filesize']) ?>" id="max_upload">
                                        <input type="hidden" class="max_human_file_size" value="(max <?php p($_['upload_max_human_filesize']) ?>MB)">
                                        <input type="hidden" name="dir" value="<?php echo p($_['path']) ?>" id="dir">
					<input type="hidden" name="uidOwner" value="<?php echo p($_['uidOwner']) ?>" id="uidOwner">
				 	<input type="hidden" name="public_uploading" value="1">
                                        <input class="file_upload_start" type="file" name='files[]' id="file_upload_start">
					<a href="#" onclick="$(this).parent().children('#file_upload_start').trigger('click')"><span class="button"><img id="upload_svg" alt="Upload" src="<?php print_unescaped(OCP\image_path("core", "actions/upload.svg")); ?>" /><?php p($l->t('Upload')) ?></span></a>
					<iframe name="upload_target" class='upload_target' src=""></iframe>
                                </form>
	<?php } ?>
		<?php if (!isset($_['folder']) || $_['allowZipDownload']): ?>
			<a href="<?php p($_['downloadURL']); ?>" class="button" id="download"><img
				class="svg" alt="Download" src="<?php print_unescaped(OCP\image_path("core", "actions/download.svg")); ?>"
				/><?php p($l->t('Download'))?></a>
		<?php endif; ?>
	</div>
</div></header>
<div id="preview">
	<?php if (isset($_['folder'])): ?>
		<?php print_unescaped($_['folder']); ?>
	<?php else: ?>
		<?php if (substr($_['mimetype'], 0, strpos($_['mimetype'], '/')) == 'image'): ?>
			<div id="imgframe">
				<img src="<?php p($_['downloadURL']); ?>" />
			</div>
		<?php elseif (substr($_['mimetype'], 0, strpos($_['mimetype'], '/')) == 'video'): ?>
			<div id="imgframe">
				<video tabindex="0" controls="" autoplay="">
				<source src="<?php p($_['downloadURL']); ?>" type="<?php p($_['mimetype']); ?>" />
				</video>
			</div>
		<?php else: ?>
		<ul id="noPreview">
			<li class="error">
				<?php p($l->t('No preview available for').' '.$_['fileTarget']); ?><br />
				<a href="<?php p($_['downloadURL']); ?>" id="download"><img class="svg" alt="Download"
					src="<?php print_unescaped(OCP\image_path("core", "actions/download.svg")); ?>"
					/><?php p($l->t('Download'))?></a>
			</li>
		</ul>
		<?php endif; ?>
	<?php endif; ?>
</div>
<footer><p class="info"><a href="http://owncloud.org/">ownCloud</a> &ndash;
<?php p($l->t('web services under your control')); ?></p></footer>
