<?php
if (!role_is(NOTLOGGEDIN)) {
	h2('Already Logged In!');
	echo makeLink('GO HOME TO VERIFY!', pageUrl());
} else {
	//TODO: posting
	runFeature('engage');
	_runEngageFromSheet(getPageName(), __DIR__ . '/' . stripExtension(__FILE__) . '.tsv');
}
