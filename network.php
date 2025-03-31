<?php
$staticUrls = [
	//locals
	'local-url' => 'http://localhost/networks/intrepid/live/static/',
	'local-preview-url' => 'http://localhost/networks/intrepid/static/',
	//lives
	'live-url' => 'https://intrepid.amadeusweb.site/static/',
	'live-preview-url' => 'https://preview-intrepid.amadeusweb.site/static/',
];

variables([
	'network-static-folder' => NETWORKPATH . '/',
	'network-static' => $static = $staticUrls[variable(SITEURLKEY)],
	'site-static-folder' => NETWORKPATH . '/' . SITENAME . '/',
	'site-static' => $static . SITENAME . '/',

	'standalone-sections' => ['what-matters-most', 'general', 'listings'],

	'link-to-section-home' => true,
	'link-to-site-home' => true,
	'custom-engage-notes' => true,
	'assistantEmail' => 'assistant+intrepid-demo@amadeusweb.world',
]);

runExtension('resources');

function before_render_section($slug) {
	$standalones = variableOr('standalone-sections', []);
	if (!in_array($slug, $standalones)) return false;
	$node = variable('node');
	$context = ['section' => $slug, 'where' => variable('path') . '/' . $slug . '/'];
	if ($slug == $node || isResourceNode($slug, $context)) {
		variables([
			'section' => $slug,
			'file' => variable('path') . '/' . $slug . '/home.php',
			'is-standalone-section' => true,
			'no-page-menu' => true,
		]);
		return true;
	}
	return false;
}

variables($d = [
	'default-search' => $ds = 'preview',
	'searches' => [
		'main' => ['code' => '05b9cd218248f44f0', 'name' => 'II Main Site', 'description' => '[Planning a WMM site III]'],
		'research' => ['code' => '92ff745007df44075', 'name' => 'II Research', 'description' => 'Research Partners'],
		$ds => ['code' => '41775c0079ee9410b', 'name' => 'Demo Sites', 'description' => 'In Progress Demo Site'],
	],
]);

addStyle('network', 'network-static--common-assets');
addStyle(SITENAME, 'network-static--common-assets');

variables([
	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/imran-ali-namazi/', 'name' => 'Webmaster' ],
	],
]);
