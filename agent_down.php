<?php
	function getUpdatedURL($OS_TYPE){
		$filter = null;
		$root = $_SERVER['DOCUMENT_ROOT'];
		$agentDir = '/agent/desktop/';
		$absolutePath = $root.$agentDir;
		$filePrefix = 'NCDrive-Setup-v';

		if($OS_TYPE=='WIN'){
			$filter = 'exe';
		}else if($OS_TYPE=='OSX'){
			$filter = 'dmg';
		}
		$files = scandir($absolutePath);
		$maxVersion = 0;
		$fileTime = null;
		for($i=2; $i<count($files); $i++){
			$file = explode('.',$files[$i]);
			$ext = array_pop($file);
			$file = implode('.', $file);

			if($ext === $filter){
				$fileVersion = str_replace($filePrefix,'', $file);
				echo $fileVersion;
				if(floatval($maxVersion) < floatval($fileVersion)){
					$maxVersion = $fileVersion;
				}
			}
		}
		return implode('',
			array($agentDir,$filePrefix,$maxVersion,'.',$filter)
		);
	}
	if(strpos($_SERVER['HTTP_USER_AGENT'],'Mac OS X')){
		Header('Location: '.getUpdatedURL('OSX'));
	}else if(strpos($_SERVER['HTTP_USER_AGENT'],'Windows')){
		Header('Location: '.getUpdatedURL('WIN'));
	}else{
		echo '사용하시는 OS에 맞는 Agent가 없습니다. 문의바랍니다';
	}
?>