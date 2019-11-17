<?php


function serchItem ($path, $needKey)
{
	$file = fopen($path, "r+");

	$buff = '';

	$pos = false;

	$sep1 = ';';
	$sep2 = ':';

	while(!feof($file)){
		$buff .= fread($file, 1);
		$posEnd = strpos($buff, $sep1);

		if($posEnd) {		
			$row = explode($sep1, $buff);
			$items = explode($sep2, $row[0]);
			
			if($items[0] == $needKey) {
				fclose($file);
				return $items[1];
			} else {
				$buff = $row[1];
			}		
		}
	}
	
	fclose($file);
	return 'undef';
	
}

echo serchItem('text.txt', 'key6');
