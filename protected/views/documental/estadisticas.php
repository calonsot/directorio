<h1>Estadisticas para el envío de Biodiversitas</h1>
<br>
<table border="1">
	<tr>
		<th width="50px%">Sector</th>
		<th width="50px">Contactos</th>
	</tr>

	<?php
	$contadorPersonasSector=0;

	foreach ($resultadosSectores as $r) {
		echo "<tr>";
		echo "<td width='20%'>".Sector::model()->findByPk((int) $r['sector'])->nombre."</td";
		echo "<br>";
		echo "<td width='20%'>".$r['personas']."</td>";
		echo "</tr>";

		$contadorPersonasSector+= (int) $r['personas'];
	}
	?>

	<tfoot>
		<tr>
			<td><?php echo "<span><font style='color: blue'>Total:</font></span> ".count($resultadosSectores)." sectores" ?></td>
			<td><?php echo "<span><font style='color: blue'>Total:</font></span> ".$contadorPersonasSector." contactos de ".($contadorPersonasSector+$sinClasificarSectores)." posibles" ?>
			</td>
		</tr>
	</tfoot>
</table>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
		'options'=>array(
		'credits'=>array('enabled' => false),
		'gradient'=>true,
		'chart'=>array('type'=>'pie'),
   		'title'=>array('text' => 'Gráfica por sector'),
      	'series'=>array(array(
						'type'=>'pie',
        				'data'=>$valoresGraficaSector,
						'name'=>'Porcentaje contactos'
      						)
						),
				'plotOptions'=>array(
			'series'=>array(
			'allowPointSelect'=>true
			),
			'pie'=>array(
			'innerSize'=>'50%'
			),
		),
				'tooltip'=>array(
		'pointFormat'=>'{series.name}: <b>{point.percentage:.1f}%</b>'
		),
   		)
));
?>

<table border="1">
	<tr>
		<th>País</th>
		<th>Contactos</th>
	</tr>

	<?php
	$contadorPersonasPaises=$deMexico;

	echo "<tr>";
	echo "<td>México</td";
	echo "<br>";
	echo "<td>".$deMexico."</td>";
	echo "</tr>";

	foreach ($resultadosPaises as $r) {
		echo "<tr>";
		echo "<td>".Paises::model()->findByPk((int) $r['pais'])->nombre."</td";
		echo "<br>";
		echo "<td>".$r['personas']."</td>";
		echo "</tr>";

		$contadorPersonasPaises+= (int) $r['personas'];
	}
	?>

	<tfoot>
		<tr>
			<td><?php echo "<span><font style='color: blue'>Total:</font></span> ".count($resultadosPaises)." paises" ?></td>
			<td><?php echo "<span><font style='color: blue'>Total:</font></span> ".$contadorPersonasPaises." contactos de ".$contadorPersonasSector." posibles" ?>
			</td>
		</tr>
	</tfoot>
</table>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
		'options'=>array(
		'credits'=>array('enabled' => false),
		'gradient'=>true,
		'chart'=>array('type'=>'pie'),
   		'title'=>array('text' => 'Gráfica por país'),
      	'series'=>array(array(
						'type'=>'pie',
        				'data'=>$valoresGraficaPais,
						'name'=>'Porcentaje contactos'
      						)
						),
				'plotOptions'=>array(
			'series'=>array(
			'allowPointSelect'=>true
			),
			'pie'=>array(
			'innerSize'=>'50%'
			),
		),
				'tooltip'=>array(
		'pointFormat'=>'{series.name}: <b>{point.percentage:.1f}%</b>'
		),
   		)
));
?>

