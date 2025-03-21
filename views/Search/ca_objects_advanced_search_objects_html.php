
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
			<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Search across all fields in the database.">Palabra clave</span>
			{{{_fulltext%width=200px&height=1}}}
		</div>			
	</div>		
	<div class='row'>
		<div class="advancedSearchField col-sm-12">
			<span class='formLabel' data-toggle="popover" data-trigger="hover" data-content="Search records of a particular date or date range.">Años <i>(ej. 1750-1790)</i></span>
			{{{ca_objects.unitdate.date_value%width=200px&height=40px&useDatePicker=0}}}
		</div>
	</div>
	<br style="clear: both;"/>
	<div class='advancedFormSubmit'>
		<span class='btn btn-default'>{{{reset%label=Borrar}}}</span>
		<span class='btn btn-default' style="margin-left: 20px;">{{{submit%label=Buscar}}}</span>
	</div>
</div>	

{{{/form}}}

	</div>
	<div class="col-sm-4" >
		<h1>¿Cómo buscar?</h1>
		<p>Simplemente debes ingresar las palabras claves y el año, o rango de años, para filtrar los resultados.</p>
		<p>Ten en cuenta que las mayúsculas y los acentos (tildes) no afectan los resultados. Así, buscar "Popayán" y "popayan" te dará los mismos resultados.</p>
		<p>También puedes utilizar un caracter comodín (*) para ampliar los resultados. Por ejemplo:<br>
		<b>liber*</b> encontrará coincidencias con "libertador", "libertad", "liberal", etc.

		</p>

	</div><!-- end col -->
</div><!-- end row -->

<script>
	jQuery(document).ready(function() {
		$('.advancedSearchField .formLabel').popover(); 
	});
	
</script>