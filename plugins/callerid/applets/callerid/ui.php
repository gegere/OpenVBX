<?php
$keys = (array) AppletInstance::getValue('keys[]', array('1' => '', '2' => '') );
$responses = (array) AppletInstance::getValue('responses[]');
?>

<div class="vbx-applet callerid-applet">
		<h2>Caller ID Router</h2>
		<p>Type phone numbers without spaces or punctuation.  For example, <code>+18005551234</code> instead of <code>+1 (800) 555-1234</code>.</p>
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
							<input type="text" class="keypress small" name="new-keys[]" autocomplete="off" />
						</fieldset>
					</td>
					<td>then</td>
					<td>
						<?php echo AppletUI::dropZone('new-responses[]', 'Drop item here'); ?>
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
							<input type="text" class="keypress small" name="keys[<?php echo $key ?>]" autocomplete="off" value="<?php echo $key ?>" />
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