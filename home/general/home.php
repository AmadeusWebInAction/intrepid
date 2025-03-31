<?php
function runNodeHome() {
	runResource('section-cards', [
		'section' => 'general',
		'title' => 'General Topics',
	]);
}

function runNodePage() {
	renderNodeItem(__DIR__);
}

runResource(stripExtension(__FILE__), [
	'section' => pathinfo(__DIR__, PATHINFO_FILENAME),
	'where' => __DIR__]);
