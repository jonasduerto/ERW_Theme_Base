var $ = jQuery.noConflict();

(function($) {

	/** jQuery Document Ready */
	$(document).ready(function($) {
	    // $('li.menu-item-847 a').on('click', function(event) {
	    //     // event.preventDefault();
	    //     // $("#privacy").modal('show');
	    // });
	    // $('li.menu-item-848 a').on('click', function(event) {
	    //     // event.preventDefault();
	    //     // $("#terms").modal('show');
	    // });

	    $('.open_modal>a').off( 'click' ).on( 'click', function( event ) {
	        /** Prevent Default Behaviour */
	        event.preventDefault();
	        var post_title = $(this).attr('title');

	        /** Ajax Call */
			$.ajax({
				cache: false,
				timeout: 8000,
				url: ajax_object.ajax_url,
				type: 'POST',
				// dataType: 'html',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: ({ action:'modal_load_content', post_title:post_title }),
				beforeSend: function() {
			        $( '#modalloadpost' ).html(
						'<div class="modal fade" id="modalLoader">'+
						'  <div class="modal-dialog">'+
						'    <div class="modal-content">'+
						'      <div class="modal-body">'+
						'          <div class="loader text-center center-block"></div>'+
						'      </div>'+
						'    </div>'+
						'  </div>'+
						'</div>');
			        $('#modalLoader').modal('show');
			    },
			    success: function( data, textStatus, jqXHR ){
			        var $ajax_response = $( data );
			        $('#modalloadpost' ).html( $ajax_response );
					$("#modalLoader").modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
			        $('#modalGetpost').modal('show');
			    },
			    error: function( jqXHR, textStatus, errorThrown ){
			        console.log( 'The following error occured: ' + jqXHR, textStatus, errorThrown );
			    },
			    complete: function( jqXHR, textStatus ){

			    }
			});

		});
	});
})(jQuery);