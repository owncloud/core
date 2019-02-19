<?php
script('files_sharing', 'usersettings');
?>

<div class="section" id="files-sharing">
    <h2 id="app-name"><?php p('Shared Files')?></h2>
    <div class="indent">
        <p><?php p('Selected Path For Shared Files:')?></p>
        <input id="input-path" name="shared_files_path" class="input-append" value="">
        <button id="save-path-button" class="btn">Save</button>
    </div>
</div>
