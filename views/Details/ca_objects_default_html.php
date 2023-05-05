<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2018 Whirl-i-Gig
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

$t_object = 			$this->getVar("item");
$va_comments = 			$this->getVar("comments");
$va_tags = 				$this->getVar("tags_array");
$vn_comments_enabled = 	$this->getVar("commentsEnabled");
$vn_share_enabled = 	$this->getVar("shareEnabled");
$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
$vn_id =				$t_object->get('ca_objects.object_id');
$extent_medium = 		$t_object->get('ca_objects.extent_text');
$extent_array = 		explode("|", $extent_medium);
$extent = 				$extent_array[0];
$medium = 				$extent_array[1];
?>
<div class="row">
	<div class='col-xs-12 navTop'>
		<!--- only shown at small screen size -->
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
	</div><!-- end detailTop -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
			{{{previousLink}}}{{{resultsLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container">
			<div class="row">
				<div class='col-sm-6 col-md-6 col-lg-5 col-lg-offset-1'>
					<H4>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H4>
					<H6>{{{<unit>^ca_objects.type_id</unit>}}}</H6>
					<HR>

					{{{<ifdef code="ca_objects.measurementSet.measurements">^ca_objects.measurementSet.measurements (^ca_objects.measurementSet.measurementsType)</ifdef><ifdef code="ca_objects.measurementSet.measurements,ca_objects.measurementSet.measurements"> x </ifdef><ifdef code="ca_objects.measurementSet.measurements2">^ca_objects.measurementSet.measurements2 (^ca_objects.measurementSet.measurementsType2)</ifdef>}}}


					{{{<ifdef code="ca_objects.idno"><H6>Identificador</H6>^ca_objects.idno<br/></ifdef>}}}
					{{{<ifdef code="ca_objects.containerID"><H6>Box/series:</H6>^ca_objects.containerID<br/></ifdef>}}}

					{{{<ifdef code="ca_objects.description">
						<div class='unit'><h6>Descripción</h6>
							<span class="trimText">^ca_objects.description</span>
						</div>
					</ifdef>}}}

					{{{
						<ifdef code="ca_objects.note">
							<div class='unit'><h6>Notas</h6>
								<span class="trimText">^ca_objects.note</span>
						</ifdef>
					}}}


					{{{<ifdef code="ca_objects.unitdate"><H6>Fecha</H6>^ca_objects.unitdate<br/></ifdef>}}}

					<hr>
					</hr>

					<!-- acc items -->

					{{{<ifdef code="ca_objects.extent_text">
						<H6>Extensión</H6>
						<?php

							if (count($extent_array) > 1) {
								print $extent . "<br/><H6>Medio</H6> " . $medium;
							} else {
								print $extent;
							}
						  ?>
						  <br/>
					</ifdef>}}}
					


					{{{<ifdef code="ca_objects.arrangement"><H6>Identificación original</H6>^ca_objects.arrangement<br/></ifdef>}}}
					{{{<ifdef code="ca_objects.otherfindingaid"><H6>Catálogo</H6>^ca_objects.otherfindingaid<br/></ifdef>}}}
					{{{<ifdef code="ca_objects.originalsloc"><H6>Ubicación de los originales</H6>^ca_objects.originalsloc<br/></ifdef>}}}
					{{{<ifdef code="ca_objects.descrules"><H6>Reglas de descripción</H6>^ca_objects.descrules<br/></ifdef>}}}

					<!-- custom code -->
					<div class="row">
						<div class="col-lg-12">
							<!-- Narra elements -->
							{{{<ifdef code="ca_objects.narra_num_elemento"><H6>Número del documento</H6>^ca_objects.narra_num_elemento<br/></ifdef>}}}
							{{{<ifdef code="ca_objects.narra_tomo_titulo"><H6>Título del tomo</H6>^ca_objects.narra_tomo_titulo<br/></ifdef>}}}
							{{{
							<ifdef code="ca_objects.narra_vol_titulo">
								<H6>Título del volumen</H6>
								<unit relativeTo="ca_objects.narra_vol_titulo" delimiter="<br/>">^ca_objects.narra_vol_titulo</unit>

							</ifdef>
						}}}
							{{{
							<ifdef code="ca_objects.narra_secc_titulo">
								<H6>Título de la sección</H6>
								<unit relativeTo="ca_objects.narra_secc_titulo" delimiter="<br/>">^ca_objects.narra_secc_titulo</unit>
							</ifdef>
						}}}
							{{{
							<ifdef code="ca_objects.narra_edic_vol">
								<H6>Edición del volumen</H6>
								<unit relativeTo="ca_objects.narra_edic_vol" delimiter="<br/>">^ca_objects.narra_edic_vol</unit>
							</ifdef>
						}}}
							{{{
							<ifdef code="ca_objects.narra_imprenta">
								<H6>Imprenta</H6>
								<unit relativeTo="ca_objects.narra_imprenta" delimiter="<br/>">^ca_objects.narra_imprenta</unit>
							</ifdef>
						}}}
							{{{
							<ifdef code="ca_objects.pages">
								<H6>Páginas</H6>
								<unit relativeTo="ca_objects.pages" delimiter="<br/>">^ca_objects.pages</unit>
							</ifdef>
						}}}

						

						</div>
					</div>

					<hr>
					</hr>
					<div class="row">
						<div class="col-lg-12">

							{{{<ifcount code="ca_entities" min="1" max="1"><H6>Persona o entidad relacionada</H6></ifcount>}}}
							{{{<ifcount code="ca_entities" min="2"><H6>Personas o entidades relacionadas</H6></ifcount>}}}
							{{{<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels</l> (^relationship_typename)</unit>}}}

							{{{<ifcount code="ca_places" min="1" max="1"><H6>Lugar relacionado</H6></ifcount>}}}
							{{{<ifcount code="ca_places" min="2"><H6>Lugares relacionados</H6></ifcount>}}}
							{{{<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels</l> (^relationship_typename)</unit>}}}

							{{{<ifcount code="ca_list_items" min="1" max="1"><H6>Término relacionado</H6></ifcount>}}}
							{{{<ifcount code="ca_list_items" min="2"><H6>Términos relacionados</H6></ifcount>}}}
							{{{<unit relativeTo="ca_list_items" delimiter="<br/>"><l>^ca_list_items.preferred_labels.name_plural</l> (^relationship_typename)</unit>}}}

						</div><!-- end col -->
						<div class="col-lg-12 colBorderLeft">
							{{{map}}}
						</div>
					</div><!-- end row -->

				</div><!-- end col -->

				<div class='col-sm-6 col-md-6 col-lg-5'>
					{{{representationViewer}}}


					<div id="detailAnnotations"></div>

					<?php print caObjectRepresentationThumbnails($this->request, $this->getVar("representation_id"), $t_object, array("returnAs" => "bsCols", "linkTo" => "carousel", "bsColClasses" => "smallpadding col-sm-3 col-md-3 col-xs-4", "primaryOnly" => $this->getVar('representationViewerPrimaryOnly') ? 1 : 0)); ?>

					<?php
					# Comment and Share Tools
					if ($vn_comments_enabled | $vn_share_enabled | $vn_pdf_enabled) {

						print '<div id="detailTools">';
						if ($vn_comments_enabled) {
					?>
							<div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment"></span>Comments and Tags (<?php print sizeof($va_comments) + sizeof($va_tags); ?>)</a></div><!-- end detailTool -->
							<div id='detailComments'><?php print $this->getVar("itemComments"); ?></div><!-- end itemComments -->
					<?php
						}
						if ($vn_share_enabled) {
							print '<div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>' . $this->getVar("shareLink") . '</div><!-- end detailTool -->';
						}
						print '</div><!-- end detailTools -->';
					}
					
					?>

					<div class="row">
						<div class="col-sm-12">
							{{{<ifdef code="ca_objects.reproduction">
							<div class='unit'><h6>Créditos</h6>
								<span class="trimText">^ca_objects.reproduction</span>
							</div>
							</ifdef>}}}
							{{{<ifdef code="ca_objects.altformavail">
								<div class='unit'><H6>Créditos</H6>
								<span class="trimText">^ca_objects.altformavail</span>
								</div>
							</ifdef>}}}
						</div>

					</div>

				</div><!-- end col -->

			</div><!-- end row -->
			<div class="row d-flex justify-content-center col-lg-offset-1">
				<div class="col-lg-10 objectHelp">
					<h3>¿Necesitas ayuda?</h3>
					<li>¿Has encontrado un error? Por favor, <a href="https://neogranadina.org/contacto#formulario-de-contacto" target="_blank">avísanos</a> si hay algo que debamos corregir.</li>

					<h3>Apóyanos y trabaja con nosotros</h3>
					<p>En Neogranadina creemos que entre todos hacemos más. Siempre estamos en la búsqueda de nuevos contactos, alianzas y oportunidades.</p>
					<li>¿Quieres que publiquemos más documentos? Ayúdanos a catalogar lo que hemos digitalizado. <a href="https://neogranadina.org/inscripcion" target="_blank">Inscríbete al proyecto de Catalogación Colaborativa</a>.</li>
					<li>¿Eres un profesor y quieres utilizar estos materiales? Nos encantaría hablar contigo para poner nuestros recursos digitales a disposición de tus cursos y proyectos pedagógicos. <a href="https://neogranadina.org/contacto/#formulario-de-contacto" target="_blank">Contáctanos</a>.</li>
					<li>¿Trabajas en una institución con materiales históricos? Podemos ayudarte a salvaguardar y compartir tus colecciones a través de la digitalización. <a href="https://neogranadina.org/contacto/#formulario-de-contacto" target="_blank">Contáctanos</a>.</li>
				</div>

			</div>
		</div><!-- end container -->
	</div><!-- end col -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->

<script type='text/javascript'>
	jQuery(document).ready(function() {
		$('.trimText').readmore({
			speed: 75,
			maxHeight: 120
		});
	});
</script>