<?php
//$result = ['support-groups' => '1. Available Support Groups'];
$result = [];
$sheet = getSheet(__DIR__ . '/all-listings.tsv', 'level');
$topLevels = $sheet->group['1'];

foreach ($topLevels as $item) {
	$result[$sheet->getValue($item, 'slug')] =
		$sheet->getValue($item, 'sno') . '. ' .
		$sheet->getValue($item, 'site');
}

return $result;
