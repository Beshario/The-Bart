<?php
    // set MIME type
    header("Content-type: text/xml");
    // try to get quote
    $url = "http://api.bart.gov/api/route.aspx?cmd=routeinfo&route={$_GET['route_no']}&key=MW9S-E7SL-26DU-VV8V";
    #$url = "hey.xml";
    $doc=new DomDocument;
    $doc->validateOnParse=true;
    $doc->Load($url);
    $s=simplexml_import_dom($doc);
    $r=$s->routes->route;
    print('<root>');
    print('<color>'.$r->color.'</color>');
    print('<config>');
    foreach($r->config->station as $st){
        print('<station>'.$st.'</station>');
    }
    print('</config>');
    print('</root>');
?>