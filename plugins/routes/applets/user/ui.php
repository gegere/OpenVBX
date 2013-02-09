<div class="vbx-applet">
	<div class="vbx-full-pane">
		<h2>If User</h2>
		<p>If the <?php echo 'sms' == AppletInstance::getFlowType() ? 'message' : 'call'; ?> is from this group or user:</p>
<?php echo AppletUI::UserGroupPicker('user_or_group'); ?>
<?php echo AppletUI::DropZone('is_user'); ?>
	</div>
	<div class="vbx-full-pane">
		<h2>Otherwise</h2>
<?php echo AppletUI::DropZone('not_user'); ?>
	</div>
</div>
