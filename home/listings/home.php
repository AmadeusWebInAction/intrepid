<?php
contentBox('listings', 'container');
$nodeRoot = variable('node') == variable('section');
$level1 = variable('page_parameter1');
$level2 = variable('page_parameter2');
if ($nodeRoot) {
	renderMarkdown(__DIR__ . '/home.md');
} else {
	renderMarkdown(__DIR__ . '/dummy-items.md');
}
contentBox('end');
