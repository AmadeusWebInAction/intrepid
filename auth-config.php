<?php
DEFINE('NOTLOGGEDIN', 'anonymous');
//DEFINE('MEMBER', 'logged-in');
DEFINE('CONTRIBUTOR', 'can-suggest');
DEFINE('CUSTODIAN', 'owns-pages');
DEFINE('EDITOR', 'is-editor');
DEFINE('SUPERADMIN', 'is-superadmin');

variable('all-roles', [
	NOTLOGGEDIN => [ 'key' => 'anonymous',   'status' => 'Not Logged In', 'demo-name' => 'Anon' ],
//	MEMBER => [ 'key' => 'logged-in',   'status' => 'Member', 'demo-name' => 'Smith' ],
	CONTRIBUTOR => [ 'key' => 'can-suggest', 'status' => 'Contributing User', 'demo-name' => 'Jack' ],
	CUSTODIAN => [ 'key' => 'owns-pages',  'status' => 'Dedicated Page Custodian', 'demo-name' => 'David' ],
	EDITOR => [ 'key' => 'is-editor',   'status' => 'Editorial Team', 'demo-name' => 'Ganesh' ],
	SUPERADMIN => [ 'key' =>'is-superadmin','status' => 'Webmaster', 'demo-name' => 'Imran' ],
]);

variable('all-countries', [
	'india' => 'India',
	'nigeria' => 'Nigeria',
	'trinidad-and-tobago' => 'Trinidad and Tobago',
	'united-kingdom' => 'The United Kingdom',
	'world' => 'Rest of World', 
]);
