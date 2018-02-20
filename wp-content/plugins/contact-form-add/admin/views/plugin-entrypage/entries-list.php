<?php

	global $wpdb;

	$entry_table_name = $wpdb->prefix . SMUZFORM_ENTRY_DATABASE_TABLE_NAME;

	$query = $wpdb->prepare( "SELECT * FROM {$entry_table_name} ORDER BY created_at DESC LIMIT %d", 10 );

	$recent_entries = $wpdb->get_results( $query );

	$even_odd = true;

	
?>

<ul id="recent-entries-list-l">



<?php foreach( $recent_entries as $entry ): //loop
		$tmpForm = new SmuzForm_Form( $entry->form_id ); //form class
		 if ( $tmpForm->status() === false ) {continue;} //check form status ?>

<li id="entry-listuid-<?php echo esc_attr( $entry->id ) ?>" class="<?php if ( $even_odd ) echo 'even'; else echo 'odd';  ?>">
	<a href="<?php echo esc_url( admin_url( 'admin.php?page=smuz-forms-entry&form_id='. $entry->form_id . '&entry_id=' . $entry->id ) ) ?>">
		<strong>
			
			[<?php echo esc_html( mb_strimwidth( $tmpForm->getTitle() , 0, 40, '...') ) ?>] Entry ID#<?php echo intval( $entry->id ) ?> created at <?php echo esc_html( date( 'F d', strtotime( $entry->created_at) ) ) ?>
				
		</strong>
	</a>
</li>

<?php if ( $even_odd ) $even_odd = false; else $even_odd = true; endforeach; ?>
</ul>

<?php if ( ! $recent_entries ) : ?>

			<div id="noEntriesMessage" style="text-align: center">
				<h3>
					No Entries to show.
				</h3>
			</div>

<?php endif; ?>