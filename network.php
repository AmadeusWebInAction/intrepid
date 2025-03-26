<?php
$staticUrls = [
	//locals
	'local-url' => 'http://localhost/networks/many/live/static/',
	'local-preview-url' => 'http://localhost/networks/many/static/',
	//lives
	'live-url' => 'https://many.amadeusweb.site/static/',
	'live-preview-url' => 'https://preview-many.amadeusweb.site/static/',
];

variables([
	'network-static-folder' => NETWORKPATH . '/',
	'network-static' => $static = $staticUrls[variable(SITEURLKEY)],
	'site-static-folder' => NETWORKPATH . '/' . SITENAME . '/',
	'site-static' => $static . SITENAME . '/',

	'link-to-section-home' => true,
	'link-to-site-home' => true,
	'custom-engage-notes' => true,
	'assistantEmail' => 'assistant+many-demo@amadeusweb.world',
	//
	//'sections-have-files' => true,
	//'no-page-menu' => true, //doesnt as yet support sections with files
]);

variables($d = [
	'default-search' => $mn = 'manypreview',
	'searches' => [
		$mn => ['code' => '05b9cd218248f44f0', 'name' => 'II for Now', 'description' => '[Planning a WMM site III]'],
	],
]);

addStyle('network', 'network-static--common-assets');
addStyle(SITENAME, 'network-static--common-assets');

variables([
	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/imran-ali-namazi/', 'name' => 'Webmaster' ],
	],
]);
