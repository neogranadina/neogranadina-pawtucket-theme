<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015-2018 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
?>
		<div style="clear:both; height:1px;"><!-- empty --></div>
		</div><!-- end pageArea --></div><!-- end main --></div><!-- end col --></div><!-- end row --></div><!-- end container -->
		<footer id="footer" class="text-center">
			<div class="row">
				<div class="col-sm-6 text-left" style="padding-left: 50px">
					<p style="font-size: 16px">
						Esta plataforma de consulta fue desarrollada por <a href="https://neogranadina.org/" target="_blank">Neogranadina</a> con el apoyo de la <a href="https://history.ucsb.edu/" target="_blank">Universidad de California, Santa Bárbara</a>.
					</p>
					<!--<p>
						<a href="https://neogranadina.org" class="orgLink" target="_blank">Neogranadina</a>
					</p>-->
					<ul class="list-inline social">
						<li><a href="https://www.facebook.com/neogranadina/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
						<li><a href="https://twitter.com/neogranadina_es" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
						<li><a href="https://www.instagram.com/neogranadina_es/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://github.com/neogranadina" target="_blank"><i class="fa fa-github-square" aria-hidden="true"></i></a>
						</li>
					</ul>
					<!-- script para obtener la última actualización del sitio -->
					<?php 
					$file = '/home/process/version.txt';
					if (file_exists($file)) {
						$dates = file($file, FILE_IGNORE_NEW_LINES);
						if (!empty($dates)) {
							$latest_date = null;
							foreach ($dates as $date) {
								$fecha = explode(": ", $date);
								$date = $fecha[1];
								$timestamp = strtotime($date);
								if (!$latest_date || $timestamp > $latest_date) {
									$latest_date = $timestamp;
								}
								else {
									$latest_date = $latest_date;
								}
							}
							if ($latest_date) {
								$formatted_date = date('d-m-Y', $latest_date);
								echo '<div class="address">© 2023 Fundación Histórica Neogranadina. Última actualización: ' . $formatted_date . '</div>';
							}
						}
					}
					?>
				</p>
				</div>
				<div class="col-sm-6 text-left">
				<img src="https://neogranadina.org/images/Logo_Neogranadina_gris.png" style="display: block; margin-left: auto; margin-right: 50px; width: 200px; filter:contrast(300%);">
				</div>
			</div>
		</footer><!-- end footer -->
<?php
	//
	// Output HTML for debug bar
	//
	if(Debug::isEnabled()) {
		print Debug::$bar->getJavascriptRenderer()->render();
	}
?>
	
		<?php print TooltipManager::getLoadHTML(); ?>
		<div id="caMediaPanel" role="complementary"> 
			<div id="caMediaPanelContentArea">
			
			</div>
		</div>
		<script type="text/javascript">
			/*
				Set up the "caMediaPanel" panel that will be triggered by links in object detail
				Note that the actual <div>'s implementing the panel are located here in views/pageFormat/pageFooter.php
			*/
			var caMediaPanel;
			jQuery(document).ready(function() {
				if (caUI.initPanel) {
					caMediaPanel = caUI.initPanel({ 
						panelID: 'caMediaPanel',										/* DOM ID of the <div> enclosing the panel */
						panelContentID: 'caMediaPanelContentArea',		/* DOM ID of the content area <div> in the panel */
						onCloseCallback: function(data) {
							if(data && data.url) {
								window.location = data.url;
							}
						},
						exposeBackgroundColor: '#000000',						/* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
						exposeBackgroundOpacity: 0.5,							/* opacity of background color masking out page content; 1.0 is opaque */
						panelTransitionSpeed: 400, 									/* time it takes the panel to fade in/out in milliseconds */
						allowMobileSafariZooming: true,
						mobileSafariViewportTagID: '_msafari_viewport',
						closeButtonSelector: '.close'					/* anything with the CSS classname "close" will trigger the panel to close */
					});
				}
			});
			/*(function(e,d,b){var a=0;var f=null;var c={x:0,y:0};e("[data-toggle]").closest("li").on("mouseenter",function(g){if(f){f.removeClass("open")}d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mousemove",function(g){if(Math.abs(c.x-g.ScreenX)>4||Math.abs(c.y-g.ScreenY)>4){c.x=g.ScreenX;c.y=g.ScreenY;return}if(f.hasClass("open")){return}d.clearTimeout(a);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mouseleave",function(g){d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.removeClass("open")},b)})})(jQuery,window,200);*/
		
//			$(document).ready(function() {
//				$(document).bind("contextmenu",function(e){
//				   return false;
//				 });
//			}); 
		</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6CYJB9RWQ1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-6CYJB9RWQ1');
	</script>

<?php
	print $this->render("Cookies/banner_html.php");	
?>
	</body>
</html>
