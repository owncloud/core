<form id="lucenesearchform">
	<fieldset class="personalblock">
		<strong>Lucene Search status</strong><br />
			<?php if ($_['index_created']): ?>
				Index Size:<?php echo $_['index_count'] ?>, Documents:<?php echo $_['index_numDocs']?>, Files in Cache:<?php echo $_['files_count']?>
				
				<?php if ($_['index_count']<$_['files_count']): ?>
				<input id="startluceneindexer" type="button" value="update index" />
				<span id="index-message" style="display:none;">
					Indexing in progress: <span id="index-count"></span>/<?php echo $_['files_count']?>,
					<span id="index-current"></span>
				</span>
				<?php endif; ?>
			<?php else: ?>
				Somethings broken ...
			<?php endif; ?>
	</fieldset>
</form>
