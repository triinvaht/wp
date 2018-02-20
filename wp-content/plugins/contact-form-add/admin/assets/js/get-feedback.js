/*
Code Snippet from POST SMTP : https://wordpress.org/plugins/post-smtp/
License : GPL V2
*/
jQuery(document).ready(function($) {

	$( '#msfcf-plugin-deactivate-link' ).click(function(e) {
		e.preventDefault();

		var reason = $( '#MSFCF_feedback_form_container .MSFCF-reason' ),
			deactivateLink = $( this ).attr( 'href' );

	    $( "#MSFCF_feedback_form_container" ).dialog({
	    	title: 'PluginOps Feedback Form',
	    	dialogClass: '#MSFCF_feedback_form-form',
	      	resizable: false,
	      	minWidth: 400,
	      	minHeight: 300,
	      	modal: true,
	      	buttons: {	
	      		'go' : {
		        	text: 'Continue',
		        	id: 'MSFCF_feedback_form_go',
					class: 'button',
		        	click: function() {

		        		var dialog = $(this),
		        			go = $('#MSFCF_feedback_form_go'),
		          			form = dialog.find( 'form' ).serializeArray(),
							result = {};

						$.each( form, function() {
							if ( '' !== this.value )
						    	result[ this.name ] = this.value;										
						});

						if ( ! jQuery.isEmptyObject( result ) ) {
							result.action = 'mscf_send_user_feedback';
						    $.ajax({
						        url: CFWBS_feedback_URL.admin_ajax,
						        type: 'POST',
						        data: result,
						        error: function(){},
						        success: function(msg){},
						        beforeSend: function() { 
						        	go.addClass('MSFCF-ajax-progress'); 
						        },
						        complete: function() { 
						        	go.removeClass('MSFCF-ajax-progress'); 
			        	
						        	dialog.dialog( "close" );
						            location.href = deactivateLink;
						        }
						    });		
	
						}


		        	},				      			
	      		},
	      		'cancel' : {
		        	text: 'Cancel',
		        	id: 'MSFCF_feedback_form-cancel',
		        	class: 'button button-primary',
		        	click: function() {
		          		$( this ).dialog( "close" );
		        	}				      			
	      		},
	      		'skip' : {
		        	text: 'Skip',
		        	id: 'MSFCF_feedback_form-skip',
		        	click: function() {
		          		$( this ).dialog( "close" );

		          		location.href = deactivateLink;
		        	}				      			
	      		},		      		
	      	}
	    });

		reason.change(function() {
			$( '.MSFCF-reason-input' ).hide();

			if ( $( this ).hasClass( 'MSFCF-custom-input' ) ) {
				$( '#MSFCF-deactivate-reasons' ).next( '.MSFCF-reason-input' ).show();
			}

			if ( $( this ).hasClass( 'MSFCF-support-input' ) ) {
				$( this ).find( '.MSFCF-reason-input' ).show();
			}			
		});
				    
	});
});