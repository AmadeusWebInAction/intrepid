<?php
DEFINE('NOTLOGGEDIN', 'anonymous');
DEFINE('MEMBER', 'logged-in');
DEFINE('CONTRIBUTOR', 'can-suggest');
DEFINE('CUSTODIAN', 'owns-pages');
DEFINE('EDITOR', 'is-editor');
DEFINE('SUPERADMIN', 'is-superadmin');

variable('all-roles', [
	[ 'key' => 'anonymous',   'status' => 'Not Logged In' ],
	[ 'key' => 'logged-in',   'status' => 'A Member' ],
	[ 'key' => 'can-suggest', 'status' => 'A Contributing User' ],
	[ 'key' => 'owns-pages',  'status' => 'A Dedicated Page Custodian' ],
	[ 'key' => 'is-editor',   'status' => 'Editorial Team' ],
	[ 'key' =>'is-superadmin','status' => 'Webmaster / SuperAdmin' ],
]);
