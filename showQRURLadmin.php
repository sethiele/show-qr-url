<?php
function showQRURL_admin_show() {
	
	$options = get_option('widget_showQRURL');
?>


<div class="wrap">
	<h2><?php _e('Show QR Option Seite', 'showqrurl'); ?></h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options');¬†?>
	
	
	<div id="poststuff" class="ui-sorttable">
		<div class="postbox closed" id="showqrurlkampagne">
			<h3><?php _e('Kampagnen Tracken', 'showqrurl'); ?></h3>
		</div>
	</div>
	
	<table class="form-table" id="showqrurlkampagnetable">
		<tr valign="top">
			<th scope="row"><?php _e('Kampagnen Name', 'showqrurl'); ?></th>
			<td><input type="text" name="showQRURLkampagnenName" value="<?php echo get_option('showQRURLkampagnenName');¬†?>" /></td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><?php _e('Kampagnen Wert', 'showqrurl'); ?></th>
			<td><input type="text" name="showQRURLkampagnenValue" value="<?php echo get_option('showQRURLkampagnenValue');¬†?>" /></td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><?php _e('Kampagnen Trackingsoftware', 'showqrurl'); ?></th>
			<td><select name="showQRUTLkampagnenSoftware">
				<option value=""><?php _e('Deaktiviert'); ?></option>
				<option value="piwik" <?php if (get_option('showQRUTLkampagnenSoftware') == 'piwik') echo "selected"; ?> ><?php _e('piwik'); ?></option>
				<option value="google" <?php if (get_option('showQRUTLkampagnenSoftware') == 'google') echo "selected"; ?> ><?php _e('Google Analytics'); ?></option>
			</select></td>
		</tr>
	</table>
	
	<input type="hidden" name="showQRURLsubmit" value="submit" />
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="showQRURLkampagnenName,showQRURLkampagnenValue,showQRUTLkampagnenSoftware" />


	<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Speichern', 'showqrurl');?>" />
	</p>
	</form>
</div>

	
	
<?php
}



function shoqQRURL_admin_js() {
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {
	$('#showqrurlkampagne').click(function(){
		if($('#showqrurlkampagnetable').is(":visible"))
	    	$('#showqrurlkampagnetable').hide();
	    else
	    	$('#showqrurlkampagnetable').show();
	});
});

</script>
<?php
}

?>