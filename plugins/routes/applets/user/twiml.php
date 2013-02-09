<?php
$allowed = AppletInstance::getUserGroupPickerValue('user_or_group');
$is_user = false;
$from_or_to = 'From';

if(!empty($_REQUEST['Direction']) && !in_array($_REQUEST['Direction'], array('inbound', 'incoming')))
  $from_or_to = 'To';

if(!empty($allowed) && !empty($_REQUEST[$from_or_to])) {
	$number = normalize_phone_to_E164($_REQUEST[$from_or_to]);
	switch(get_class($allowed)) {
		case 'VBX_User':
			foreach($allowed->devices as $device)
				if($number == $device->value)
					$is_user = true;
			break;
		case 'VBX_Group':
			foreach($allowed->users as $user) {
				$user = VBX_User::get($user->user_id);
				foreach($user->devices as $device)
					if($number == $device->value)
						$is_user = true;
			}
	}
}

$response = new TwimlResponse;

$next = AppletInstance::getDropZoneUrl($is_user ? 'is_user' : 'not_user');
if(!empty($next))
	$response->redirect($next);

$response->respond();
