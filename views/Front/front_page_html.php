<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013 Whirl-i-Gig
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
 * @package CollectiveAccess
 * @subpackage Core
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 *
 * ----------------------------------------------------------------------
 */
  $va_access_values = $this->getVar("access_values");
 $vs_hero = $this->request->getParameter("hero", pString);
 if(!$vs_hero){
 	$vs_hero = rand(1, 3);
 }
?>

<div class="parallax hero<?php print $vs_hero; ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
				
				<div class="heroSearch">
					<h1>
						<div class="line1">Bienvenidos al</div>
					</h1>
					<div class="pretty-container">
						<div class="pretty-site-logo">
							<img src="https://abc.neogranadina.org/themes/neogranadina/assets/pawtucket/graphics/neogranadina-plain.png">
						</div>
						<div class="pretty-text">
							<div class="line2">Archivo<br>Biblioteca<br>Catálogo</div>
						</div>
					</div>
					<h1>
						<div class="line3">de <a href="https://neogranadina.org" style="font-family: 'IM Fell DW Pica'; color: white; font-size: 120%; text-decoration: none;">Neogranadina</a></div>
						<div class="line4">{{{hp_search_text}}}</div>
					</h1>
					<form role="search" action="<?php print caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>">
						<div class="formOutline">
							<div class="form-group">
								<input type="text" class="form-control" id="heroSearchInput" placeholder="<?php print _t("Buscar"); ?>" name="search" autocomplete="off" aria-label="<?php print _t("Buscar"); ?>" />
							</div>
							<button type="submit" class="btn-search" id="heroSearchButton"><span class="glyphicon glyphicon-search" aria-label="<?php print _t("Submit Search"); ?>"></span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container hpIntro">
	<div class="row">
		<div class="col-md-12 col-lg-6 col-lg-offset-3">
			<p class="callout">El <span style="font-weight: 700; color: black; font-style: italic;">ABC</span> es una plataforma de consulta de todos los materiales de archivo, libros, revistas e instrumentos de consulta digitalizados, sistematizados o reunidos por <span style="font-weight: 500; color: black;">Neogranadina</span> y sus aliados, desarrollada con el apoyo de la Universidad de California, Santa Barbara.
			<br><span style="font-weight: 500; color: black;">Neogranadina</span> es una fundación colombiana sin ánimo de lucro que busca utilizar nuevas tecnologías para proteger, rescatar y promover el patrimonio histórico, artístico y cultural de América Latina.</p>
		</div>
	</div>
</div>
	<div class="row hpExplore bgLightGray">
		<div class="col-md-14 col-lg-10 col-lg-offset-1">
		<H2 class="frontSubHeading text-center">Explora nuestras colecciones</H2>

			<div class="row">
				<div class="col-md-4">
					<div class="hpExploreBox">
						<?php print caNavLink($this->request, "<div class='hpExploreBoxImage hpExploreBoxImage1'></div>", "", "Detail", "collections", "7"); ?>
						<div class="hpExploreBoxDetails">
							<div class="hpExploreBoxTitle"><?php print caNavLink($this->request, "Narra la Independencia", "", "Detail", "collections", "7"); ?></div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="hpExploreBox">
						<?php print caNavLink($this->request, "<div class='hpExploreBoxImage hpExploreBoxImage2'></div>", "", "", "Browse", "collections"); ?>
						<div class="hpExploreBoxDetails">
							<div class="hpExploreBoxTitle"><?php print caNavLink($this->request, "Pŕoximamente", "", "", "Browse", "collections"); ?></div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="hpExploreBox">
						<?php print caNavLink($this->request, "<div class='hpExploreBoxImage hpExploreBoxImage3'></div>", "", "", "Browse", "collections"); ?>
						<div class="hpExploreBoxDetails">
							<div class="hpExploreBoxTitle"><?php print caNavLink($this->request, "Pŕoximamente", "", "", "Browse", "collections"); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	# --- display slideshow of random images
	#print $this->render("Front/featured_set_slideshow_html.php");

	# --- display galleries as a grid?
	print $this->render("Front/gallery_grid_html.php");
	# --- display galleries as a slideshow?
	#print $this->render("Front/gallery_slideshow_html.php");
?>

<div id="hpScrollBar"><div class="row"><div class="col-sm-12"><i class="fa fa-chevron-down" aria-hidden="true" title="Scroll down for more"></i></div></div></div>

		<script type="text/javascript">
			$(document).ready(function(){
				$(window).scroll(function(){
					$("#hpScrollBar").fadeOut();
				});
			});
		</script>
