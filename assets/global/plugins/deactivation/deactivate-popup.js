jQuery(document).ready(function($) {
	$( '#the-list #coming-soon-booster-plugin-disable-link' ).click(function(e) {
		e.preventDefault();

		var reason = $( '#coming-soon-booster-feedback-content .coming-soon-booster-reason' ),
			deactivateLink = $( this ).attr( 'href' );

	    $( "#coming-soon-booster-feedback-content" ).dialog({
	    	title: 'Quick Feedback Form',
	    	dialogClass: 'coming-soon-booster-feedback-form',
	      	resizable: false,
	      	minWidth: 430,
	      	minHeight: 300,
	      	modal: true,
	      	buttons: {
	      		'go' : {
		        	text: 'Continue',
        			icons: { primary: "dashicons dashicons-update" },
		        	id: 'coming-soon-booster-feedback-dialog-continue',
					class: 'button',
		        	click: function() {
		        		var dialog = $(this),
		        			go = $('#coming-soon-booster-feedback-dialog-continue'),
		          			form = dialog.find('form').serializeArray(),
							result = {};
						$.each( form, function() {
							if ( '' !== this.value )
						    	result[ this.name ] = this.value;
						});
							if ( ! jQuery.isEmptyObject( result ) ) {
									result.action = 'post_user_feedback_coming_soon_booster';
							    $.ajax({
							        url: post_feedback.admin_ajax,
							        type: 'POST',
							        data: result,
							        error: function(){},
							        success: function(msg){},
							        beforeSend: function() {
							        	go.addClass('coming-soon-booster-ajax-progress');
							        },
							        complete: function() {
							        	go.removeClass('coming-soon-booster-ajax-progress');
							            dialog.dialog( "close" );
							            location.href = deactivateLink;
							        }
							    });
								}
        		},
    			},
		  		'cancel' : {
		      	text: 'Cancel',
		      	id: 'coming-soon-booster-feedback-cancel',
		      	class: 'button button-primary',
		      	click: function() {
		        		$( this ).dialog( "close" );
		      	}
		  		},
		  		'skip' : {
		      	text: 'Skip',
		      	id: 'coming-soon-booster-feedback-dialog-skip',
		      	click: function() {
		        		$( this ).dialog( "close" );
		        		location.href = deactivateLink;
		      	}
		  		},
		  	}
	    });
	});
});
