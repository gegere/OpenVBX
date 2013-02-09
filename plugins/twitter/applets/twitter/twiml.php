<?php
$ci =& get_instance();
$name = AppletInstance::getValue('name');
$response = new TwimlResponse;

if(!empty($name)) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://api.twitter.com/1/users/show.json?screen_name=' . $name);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$tweet = json_decode(curl_exec($ch));
	curl_close($ch);

	if(AppletInstance::getFlowType() == 'voice') {
		$response->say($tweet->status->text, array(
			'voice' => $ci->vbx_settings->get('voice', $ci->tenant->id),
			'voice_language' => $ci->vbx_settings->get('voice_language', $ci->tenant->id)
		));
		$next = AppletInstance::getDropZoneUrl('next');
		if(!empty($next))
			$response->redirect($next);
	}
	else
		$response->sms($tweet->status->text);
}

$response->respond();