<table border="1">
	<tr>
		<th>Estado</th>
		<th>Contactos</th>
	</tr>

	<?php
	$contadorPersonasEstados=0;

	foreach ($resultadosEstados as $r) {
		echo "<tr>";
		echo "<td>".Estado::model()->findByPk((int) $r['estado'])->nombre."</td";
		echo "<br>";
		echo "<td>".$r['personas']."</td>";
		echo "</tr>";

		$contadorPersonasEstados+= (int) $r['personas'];
	}
	?>

	<tfoot>
		<tr>
			<td><?php echo "<span><font style='color: blue'>Total:</font></span> ".count($resultadosEstados)." estados" ?></td>
			<td><?php echo "<span><font style='color: blue'>Total:</font></span> ".$contadorPersonasEstados." contactos de ".$deMexico." posibles" ?>
			</td>
		</tr>
	</tfoot>
</table>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
		'options'=>array(
		'credits'=>array('enabled' => false),
		'gradient'=>true,
		'chart'=>array('type'=>'pie'),
   		'title'=>array('text' => 'Gráfica por estado'),
      	'series'=>array(array(
						'type'=>'pie',
        				'data'=>$valoresGraficaEstado,
						'name'=>'Porcentaje contactos'
      						)
						),
				'plotOptions'=>array(
			'series'=>array(
			'allowPointSelect'=>true
			),
			'pie'=>array(
			'innerSize'=>'50%'
			),
		),
				'tooltip'=>array(
		'pointFormat'=>'{series.name}: <b>{point.percentage:.1f}%</b>'
		),
   		)
));
?>

<?php if ($sinClasificarSectores > 0 || $sinClasificarPaises > 0 || $sinClasificarEstados > 0) { ?>
ATENCION:
<br><br>
<ul>
	<?php if ($sinClasificarSectores > 0) {?>
	<li>Tienes <font style="color: red"><?php echo $sinClasificarSectores; ?>
	</font> contactos "Sin clasificar" para el envío Biodiversitas.
	</li>
	<div>
		<?php echo "<ol>"; ?>
		<?php foreach ($sinClasificarSectoresIds AS $id) { 

			echo "<li>Identificador único: ".CHtml::link($id['id'], array('directorio/update', 'id'=>$id['id']))."</li>";
		}
		echo "</ol>";
}?>
	</div>
	
	<?php if ($sinClasificarPaises > 0) { ?>
	<li>Tienes <font style="color: red"><?php echo $sinClasificarPaises; ?>
	</font> contactos "marcados como internacionales" y sin algún país
		asociado(domicilio principal o alternativo) para el envío de
		Biodiversitas.
	</li>
	<div>
		<?php echo "<ol>"; ?>
		<?php foreach ($sinClasificarPaisesIds AS $id) { 

			echo "<li>Identificador único: ".CHtml::link($id['id'], array('directorio/update', 'id'=>$id['id']))."</li>";
		}
		echo "</ol>";
}?>
	</div>
	
	<?php if ($sinClasificarEstados > 0) { ?>
	<li>Tienes <font style="color: red"><?php echo $sinClasificarEstados; ?>
	</font> contactos marcados como "nacionales" y sin ningún estado
		asiciado (domicilio principal o alternativo) para el envío de
		Biodiversitas.
	</li>
	<div>
		<?php echo "<ol>"; ?>
		<?php foreach ($sinClasificarEstadosIds AS $id) { 

			echo "<li>Identificador único: ".CHtml::link($id['id'], array('directorio/update', 'id'=>$id['id']))."</li>";
		}
		echo "</ol>";
}?>
	</div>
</ul>
<?php } else { ?>
<?php echo "<br><br><b>No hay ningún pendiente.</b><br><br>"; ?>
<p>
<?php echo CHtml::link('Descarga el PDF para el envío nacional', array('listas/exportapdf'), array('target'=>'_blank')); ?>
</p>
<p>
<?php echo CHtml::link('Descarga el PDF para el envío internacional', array('listas/exportapdf?caso=1'), array('target'=>'_blank')); ?>
</p>
<br>
Existen <b><?php echo Documental::model()->count(array('condition' => 'confirmo=1')); ?></b> contactos con datos confirmados.
<?php } ?>


