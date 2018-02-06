<?php 

$file = new SplFileObject("data.txt");
$fileInfo = [];

$fileInfo['size'] = $file->getSize();
$fileInfo['filePath'] = $file->getPathname();
$fileInfo['type'] = $file->getType();
foreach ($fileInfo as $value){
	echo $value."<br>";
}
exit;