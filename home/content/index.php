<?php
$block = getThemeBlock('articles');
$filter = '			<li><a href="#" data-filter=".article-introduction">Introduction</a></li>
			<li><a href="#" data-filter=".article-what-matters-most">What Matters Most</a></li>';

echo replaceItems($block['start'], ['filterButtons' => $filter, 'block-title' => variable('byline')] , '%');
$itemTemplate = $block['item'];

$first = false;
$boxes = [
	'intrepid-and-its-work',
	'disclaimer',
	'audience',
	'scope',
	'why-this-website',
	'introduction-to-what-matters-most-(wmm)',
];

foreach ($boxes as $ix => $item) {
	$title = humanize($item);
	$image = siteOrNetworkOrAppStatic('blocks/' . $item . '.jpg');
	$link = pageUrl($item);

	$content = disk_file_get_contents(__DIR__ . '/' . $item . '.md');
	$content = '<div class="hide-h2">' . renderMarkdown(explode('<!--more-->', $content)[0]
		. getLink('Read More', pageUrl($item)), ['echo' => false]) . '</div>';

	$type = urlize($item) == 'introduction-to-what-matters-most-(wmm)' ? 'what-matters-most' : 'introduction';
	$type_r = humanize($type);
	echo replaceItems($itemTemplate, compact('type', 'type_r', 'title', 'image', 'content', 'link'), '%');
}

$items = disk_include(SITEPATH . '/what-matters-most/menu.php');
foreach ($items as $slug => $title) {
	$image = siteOrNetworkOrAppStatic('what-matters-most/' . (true ? 'wmm-default' : $slug) . '.jpg');
	$content = ''; //getCodeSnippet('latin-2paras');
	$link = pageUrl($slug);
	$type = 'what-matters-most';
	$type_r = humanize($type);
	echo replaceItems($itemTemplate, compact('type', 'type_r', 'title', 'image', 'content', 'link'), '%');
}

$sectionBlocks = [
	'general' => 'Topics that provide useful information',
	'listings' => 'Contact details of useful supporting resources',
];
foreach ($sectionBlocks as $slug => $title) {
	$image = siteOrNetworkOrAppStatic('blocks/_' . $slug . '.jpg');
	$content = ''; //getCodeSnippet('latin-2paras');
	$link = pageUrl($slug);
	$type = $slug;
	$type_r = humanize($type);
	echo replaceItems($itemTemplate, compact('type', 'type_r', 'title', 'image', 'content', 'link'), '%');
}

echo $block['end'];
?>
