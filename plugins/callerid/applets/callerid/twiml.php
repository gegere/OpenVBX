<?php

$responses = AppletInstance::getDropZoneUrl('responses[]');
$keys = (array) AppletInstance::getValue('keys[]');
$invalid_option = AppletInstance::getDropZoneUrl('invalid-option');

foreach($keys AS $i=> $key) {
    $keys[$i] = normalize_phone_to_E164($key);
}
 
$menu_items = AppletInstance::assocKeyValueCombine($keys, $responses);

$caller = normalize_phone_to_E164($_REQUEST['Caller']);
  
if(!empty($menu_items[$caller])) {
    $response->redirect($menu_items[$caller]);
}
else {
    $response->redirect($invalid_option);
}
 
$response->respond();