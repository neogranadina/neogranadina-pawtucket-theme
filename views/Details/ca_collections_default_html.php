<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_collections_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2022 Whirl-i-Gig
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
 
	$t_item = $this->getVar("item");
	$va_facets 			= $this->getVar('facets');
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$va_all_facets = $va_browse_type_info["facets"];	
	
	# --- get collections configuration
	$o_collections_config = caGetCollectionsConfig();
	$vb_show_hierarchy_viewer = true;
	if($o_collections_config->get("do_not_display_collection_browser")){
		$vb_show_hierarchy_viewer = false;	
	}
	# --- get the collection hierarchy parent to use for exportin finding aid
	$vn_top_level_collection_id = array_shift($t_item->get('ca_collections.hierarchy.collection_id', array("returnWithStructure" => true)));

	# Prepare values for search inside collection

	$va_access_values = caGetUserAccessValues($this->request);
	
	$o_browse = caGetBrowseInstance("ca_objects");
	$o_browse->addCriteria("collection_facet", $t_item->get("ca_collections.collection_id"));
	$o_browse->execute(array('checkAccess' => $va_access_values));
	$vb_show_objects_link = false;
	# include conditional to display only where is not hierarchical tree
	if($o_browse->numResults() && ! $t_item->get("ca_collections.children.collection_id", array("checkAccess" => $va_access_values))){
		$vb_show_objects_link = true;
	}
	$vb_show_collections_link = false;
	if($t_item->get("ca_collections.children.collection_id", array("checkAccess" => $va_access_values))){
		$vb_show_collections_link = true;
	}

	# --------------------

?>
<div class="row">
	<div class='col-xs-12 navTop'><!--- only shown at small screen size -->
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
				<div class='col-md-12 col-lg-12'>
					<H1>{{{^ca_collections.preferred_labels.name}}}</H1>
					<H2>{{{^ca_collections.type_id}}}{{{<ifdef code="ca_collections.idno">, ^ca_collections.idno</ifdef>}}}</H2>
					{{{<ifdef code="ca_collections.parent_id"><div class="unit">Parte de: <unit relativeTo="ca_collections.hierarchy" delimiter=" &gt; "><l>^ca_collections.preferred_labels.name</l></unit></div></ifdef>}}}
<?php					
					if ($vn_pdf_enabled) {
						print "<div class='exportCollection'><span class='glyphicon glyphicon-file' aria-label='"._t("Download")."'></span> ".caDetailLink($this->request, "Download as PDF", "", "ca_collections",  $vn_top_level_collection_id, array('view' => 'pdf', 'export_format' => '_pdf_ca_collections_summary'))."</div>";
					}
?>
				</div><!-- end col -->
			</div><!-- end row -->
			
			<div class="row">			
				<div class='col-md-12 col-lg-12'>
					{{{<ifdef code="ca_collections.description"><label>Acerca de</label>^ca_collections.description<br/></ifdef>}}}
					{{{
						<ifdef code="ca_collections.narra_vol_titulo">
							<label>Título del volumen</label>^ca_collections.narra_vol_titulo<br>
						</ifdef>
					}}}
					{{{
						<ifdef code="ca_collections.narra_ed_gral">
							<label>Edición general</label>^ca_collections.narra_ed_gral<br>
					}}}
					{{{
						<ifdef code="ca_collections.narra_tomo_titulo">
							<label>Tomo</label>^ca_collections.narra_tomo_titulo<br>
						</ifdef>
					}}}
					{{{
						<ifdef code="ca_collections.narra_vol_num">
							<label>Volumen</label>^ca_collections.narra_vol_num<br>
						</ifdef>
					}}}
					{{{
						<ifdef code="ca_collections.narra_edic_vol">
							<label>Edición del volumen</label>^ca_collections.narra_edic_vol<br>
						</ifdef>
					}}}
					{{{
						<ifdef code="ca_collections.narra_imprenta">
							<label>Editor</label>^ca_collections.narra_imprenta<br>
						</ifdef>
					}}}
					<!-- {{{<ifcount code="ca_objects" min="1" max="1"><div class='unit'><unit relativeTo="ca_objects" delimiter=" "><l>^ca_object_representations.media.large</l><div class='caption'>Related Object: <l>^ca_objects.preferred_labels.name</l></div></unit></div></ifcount>}}} -->
