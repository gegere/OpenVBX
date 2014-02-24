<div class="vbx-applet">
	<div class="vbx-full-pane">
		<h3>Twitter username</h3>
		<p>Must not be a protected account.</p>
		<fieldset class="vbx-input-container">
			<input type="text" name="name" class="medium" value="<?php echo AppletInstance::getValue('name','chadsmith'); ?>" />
		</fieldset>
	</div>
<?php if(AppletInstance::getFlowType() == 'voice'): ?>
	<h2>Next</h2>
	<p>After reading the tweet, continue to the next applet</p>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('next'); ?>
	</div><!-- .vbx-full-pane -->
<?php endif; ?>
</div><!-- .vbx-applet -->
