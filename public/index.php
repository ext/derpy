<?php

/* get path */
$root = '..';
$path = isset($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO']) : array('', 'main');
array_shift($path);

/* default includes */
require("{$root}/controller/Controller.php");

/* include required file */
$handler = array_shift($path);
$hpath = "{$root}/controller/{$handler}.php";
if ( !file_exists($hpath) ){
	die("no such controller");
}
require($hpath);

/* create controller */
$classname = "{$handler}Controller";
$controller = new $classname();

/* generate content */
try {
	$content = $controller->route($path);
} catch ( HTTPRedirect $e ){
	header("Location: {$e->url}");
	exit;
} catch( Exception $e ){
	die("handle exception:\n$e");
}

/* parse XML */
$xml = new DOMDocument();
$xml->loadXML('<?xml version="1.0"?>' . "\n" . $content);
$xpath = new DOMXpath($xml);

/* find template */
$template = $xpath->query('xi:include[@href]')->item(0)->getAttribute('href');

function select($path, $indent=''){
	global $xml, $xpath;
	$nodes = array();
	foreach ( $xpath->query($path) as $node ){
		$nodes[] = $indent . $xml->saveXML($node) . "\n";
	}
	return implode($nodes);
}

/* run through template */
require("${root}/view/{$template}");
