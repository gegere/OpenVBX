<?php
$invalid_option = AppletInstance::getDropZoneUrl('invalid-option');
$keys = (array) AppletInstance::getValue('keys[]');
$responses = (array) AppletInstance::getDropZoneUrl('responses[]');
$menu_items = AppletInstance::assocKeyValueCombine($keys, $responses, 'strtolower');
$from_or_to = 'From';

if(!empty($_REQUEST['Direction']) && !in_array($_REQUEST['Direction'], array('inbound', 'incoming')))
  $from_or_to = 'To';

if(!empty($_REQUEST[$from_or_to . 'State']))
  $state = strtolower($_REQUEST[$from_or_to . 'State']);

$response = new TwimlResponse;

if(!empty($state) && array_key_exists($state, $menu_items) && !empty($menu_items[$state]))
	$response->redirect($menu_items[$state]);
elseif(!empty($invalid_option))
	$response->redirect($invalid_option);

$response->respond();
