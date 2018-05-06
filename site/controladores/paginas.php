<?php 
	/**
	* 
	*/
	class Paginas{
		
		public function Head(){
			echo  	"
						<meta charset=\"UTF-8\" />
						<meta name=\"viewport\" content=\"width=device-width\" />
						<title>Prefeitura de Ibitinga</title>
						<link rel=\"stylesheet\" href=\"css/normalize.css\" />
						<link rel=\"stylesheet\" href=\"css/mod.css\" />
						<link rel=\"stylesheet\" href=\"css/foundation.css\" />
						<link rel=\"stylesheet\" href=\"css/ie.css\" />
						<link rel=\"icon\" type=\"image/ico\" href=\"favicon.ico\">
						
						<link rel=\"stylesheet\" href=\"css/slider/anythingslider.css\">
						<link rel=\"Stylesheet\" type=\"text/css\" href=\"css/default/reset.css\" />
					    <link rel=\"Stylesheet\" type=\"text/css\" href=\"css/evoslider.css\" />
					    <link rel=\"Stylesheet\" type=\"text/css\" href=\"css/default/default.css\" />   
						
						<link rel=\"stylesheet\" type=\"text/css\" href=\"css/pajinate.css\" />
						

					    <link href=\"css/SpryValidationTextField.css\" rel=\"stylesheet\" type=\"text/css\" />
					    <link href=\"css/SpryValidationTextarea.css\" rel=\"stylesheet\" type=\"text/css\" />
					    <link href=\"css/SpryValidationSelect.css\" rel=\"stylesheet\" type=\"text/css\" />
					    <link rel=\"stylesheet\" href=\"css/estilo.css\" type=\"text/css\" />
						<link rel=\"Stylesheet\" type=\"text/css\" href=\"css/default/reset.css\" />
						<link rel=\"Stylesheet\" type=\"text/css\" href=\"css/evoslider.css\" />
						<link rel=\"Stylesheet\" type=\"text/css\" href=\"css/default/default.css\" />
					";
		}

		public function Java(){
			echo 	"
			
						<script type=\"text/javascript\">
						$(document).ready(function(){
							$('#paging_container').pajinate({
								items_per_page : 40	,
								num_page_links_to_display : 3,
								abort_on_small_lists: true
							});
						});
						</script>
			
							
						<script src=\"js/vendor/custom.modernizr.js\"></script>
					  	<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js\"></script>
					  	<script>window.jQuery || document.write('<script src=\"js/jquery.min.js\"><\/script>')</script>
					  	<script src=\"js/jquery.anythingslider.js\"></script>
					  	<style> #slider { width: 620px; height: 265px; } </style>
					  	<script defer type=\"text/javascript\">
							$(function(){
							 	$(document).ready(function () {
							        $('#slider').anythingSlider({
							        	autoPlay: true,
										resizeContents: true,
										buildStartStop: false
							        });
							    });
							});	
						</script>
						
						
						

						

						<script type=\"text/javascript\" src=\"js/jquery-1.7.1.min.js\"></script>
						
						<script type=\"text/javascript\" src=\"js/jquery.pajinate.js\"></script>
						<script type=\"text/javascript\" src=\"js/jquery.easing.1.3.js\"></script>
						<script type=\"text/javascript\" src=\"js/jquery.evoslider.lite-1.1.0.js\"></script>        
						
						<script type=\"text/javascript\">
							$(\"#mySlider\").evoSlider({
								mode: \"scroller\",                  // Sets slider mode (\"accordion\", \"slider\", or \"scroller\")
								width: 882,                         // The width of slider
								height: 260,                        // The height of slider
								slideSpace: 5,                      // The space between slides
								mouse: true,                        // Enables mousewheel scroll navigation
								keyboard: true,                     // Enables keyboard navigation (left and right arrows)
								speed: 500,                         // Slide transition speed in ms. (1s = 1000ms)
								easing: \"swing\",                    // Defines the easing effect mode
								loop: true,                         // Rotate slideshow
								autoplay: true,                     // Sets EvoSlider to play slideshow when initialized
								interval: 5000,                     // Slideshow interval time in ms
								pauseOnHover: true,                 // Pause slideshow if mouse over the slide
								pauseOnClick: true,                 // Stop slideshow if playing
								directionNav: true,                 // Shows directional navigation when initialized
								directionNavAutoHide: true,        // Shows directional navigation on hover and hide it when mouseout
								controlNav: true,                   // Enables control navigation
								controlNavAutoHide: false           // Shows control navigation on mouseover and hide it when mouseout 
							});                                
						</script>
						<script> document.write('<script src=' + ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') + '.js><\/script>') </script>
						<script src=\"js/foundation.min.js\"></script>
						<script> $(document).foundation(); </script>
					
					
					
					
					";
		}
		
		
		
	}

 ?>