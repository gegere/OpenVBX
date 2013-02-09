<?php
$response = new Response();

/* Fetch all the data to operate the router */
$keys = AppletInstance::getValue('keys');
$invalid = AppletInstance::getDropZoneUrl('invalid');

$selected_item = false;

/* Build Menu Items */
$choices = AppletInstance::getDropZoneUrl('choices[]');
$keys = AppletInstance::getDropZoneValue('keys[]');
$router_items = AppletInstance::assocKeyValueCombine($keys, $choices);

$incoming_number = null;

if (isset($_REQUEST['From'])) {
	$incoming_number = $_REQUEST['From'];
} else if (isset($_REQUEST['Caller'])) {
	$incoming_number = $_REQUEST['Caller'];
}

if (isset($incoming_number)) {
	foreach($keys as $key) {
		$numbers = explode("\n", str_replace("\n\r", "\n", $key));

		if (in_array($incoming_number, $numbers)) {
			// change this to caller id
			$routed_path = $router_items[$key];
			$response->addRedirect($routed_path);
			$response->Respond();
			exit;
		}
	}
}

if(!empty($invalid)) {
	$response->addRedirect($invalid);    
	$response->Respond();
	exit;
} else {	 
	$response->Respond();
	exit;
}
