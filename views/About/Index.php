<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": About");
?>

	<div class="row">
		<div class="col-sm-12">
			<H1><?php print _t("Acerca del ABC"); ?></H1>
		</div>
	</div>
	<div class="row">
		<div class="col align-self-center">
			<div class="pretty-container" style="padding-top: 5rem; padding-bottom: 5rem">
				<div class="pretty-site-logo">
					<img src="https://abcng.org/themes/neogranadina/assets/pawtucket/graphics/neogranadina-plain.png" style="filter:invert(0)">
				</div>
				<div class="pretty-text">
					<div class="line2" style="color: #000;">Archivo<br>Biblioteca<br>Catálogo</div>
				</div>
			</div>
		</div>
		<div style="width: 60%; margin: auto" >
			<p>El <span style="font-weight: bold; color: black">ABC</span> de <a href="https://neogranadina.org" style="font-family: 'IM Fell DW Pica';; font-size: 120%;">Neogranadina</a> es una plataforma de consulta de los materiales de archivo, libros y revistas e instrumentos de consulta digitalizados, sistematizados o reunidos por Neogranadina y sus aliados. Combina los antiguos <a href="https://neogranadina.org/proyectos/ccac" style="font-weight: bold;">Catálogo Colectivo de Archivos Colombianos</a>, <a href="https://neogranadina.org/proyectos/archivo-colectivo" style="font-weight: bold;">Archivo Colectivo</a> y muchos nuevos materiales en una plataforma más moderna, robusta y estable.</p> 
			<p><span style="font-family: 'IM Fell DW Pica'; color: black; font-size: 120%;">Neogranadina</span> es una fundación colombiana sin ánimo de lucro que busca utilizar nuevas tecnologías para proteger, rescatar y promover el patrimonio histórico, artístico y cultural de América Latina.</p>
		</div>
		<!-- <div class="col-sm-3 col-sm-offset-1">
			<address>Archives<br>			100 Second Avenue, 2nd floor<br>			New York, NY 10010</address>
		
			<address>Jennifer Smith, Archivist<br>			<span class="info">Phone</span> — 212 222.2222<br>			<span class="info">Fax</span> — 212 222.2223<br>			<span class="info">Email</span> — <a href="#">email@archive.edu</a></address>
		</div> -->
	</div>