<?php
				# Comment and Share Tools
				if ($vn_comments_enabled | $vn_share_enabled) {
						
					print '<div id="detailTools">';
					if ($vn_comments_enabled) {
?>				
						<div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment" aria-label="<?php print _t("Comments and tags"); ?>"></span>Comments (<?php print sizeof($va_comments); ?>)</a></div><!-- end detailTool -->
						<div id='detailComments'><?php print $this->getVar("itemComments");?></div><!-- end itemComments -->
<?php				
					}
					if ($vn_share_enabled) {
						print '<div class="detailTool"><span class="glyphicon glyphicon-share-alt" aria-label="'._t("Compartir").'"></span>'.$this->getVar("shareLink").'</div><!-- end detailTool -->';
					}
					print '</div><!-- end detailTools -->';
				}				
?>
				</div><!-- end col -->


				<!-- <div class='col-md-6 col-lg-6'>
					{{{<ifcount code="ca_collections.related" min="1" max="1"><label>Colección relacionada</label></ifcount>}}}
					{{{<ifcount code="ca_collections.related" min="2"><label>Colecciones relacionadas</label></ifcount>}}}
					{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.related.preferred_labels.name</l> (^relationship_typename)</unit>}}}
					
					{{{<ifcount code="ca_entities" min="1" max="1"><label>Related person</label></ifcount>}}}
					{{{<ifcount code="ca_entities" min="2"><label>Related people</label></ifcount>}}}
					{{{<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</unit>}}}
					
					{{{<ifcount code="ca_occurrences" min="1" max="1"><label>Related occurrence</label></ifcount>}}}
					{{{<ifcount code="ca_occurrences" min="2"><label>Related occurrences</label></ifcount>}}}
					{{{<unit relativeTo="ca_occurrences" delimiter="<br/>"><l>^ca_occurrences.preferred_labels.name</l> (^relationship_typename)</unit>}}}
					
					{{{<ifcount code="ca_places" min="1" max="1"><label>Related place</label></ifcount>}}}
					{{{<ifcount code="ca_places" min="2"><label>Related places</label></ifcount>}}}
					{{{<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels.name</l> (^relationship_typename)</unit>}}}				
				</div><!-- end col --> 
			</div><!-- end row -->


			<div class="row">
				<div class='col-sm-12'>

				<?php
			if($vb_show_objects_link || $vb_show_collections_link){
?>
			<div class='collectionBrowseItems'>

<?php
				if($vb_show_objects_link){
					print caNavLink($this->request, "<button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-search' aria-label='Buscar'></span> Navegar dentro de la subcolección</button>", "browseRemoveFacet", "", "browse", "objects", array("facet" => "collection_facet", "id" => $t_item->get("ca_collections.collection_id")));
				}
				if($vb_show_collections_link){
					print caNavLink($this->request, "<button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-search' aria-label='Buscar'></span> Navegar en toda la colección</button>", "browseRemoveFacet", "", "browse", "objects", array("facet" => "collection_facet", "id" => $t_item->get("ca_collections.collection_id"))); 											
				}

?>
					
				</div>
<?php
			}
			# ---are there sub records?
			if ($vb_show_hierarchy_viewer) {	
?>
				<div id="collectionHierarchy"><?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Cargando...')); ?></div>
				<script>
					$(document).ready(function(){
						$('#collectionHierarchy').load("<?php print caNavUrl($this->request, '', 'Collections', 'collectionHierarchy', array('collection_id' => $t_item->get('collection_id'))); ?>"); 
					})
				</script>
<?php				
			}									
?>				
				</div><!-- end col -->
			</div><!-- end row -->

{{{<ifcount code="ca_objects" min="2">
			<div class="row">
				<div id="browseResultsContainer">
					<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Cargando...')); ?>
				</div><!-- end browseResultsContainer -->
			</div><!-- end row -->
			<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery("#browseResultsContainer").load("<?php print caNavUrl($this->request, '', 'Search', 'objects', array('search' => 'collection_id:^ca_collections.collection_id'), array('dontURLEncodeParameters' => true)); ?>", function() {
						jQuery('#browseResultsContainer').jscroll({
							autoTrigger: true,
							loadingHtml: '<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Cargando...')); ?>',
							padding: 20,
							nextSelector: 'a.jscroll-next'
						});
					});
					
					
				});
			</script>
</ifcount>}}}
		</div><!-- end container -->
	</div><!-- end col -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->
