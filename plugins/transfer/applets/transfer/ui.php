<?php 
$gotoflow = AppletInstance::getValue('gotoflow');
$redirect_type_selector = AppletInstance::getValue('redirect-type-selector', 'flow');
?>
<div class="vbx-applet subflow-applet">
		<h2>Transfer</h2>
		<p>Continue this flow by starting another flow or redirecting to a TwiML URL.</p>
		<div class="radio-table">
			<fieldset class="vbx-input-container">
				<table>
					<tr class="radio-table-row first <?php echo ($redirect_type_selector === 'flow') ? 'on' : 'off' ?>">
						<td class="radio-cell">
							<input type="radio" name="redirect-type-selector" value="flow" <?php echo ($redirect_type_selector === 'flow') ? 'checked="checked"' : '' ?> />
						</td>
						<td class="content-cell">
							<div style="float: left;"><h4>Redirect to a flow</h4></div>
							<div style="float: right;">
							<select name="gotoflow" class="medium">
<?php
	foreach(OpenVBX::GetFlows() as $flow):
		$data = json_decode($flow->values['voice' == AppletInstance::getFlowType() ? 'data' : 'sms_data'], true);
		if(empty($data))
			continue;
		if(is_object($data))
			$data = get_object_vars($data);
?>
								<optgroup label="<?php echo htmlentities($flow->values['name']); ?>">
<?php
		foreach($data as $id => $instance):
			$url = $flow->values['id'] . '/' . $id;
?>
									<option value="<?php echo $url; ?>" <?php echo ($gotoflow == $url)? 'selected="selected"' : '' ?>><?php echo htmlentities($instance['name']); ?></option>
<?php	endforeach; ?>
								</optgroup>
<?php endforeach; ?>
							</select>
							</div>
						</td>
					</tr>
					<tr class="radio-table-row last <?php echo ($redirect_type_selector === 'url') ? 'on' : 'off' ?>">
						<td class="radio-cell">
							<input type="radio" name="redirect-type-selector" value="url" <?php echo ($redirect_type_selector === 'url') ? 'checked="checked"' : '' ?> />
						</td>
						<td class="content-cell">
							<div style="float: left;"><h4>Redirect to a URL</h4></div>
							<div style="float: right;">
								<div class="vbx-input-container input">
									<input type="text" class="medium" name="gotourl" value="<?php echo AppletInstance::getValue('gotourl') ?>"/>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<br />
</div><!-- .vbx-applet -->
