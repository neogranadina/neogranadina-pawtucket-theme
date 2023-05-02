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
	<div class="row hpExplore">
		<div class="col-md-14 col-lg-10 col-lg-offset-1">
		<H2 class="frontSubHeading text-center">Explora nuestras colecciones</H2>

			<section class="portfolio">

				<div class="content-wrap portfolio-wrap">

					

					<div class="portfolio-item digitalizacion">

						<a class="portfolio-item__link" href="https://abc.neogranadina.org/Detail/collections/7" id="digitalizacion">

							<div class="portfolio-item__image">
								<img src="https://abc.neogranadina.org/themes/neogranadina/assets/pawtucket/graphics/narra_sq_@05x.png" alt="Narra la independencia: fuentes documentales">
							</div>
							<div class="portfolio-item__content">
								<div class="portfolio-item__info">
									<h2 class="portfolio-item__title" style="font-family: 'Lato', sans-serif;">Narra la Independencia</h2>
									<p class="portfolio-item__subtitle">Edición digital de la Colección documental de la Independencia del Perú, creada para el proyecto de historia pública <span style="font-style: italic;">Narra la Independencia desde tu pueblo, tu distrito o tu ciudad</span>, con la participación de voluntarios y colaboradores en el Perú y alrededor del mundo.</p>
									<p class="category-subtitle"></p>
								</div>
							</div>

						</a>
						<a class="" href="https://abc.neogranadina.org/Detail/collections/7" id="digitalizacion">
							<div class="portfolio-item__content_perm">
								<h2 class="portfolio-item__title_perm" >Fuentes sobre la independencia del Perú</h2>
							</div>
						</a>

					</div>

					

					<div class="portfolio-item proximamente">

						<a class="portfolio-item__link" href="" id="proximamente">

							<div class="portfolio-item__image">
								<img src="https://neogranadina.org/images/blocks/AHR-exterior-dia-2x3.jpg" alt="Archivo Histórico de Rionegro">
							</div>
							<div class="portfolio-item__content">
								<div class="portfolio-item__info">
									<h2 class="portfolio-item__title" style="font-family: 'Lato', sans-serif;">Próximamente</h2>
									<p class="portfolio-item__subtitle">Materiales digitalizados por Neogranadina en el Archivo Histórico de Rionegro, Antioquia, Colombia.</p>
									<p class="category-subtitle"></p>
								</div>
							</div>
						</a>
						<a class="" href="https://abc.neogranadina.org/Detail/collections/7" id="digitalizacion">
							<div class="portfolio-item__content_perm">
								<h2 class="portfolio-item__title_perm" >Catálogo Colectivo de Archivos Colombianos</h2>
							</div>
						</a>

					</div>

					

					<div class="portfolio-item digitalizacion">

						<a class="portfolio-item__link" href="https://abc.neogranadina.org/Detail/collections/14805" id="digitalizacion">

							<div class="portfolio-item__image">
								<img src="https://neogranadina.org/images/blocks/AHRB_Convento_3x2.jpg" alt="Archivo Histórico Regional de Boyacá">
							</div>
							<div class="portfolio-item__content">
								<div class="portfolio-item__info">
									<h2 class="portfolio-item__title" style="font-family: 'Lato', sans-serif;">Archivo Histórico Regional de Boyacá</h2>
									<p class="portfolio-item__subtitle">Materiales digitalizados por Neogranadina en el Archivo Histórico Regional de Boyacá, Tunja, Colombia.</p>
									<p class="category-subtitle"></p>
								</div>
							</div>
						</a>
						<a class="" href="https://abc.neogranadina.org/Detail/collections/14805" id="digitalizacion">
							<div class="portfolio-item__content_perm">
								<h2 class="portfolio-item__title_perm" >Archivo Histórico Regional de Boyacá</h2>
							</div>
						</a>

					</div>
					<div class="portfolio-item digitalizacion">

						<a class="portfolio-item__link" href="https://abc.neogranadina.org/Detail/collections/713" id="digitalizacion">

							<div class="portfolio-item__image">
								<img src="https://neogranadina.org/images/blocks/ACC_Courtyard_3x2.jpg" alt="Antiguo Archivo Central del Cauca">
							</div>
							<div class="portfolio-item__content">
								<div class="portfolio-item__info">
									<h2 class="portfolio-item__title" style="font-family: 'Lato', sans-serif;">Antiguo Archivo Central del Cauca</h2>
									<p class="portfolio-item__subtitle">Materiales digitalizados por Neogranadina en el fondo Antiguo Archivo Central del Cauca, del Centro de Investigaciones Históricas José María Arboleda Llorente, Popayán, Colombia.</p>
									<p class="category-subtitle"></p>
								</div>
							</div>
						</a>
						<a class="" href="https://abc.neogranadina.org/Detail/collections/713" id="digitalizacion">
							<div class="portfolio-item__content_perm">
								<h2 class="portfolio-item__title_perm" >Antiguo Archivo Central del Cauca</h2>
							</div>
						</a>

					</div>
					

				</div>


			</section>

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
