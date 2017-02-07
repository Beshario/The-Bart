<?php
// set MIME type
header("Content-type: text/html");
$st = $_GET['st'];
$url = "http://api.bart.gov/api/etd.aspx?cmd=etd&orig={$st}&key=MW9S-E7SL-26DU-VV8V";
$doc = new DomDocument;
$doc->validateOnParse=true;
$doc->Load($url);
$s = simplexml_import_dom($doc);
print("<b>BART departures-".$s->station->name."</b></br>");
print("<b>".$s->date."</b>&nbsp;&nbsp;");
print("<b>".$s->time."</b></br></br>");
$r = $s->station;
foreach($r->etd  as $item){
	print('<b>'.$item->abbreviation.'</b></br>');
	foreach ($item->estimate as $est) {
		print('platform'.$est->platform.'&nbsp;&nbsp;&nbsp;');
		print('<span>'.$est->minutes.'&nbsp;min</span>&nbsp;');
		print('<span style="background-color:'.$est->hexcolor.';">('.$est->length.'&nbsp;car)</span></br>');
	}
	print('</br>');
}
?>