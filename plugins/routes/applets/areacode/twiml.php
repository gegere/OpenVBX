<?php
$invalid_option = AppletInstance::getDropZoneUrl('invalid-option');
$keys = (array) AppletInstance::getValue('keys[]');
$responses = (array) AppletInstance::getDropZoneUrl('responses[]');
$menu_items = AppletInstance::assocKeyValueCombine($keys, $responses);
$areacode = null;

if(!empty($_REQUEST['Direction'])) {
	$number = normalize_phone_to_E164(in_array($_REQUEST['Direction'], array('inbound', 'incoming')) ? $_REQUEST['From'] : $_REQUEST['To']);
	if(preg_match('/^\+1([0-9]{3})[0-9]{7}$/', $number, $matches))
		$areacode = $matches[1];
}

$response = new TwimlResponse;

if(!empty($areacode) && array_key_exists($areacode, $menu_items) && !empty($menu_items[$areacode]))
	$response->redirect($menu_items[$areacode]);
elseif(!empty($invalid_option))
	$response->redirect($invalid_option);

$response->respond();
