<?php
function after_menu() {
	do_magic_menu('_demo', 'login', [
		'for-office-use',
		'user-contributions',
	]);
	do_magic_menu('_demo', 'signup', [
		'users',
	]);
}

function do_magic_menu($section, $node, $items) {
	extract(variable('menu-settings'));
	$name = humanize($node);
	echo '<li class="' . $itemClass . ' ' . $subMenuClass . '"><a class="' . $anchorClass . '">' . $name . '</a>' . NEWLINE;
	echo '	<ul class="' . $ulClass . '">' . NEWLINE;

	foreach ($items as $slug) {
		$text = humanize($slug);
		variable($key = getSectionKey($section, MENUNAME) . '_home', 'off');
		renderHeaderMenu($section, $node . '/' . $slug, $text);
	}

	echo '	</ul>' . variable('2nl');
	echo '</li>' . NEWLINE;
}

function renderDemoForm($fullFileName) {
	$formName = pathinfo($fullFileName, PATHINFO_FILENAME);

	//PageName	FileName	DriveLink	EmbedLink
	$sheetName = __DIR__ . '/_forms.tsv';
	$sheet = getSheet($sheetName, 'PageName');
	if (!(isset($sheet->group[$formName])))
		peDie('Demo Form Not Found - Kindly Contact the Developer', ['name' => $formName, 'sheet' => $sheetName], false);

	$item = $sheet->group[$formName][0];
	$name = $sheet->getValue($item, 'FileName');
	$link = $sheet->getValue($item, 'DriveLink');
	//$embed = $sheet->getValue($item, 'EmbedLink');

	contentBox($formName, 'container');
	h2(humanize($name). ' ' . makeLink('[Edit]', $link));
	echo getCodeSnippet('latin-2paras') . BRNL . BRNL;
	contentBox('end');

	variable('no-page-menu', true);
}
