<?php
function enrichThemeVars($vars, $what) {
	$node = variable('node');
	if ($node == 'index' && $what == 'header')
		$vars['optional-slider'] = getSnippet('search');

	return $vars;
}
