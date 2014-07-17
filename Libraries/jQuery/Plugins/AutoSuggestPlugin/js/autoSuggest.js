(function ( $ ) {
 
    $.fn.autoSuggest = function( options ) {
 
        // This is the easiest way to have default options.
        var settings = $.extend({
            
        }, options || {} );
		
        /**
         * getOptions
         * Print to the console log the options that user set
         */
		this.getOptions= function(){
			console.log(settings);
		};
		/**
		 * getID
		 * return the ID of element in the HTML 
		 */
		this.getID = function(){
			return $(this)[0].id;
		};
		/**
		 * keyup event to perform the request to the server
		 */
		$(this).keyup(function() 
		{ 
			var inputSearch = $(this).val();
			var dataString = 's='+ inputSearch;
				if(inputSearch!='')
					{
						  $.ajax({
						  type: "POST",
						  url: settings.url,
						  data: dataString,
						  cache: false,
						  success: function(html)
							  {
									$("#results").html(html).show();
							  }
						 });
					}
			return false;    
		});
		/**
		 * Init the elements in the HTML form to be loaded after the request back from the server
		 */
		this.init = function(){
				var id = this.getID();
			    $(this).parent().append("<div id='results'></div>");
				console.log(id);
				$("#results").click(function(e){ 
				var $clicked = $(e.target);
				$('#'+id).val($clicked.text());
				
				});
				
		};
		/**
		 * make results fade away
		 */
		$(this).click(function(){
			jQuery("#results").fadeIn();
		});
		jQuery(document).click( function(e) { 
			  var $clicked = $(e.target);
			  console.log($clicked);
			  if (! $clicked.hasClass("search")){
			  jQuery("#results").fadeOut(); 
			 
			  }
			  
		});

		this.init();
        return this;
 
    };
 
}( jQuery ));