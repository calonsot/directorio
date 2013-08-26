
<h1>Información a cambiar en el archivo CSV o TXT antes de importar</h1>

Estas sustituciones son necesarias antes de poder importar los contactos de un archivo, ya
que son interpretados de los catalogos de la aplicación.
<br>
NOTA: Por el momento cuando el archivo este listo 
<?php echo CHtml::link('yo lo subo', array('usuarios/view', 'id'=>1)); ?>
, más adelante lo podras hacer tu mismo con un click.
<br><br>
<ol>

	<li><b>¿Es internacional?</b> <?php echo "<br>".$datos['es_internacional']; ?>
	</li><br>

	<li><b>Áreas</b> <?php echo "<br>".$datos['tipos']; ?>
	</li><br>

	<li><b>Sectores</b> <?php echo "<br>".$datos['sectores']; ?>
	</li><br>

	<li><b>¿Quién va a ser el dueño del contacto?</b> <?php echo "<br>".$datos['usuarios']; ?>
	</li><br>

	<li><b>Estados</b> <?php echo "<br>".$datos['estados']; ?>
	</li><br>

	<li><b>Paises</b> <?php echo "<br>".$datos['paises']; ?>
	</li><br>

	<li><b>Tipos de medios</b> (solo para la parte de medios) <?php echo "<br>".$datos['tipo_medios']; ?>
	</li><br>

	<li><b>Grupo específico</b> (solo para la parte de medios) <?php echo "<br>".$datos['grupos']; ?>
	</li><br>

</ol>
