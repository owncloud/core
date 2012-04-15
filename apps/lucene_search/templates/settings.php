<form id="lucenesearchform">
	<fieldset class="personalblock">
            <strong>Lucene Search status</strong><br />
                <?php if ($_['index_created']) { 
                    echo 'Index Size:'.$_['index_count'].', Documents:'.$_['index_numDocs'] ;
                    } else { ?>
                    Somethings broken ...
                <?php } ?>
	</fieldset>
</form>
