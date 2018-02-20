<div id="smuzform-cont">

<nav class="navbar navbar-inverse mainnavbar">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo admin_url( 'admin.php?page=smuz-forms-main' ) ?>">
				<?php smuzform_translate_e( 'Form Builder' ) ?>
			</a>
			
			<ul class="nav navbar-nav navbar-right" id="navBarActionsCont"></ul>
			
		
		</div>


	</div>
</nav>

<div class="container">
	
	<div class="row">
		
		<div class="col-lg-6 all-forms smuzmain-card">
			
			<div class="card-recent-forms">

				<h3 class="heading-recent-forms">Recent Forms 
				<input id="wp_smf_add_new_button" class="wp_smf_add_new_button button button-primary" type="button" value="Add New" onclick="window.location = '<?php echo admin_url('admin.php?page=smuz-forms&new_post=1') ?>'"></h3>

				<div id="forms-list"><?php include smuzform_admin_view( '/plugin-entrypage/forms-list.php' ); ?></div>

			</div>

		</div>

		<div class="col-lg-5 smuzmain-card">
			<div class="card-recent-entries">

				<h3 class="heading-recent-entries">Recent Entries</h3>

				<div id="entries-list"><?php include smuzform_admin_view( '/plugin-entrypage/entries-list.php' ); ?></div>

			</div>
		</div>

	</div>

	<div class="row">
		
		<div class="col-lg-6 f-promotion smuzmain-card">
			
			<div class="card-f-promotion">
				<h3 class="f-promotion-heading"></h3>


				<div id="f-promotion-list">
					
					<div class="">
						<a href="http://web-settler.com/form-builder/?ref=adminbanner" target="_blank">
							<img src="<?php echo esc_url( smuzform_admin_asset( 'img/paid-version-ad.png' ) ) ?>" alt="promotion of paid version" />
						</a>
					</div>
				
				</div>

			</div>

		</div>

		<div class="col-lg-5 f-docs smuzmain-card">
			<div class="card-f-docs">

				<h3 class="f-docs-heading">Guides & Articles</h3>

				<div id="f-docs-list"><?php include smuzform_admin_view( '/plugin-entrypage/guides-list.php' ); ?></div>

			</div>
		</div>

	</div>
	
	<!-- <div class="row">

		<div class="col-lg-12">
			<h2>Promote Top + Free Add ons</h2>

			<div class="f-addons-list">
				List of addons	
			</div>

		</div>
	
	</div> -->

</div>

</div>