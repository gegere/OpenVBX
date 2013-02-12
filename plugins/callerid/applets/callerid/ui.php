<?php
$keys = (array) AppletInstance::getValue('keys[]', array('1' => '', '2' => '') );
$responses = (array) AppletInstance::getValue('responses[]');
?>

<div class="vbx-applet callerid-applet">
		<h2>Caller ID Router</h2>
		<p>Type phone numbers without spaces or punctuation. For example, <code>8005551234</code> instead of <code>(800) 555-1234</code>. The numbers you enter will be compared starting at the end of the number calling in. For example if didn't know the country / area code calling in, enter the numbers you do know ie: <code>5551234</code> and any called ending with these digits will follow the applet you provided.</p>
		<table class="vbx-callerid-grid options-table">
			<thead>
				<tr>
					<td>Caller ID</td>
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
				<?php foreach($keys as $i=>$key): ?>
				<tr>
					<td>
						<fieldset class="vbx-input-container">
							<input class="keypress small" type="text" name="keys[<?= $key ?>]" value="<?= $key ?>"  autocomplete="off" />
						</fieldset>
					</td>
					<td>then</td>
					<td>
						<?php echo AppletUI::dropZone('responses['. $i .']', 'Drop applet here'); ?>
					</td>
					<td>
						<a href="" class="add action"><span class="replace">Add</span></a> <a href="" class="remove action"><span class="replace">Remove</span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table><!-- .vbx-callerid-grid -->
		<h3>When the caller ID is not in the above list</h3>
		<p>What should we do?</p>
		<?php echo AppletUI::dropZone('invalid-option'); ?>
    	<br />
</div><!-- .vbx-applet -->