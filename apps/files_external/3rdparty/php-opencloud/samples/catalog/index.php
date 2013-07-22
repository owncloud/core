<?php
// load shoe photos
$d = dir('./photos/');
$images = array();
while(FALSE !== ($file = $d->read())) {
    if (strpos($file, '.') !== 0)
        $images[] = $file;
}
?><!DOCTYPE html>
<html>
<head>
    <title>Catalog</title>
</head>
<body>
    <?php
    foreach($images as $filename) {
        printf('<img src="%s" title="%s"/>', $filename, $filename);
        echo "\n";
    }
    ?>
</body>
</html>
