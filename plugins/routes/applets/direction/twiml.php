<?php
$direction = 'inbound';

if(!empty($_REQUEST['Direction']) && 'inbound' != $_REQUEST['Direction'])
  $direction = 'outbound';

$response = new Response();

$next = AppletInstance::getDropZoneUrl($direction);
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();
