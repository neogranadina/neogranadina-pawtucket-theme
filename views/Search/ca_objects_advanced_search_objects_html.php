<?php
// Initialize an empty array to store the collection names
$collectionNames = [];

$o_search = new CollectionSearch();
$qr_res = $o_search->search("*");
while ($qr_res->nextHit()) {
	if($qr_res->get("ca_collections.parent_id")){
		$collectionName = $qr_res->get("ca_collections.preferred_labels.name");
		$collectionNames[] = $collectionName;
	}
}

?>
<?php
$array_relcols = [];

$o_db = new Db();
$busq = $o_db->query("SELECT DISTINCT collection_id from ca_objects_x_collections");

while ($busq->nextRow()){
	$array_relcols[] = $busq->get("collection_id");
}

?>

<div>

<?php
	foreach($array_relcols as $colles) {
		print("<p>$colles</p>");
	}
?>
</div>

<div class="row">
	<div class="col-sm-8 " style='border-right:1px solid #ddd;'>
		<h1>Búsqueda avanzada</h1>

<?php			
print "<p>Ingrese los términos de búsqueda en este formulario.</p>";
?>

{{{form}}}

<div class='advancedContainer'>
	<div class='row'>
		<div class="advancedSearchField col-sm-12">
			<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Busca por cualquier palabra en todas las colecciones.">Palabra clave</span>
			{{{_fulltext%width=200px&height=1}}}
		</div>			
	</div>		
	<div class='row'>
		<div class="advancedSearchField col-sm-12">
			<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Busca por títulos solamente.">Título</span>
			{{{ca_objects.preferred_labels.name%width=220px}}}
		</div>
	</div>
	<div class='row'>
		<div class="advancedSearchField col-sm-12">
			<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Busca registros en un rango de fechas.">Rango de fechas <i>(ej. 1750-1790)</i></span>
			{{{ca_objects.unitdate.date_value%width=200px&height=40px&useDatePicker=0}}}
		</div>
	</div>
	<div class='row'>
    <div class="advancedSearchField col-sm-12">
        <span class="formLabel" data-toggle="popover" data-trigger="hover" data-content="Busca registros dentro de una colección." data-original-title="" title="">Colección </span>

        <select id="collectionDropdown" name="selectedCollection" class="form-control">
            <option value="">Seleccione una colección de la lista</option>
            <?php
            foreach ($collectionNames as $colname) {
                echo "<option value='" . trim($colname) . "'>$colname</option>";
            }
            ?>
        </select>

        <br> <!-- Add a line break here for spacing -->

        {{{ca_collections.preferred_labels%restrictToTypes=collection%width=200px&height=40px}}}
    </div>
</div>
	<br style="clear: both;"/>
	<div class='advancedFormSubmit'>
		<span class='btn btn-default'>{{{reset%label=Reset}}}</span>
		<span class='btn btn-default' style="margin-left: 20px;">{{{submit%label=Search}}}</span>
	</div>
</div>	

{{{/form}}}

	</div>
	<div class="col-sm-4" >
		<h1>¿Cómo buscar?</h1>
		<p>Puedes hacer una búsqueda en todo el ABC a través de palabra clave, solamente en los títulos o en un rango de fechas. Puedes usar la lista de colecciones para filtrar los resultados únicamente por ese conjunto.
		</p>
	</div><!-- end col -->
</div><!-- end row -->


<script>
	jQuery(document).ready(function() {
		$('.advancedSearchField .formLabel').popover(); 
	});
	
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var dropdown = document.getElementById("collectionDropdown");
    var input = document.getElementById("ca_collections_preferred_labels");

    // Add an event listener to the dropdown to populate the input
    dropdown.addEventListener("change", function () {
        input.value = dropdown.value;
		dropdown.value = '';
    });
});
</script>