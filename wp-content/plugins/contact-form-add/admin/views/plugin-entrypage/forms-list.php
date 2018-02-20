<?php $forms = array_slice( smuzform_get_forms(), 0, 6 );
	 $even_odd = true;
	  if ( $forms ): ?>

<table border="0" id="smf_forms_table">
		
		<tr>
			<th>Title</th>
			<th>Created</th>
			<th>Options</th>
		</tr>

		<?php  ?>
			
		<?php foreach ( $forms as $form  ): $tmpForm = new SmuzForm_Form( $form->ID ) ?>

			<tr class='<?php if ( $even_odd ) echo 'even'; else echo 'odd';  ?>'>
				
				<td><a class="formtitle_link" href="<?php echo admin_url('admin.php?page=smuz-forms&form_id=' . $form->ID ) ?>"><strong><?php echo mb_strimwidth(get_the_title( $form->ID ), 0, 30, '...') ?></strong></a></td>
				
				
				<td><?php echo get_the_date( 'l, F j, Y', $form->ID  ); ?></td>
				<td class="wp_smf_options_width">
				<a id="slr_edit_form" href="#">
					<img alt="Edit" onclick="window.location='<?php echo admin_url('admin.php?page=smuz-forms&form_id=' . $form->ID ) ?>'" class="wp_smf_edit_img" src="<?php echo smuzform_admin_asset( 'img/wp_smf_edit_form_img.png' ) ?>" />
				</a>/ 
				<a id="slr_delete_form" href="#">
					
					<img alt="Delete" class="wp_smf_delete_img" data-id="<?php echo intval($form->ID) ?>" src="<?php echo smuzform_admin_asset( 'img/wp_smf_delete_form_img.png' ) ?>" />
				</a>
				
				</td>
			</tr>

		<?php if ( $even_odd ) $even_odd = false; else $even_odd = true; 
		endforeach; ?>
	
</table>

<?php endif; ?>

<?php if ( ! $forms ) : ?>

			<div id="noFormsMessage" style="text-align: center; margin-top: 20%">
				<h3>
					No forms. Click the + <a href="<?php echo admin_url('admin.php?page=smuz-forms&new_post=1') ?>">Add New</a> to create your first form.
				</h3>
			</div>

<?php endif; ?>

<script>
jQuery('.wp_smf_delete_img').click(function() {

		id = jQuery(this).data('id');

		url = '<?php echo admin_url() ?>' + 'admin.php?page=smuz-forms-main&action=delete_form&post_id=' + id;

		if ( confirm( 'Are you sure you want to remove this form ? ' ) ) {

			window.location = url;
		
		}


	});
</script>

<p class="description" style="position: absolute;bottom: 0px;right: 30px;"><a href="<?php echo admin_url('admin.php?page=smuz-forms-all&src=entrypage') ?>">View all forms</a></p>