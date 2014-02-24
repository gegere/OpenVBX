<?php
$defaultNumberOfChoices = 2;
$keys = (array) AppletInstance::getValue('keys[]', array('1' => '', '2' => '') );
$responses = (array) AppletInstance::getValue('responses[]');
?>

<div class="vbx-applet state-applet">
	<h2>State Options</h2>
	<table class="vbx-menu-grid options-table">
		<thead>
			<tr>
				<td>State</td>
				<td>&nbsp;</td>
				<td>Applet</td>
				<td>Add &amp; Remove</td>
			</tr>
		</thead>
		<tfoot>
			<tr class="hide">
				<td>
					<fieldset class="vbx-input-container">
						<input class="keypress small" type="text" name="new-keys[]" value="" autocomplete="off" />
					</fieldset>
				</td>
				<td>then</td>
				<td>
					<?php echo AppletUI::dropZone('new-responses[]', 'Drop applet here'); ?>
				</td>
				<td>
					<a href="" class="add action"><span class="replace">Add</span></a> <a href="" class="remove action"><span class="replace">Remove</span></a>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach($keys as $i => $key): ?>
			<tr>
				<td>
					<fieldset class="vbx-input-container">
						<input class="keypress small" type="text" name="keys[<?php echo $key; ?>]" value="<?php echo $key ?>" autocomplete="off" />
					</fieldset>
				</td>
				<td>then</td>
				<td>
					<?php echo AppletUI::dropZone('responses[' . $i . ']', 'Drop applet here'); ?>
				</td>
				<td>
					<a href="" class="add action"><span class="replace">Add</span></a> <a href="" class="remove action"><span class="replace">Remove</span></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<h3>Oops! The state didn't match any of our routes.</h3>
	<p>What should we do?</p>
	<?php echo AppletUI::dropZone('invalid-option'); ?>
    	<br />
</div>
