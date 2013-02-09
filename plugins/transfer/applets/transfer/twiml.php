<?php
$response = new TwimlResponse;

$redirect_type_selector = AppletInstance::getValue('redirect-type-selector');

if($redirect_type_selector == 'url') {
	$gotourl = AppletInstance::getValue('gotourl');
	$response->redirect($gotourl);
}
else {
	$gotoflow = AppletInstance::getValue('gotoflow');
	$gotoflow_url = site_url('/twiml/applet/' . AppletInstance::getFlowType() . '/' . $gotoflow);
	$response->redirect($gotoflow_url);
}

$response->respond();
