<?php /* -*- mode: html; -*- */ ?>
<!DOCTYPE html>
<html xmlns:xi="http://www.w3.org/2001/XInclude" lang="en">
<xi:include href="template.php" />
<head>
	<title>Description</title>
</head>

<body>
	<h1>Teknisk beskrivning</h1>
	<h2>Controller</h2>
	<ul>
		<li>mod_rewrite skriver om alla url:ar till index.php</li>
		<li>Första komponenten är alltid vilken kontroller som körs (alla controllers ärver från <tt>Controller</tt>)</li>
		<li>Därefter exekveras <tt>Controller::route</tt> för rätt klass (dvs det går att överlagra route) som i sin tur anropar rätt funktion (by default tar den andra komponenten som funktionsnamn och resten som argument till funktionen)</li>
		<li>Både route och funktionen kan kasta exceptions för 1. fel (e.g. 403 forbidden) 2. redirects (på denna sidan gör <tt>Main::index</tt> en redirect till <tt>/main/sample/Hello/World</tt></li>
		<li>För att generera content så avslutar man funktionen med <tt>return template($path, $data)</tt> där <tt>$path</tt> är en sökväg relativ till <tt>$root/view</tt> och <tt>$data</tt> är en array med variabler som ska finnas tillgängliga i vyn</li>
	</ul>
	
	<h2>View</h2>
	<p>För att slippa massa require('top.php') osv så används lite XInclude/XPath magi.</p>
	<ul>
		<li>Alla filer som ska ha en template använder sig av <tt>&lt;xi:include href="template.php" /&gt;</tt> där template.php är vilken mall som ska användas. Det betyder att man enkelt kan använda olika templates på olika delar av sidan (för nitroxy handlar det nog bara om två: frontpage och main)</li>
		<li>Det är innehållet i template som man utgår från och den inkluderar med hjälp av XPath de delar av dokumentet som behövs, e.g. allt i head och allt i body.</li>
		<li>Både template och vyn kommer i sig att vara ett helt vanliga html-dokument.</li>
		<li>Vyn har tillgång till de variabler som gavs i <tt>$data</tt> från kontrollern, e.g. <tt>array("foo" => "bar")</tt> ger <tt>$foo</tt> med värdet <tt>"bar"</tt> samt kontrollern i sig med hjälp av <tt>$this</tt></li>
		<li>Det här sättet gör det väldigt lätt att hantera olika typer av vyer, e.g. baserat på filnamn</li>
		<li>Den stora fördelen är att det är väldigt lätt att ändra på templaten i efterhand, om det är baserat på require i varje vy så kan det potentiellt betyda att man måste ändra alla vyer. Det är också väldigt svårt att veta vad man behöver i förväg.</li>
	</ul>
</body>

</html>
