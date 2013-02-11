<?php

$responses = (array) AppletInstance::getDropZoneUrl('responses[]');
$keys = (array) AppletInstance::getValue('keys[]');
$invalid_option = AppletInstance::getDropZoneUrl('invalid-option');
$menu_items = AppletInstance::assocKeyValueCombine($keys, $responses);
$caller_id = null;

if(!empty($_REQUEST['Direction'])) {
	$number = normalize_phone_to_E164(in_array($_REQUEST['Direction'], array('inbound', 'incoming')) ? $_REQUEST['From'] : $_REQUEST['To']);
	if(preg_match('/([0-9]{10})$/', $number, $matches))
		$caller_id = $matches[1];
}

$response = new TwimlResponse;

if(!empty($caller_id) && array_key_exists($caller_id, $menu_items) && !empty($menu_items[$caller_id])) {
    $response->redirect($menu_items[$caller_id]);
} else {
    $response->redirect($invalid_option);
}
 
$response->respond();