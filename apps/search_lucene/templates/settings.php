<form id="lucenesearchform">
	<fieldset class="personalblock">
		<strong>Lucene Search status</strong><br />
			<?php if ($_['index_created']): ?>
				Index Size:<?php echo $_['index_count'] ?>, Documents:<?php echo $_['index_numDocs']?>
			<?php else: ?>
				Somethings broken ...
			<?php endif; ?>
	</fieldset>
</form>
