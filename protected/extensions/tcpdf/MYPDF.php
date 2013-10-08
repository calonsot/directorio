<?php
/**
 * @abstract This Component Class is created to access TCPDF plugin for generating reports.
 * @example You can refer http://www.tcpdf.org/examples/example_011.phps for more details for this example.
 * @todo you can extend tcpdf class method according to your need here. You can refer http://www.tcpdf.org/examples.php section for
 *       More working examples.
 * @version 1.0.0
 */

require 'tcpdf.php';

class MYPDF extends TCPDF {

	/**
	 *
	 * @param int $numeroRegistros registros para biodiversitas
	 */
	public function esqueletoEtiquetas(array $datosContactos)
	{
		$filasEtiquetas=0;
		$filasEtiquetasPorPagina=0;
		$contacto=0;

		$numeroContactos=count($datosContactos);
		//$numeroContactos=25;
		$residuo=$numeroContactos%3;

		if ($residuo > 0)
			$limiteRedondeo=(int) ($numeroContactos/3) +1;
		else
			$limiteRedondeo=(int) ($numeroContactos/3);

		while ($filasEtiquetas < $limiteRedondeo)
		{
			if ($filasEtiquetasPorPagina > 3)
			{
				$filasEtiquetasPorPagina=0;
				$this->AddPage();
					
			}

			$this->setCellPaddings(3,3,3,3);
			$this->SetFont('', '', 9);
			$this->SetDrawColor(0, 0, 0);
			$this->SetFillColor(255, 255, 255);

			if ($residuo > 0 && $filasEtiquetas == ($limiteRedondeo-1)) {
				if ($residuo == 1) {
					$this->MultiCell(63.5, 65.4, $this->acomodaDatosBiodiversitas($datosContactos[$contacto],
							$datosContactos[$contacto]['es_internacional'], $datosContactos[$contacto]['es_internacional_alternativo'],
							$datosContactos[$contacto]['domicilio_alt_principal']), 0, 'L',
							false, 0, null, null, true, 0, true, true, 65.4, 'M');

				} elseif ($residuo == 2) {
					$this->MultiCell(63.5, 65.4, $this->acomodaDatosBiodiversitas($datosContactos[$contacto],
							$datosContactos[$contacto]['es_internacional'], $datosContactos[$contacto]['es_internacional_alternativo'],
							$datosContactos[$contacto]['domicilio_alt_principal']), 0, 'L',
							false, 0, null, null, true, 0, true, true, 65.4, 'M');
					$this->MultiCell(63.5, 65.4, $this->acomodaDatosBiodiversitas($datosContactos[$contacto+1],
							$datosContactos[$contacto+1]['es_internacional'], $datosContactos[$contacto+1]['es_internacional_alternativo'],
							$datosContactos[$contacto+1]['domicilio_alt_principal']), 0, 'L',
							false, 0, null, null, true, 0, true, true, 65.4, 'M');
				}
					
			} else {

				$this->MultiCell(63.5, 65.4, $this->acomodaDatosBiodiversitas($datosContactos[$contacto],
						$datosContactos[$contacto]['es_internacional'], $datosContactos[$contacto]['es_internacional_alternativo'],
						$datosContactos[$contacto]['domicilio_alt_principal']), 0, 'L',
						false, 0, null, null, true, 0, true, true, 65.4, 'M');
				$this->MultiCell(63.5, 65.4, $this->acomodaDatosBiodiversitas($datosContactos[$contacto+1],
						$datosContactos[$contacto+1]['es_internacional'], $datosContactos[$contacto+1]['es_internacional_alternativo'],
						$datosContactos[$contacto+1]['domicilio_alt_principal']), 0, 'L',
						false, 0, null, null, true, 0, true, true, 65.4, 'M');
				$this->MultiCell(63.5, 65.4, $this->acomodaDatosBiodiversitas($datosContactos[$contacto+2],
						$datosContactos[$contacto+2]['es_internacional'], $datosContactos[$contacto+2]['es_internacional_alternativo'],
						$datosContactos[$contacto+2]['domicilio_alt_principal']), 0, 'L',
						false, 0, null, null, true, 0, true, true, 65.4, 'M');
					
					
			}

			$filasEtiquetas++;
			$filasEtiquetasPorPagina++;
			$contacto+=3;
			$this->Ln();
		}
	}

	/**
	 *
	 * @param number $caso si es internacional o nacional
	 * @param string $orden el orden con el cual se ordena el pdf
	 * @param string $personalizado si es un query personalizado, por si falto algo
	 */
	public function datosBiodiversitas ($caso=0, $orden='cp ASC, cp_alternativo ASC', $personalizado=false)
	{
		if ($personalizado)
			return $resultados=Yii::app()->db->createCommand()
			->select('d.*, doc.confirmo, doc.sigla_institucion, doc.dependencia, doc.sigla_dependencia,
					doc.sigla_institucion, doc.subdependencia, doc.actividad')
					->from('directorio d')
					->leftJoin('documental doc', 'doc.id=d.id')
					->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
					->where('doc.es_valido=1 AND d.usuarios_id != 5 AND td.tipo_id=6 AND
							((d.es_internacional='.$caso.' AND d.domicilio_alt_principal=0) OR
							(d.es_internacional_alternativo='.$caso.' AND d.domicilio_alt_principal=1))')
							->order($orden)
							->queryAll();
		else
			return $resultados=Yii::app()->db->createCommand()
			->select('d.*, doc.confirmo, doc.sigla_institucion, doc.dependencia, doc.sigla_dependencia,
					doc.sigla_institucion, doc.subdependencia, doc.actividad')
					->from('directorio d')
					->leftJoin('documental doc', 'doc.id=d.id')
					->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
					->where('doc.es_valido=1 AND td.tipo_id=6 AND
							((d.es_internacional='.$caso.' AND d.domicilio_alt_principal=0) OR
							(d.es_internacional_alternativo='.$caso.' AND d.domicilio_alt_principal=1))')
							->order($orden)
							->queryAll();
	}

	/**
	 *
	 * @param string $contacto
	 * @param int $esInternacional
	 * @param int $esInternacionalAlternativo
	 * @param int $domicilioAltPrincipal
	 * @return string de todos los datos de cada etiqueta
	 */
	private function acomodaDatosBiodiversitas ($contacto, $esInternacional, $esInternacionalAlternativo, $domicilioAltPrincipal)
	{
		$cadena="";
		$es_institucion=false;
		$enNegritas=false;

		$nombre_apellido=$contacto['nombre'].' '.$contacto['apellido'];
		$nombre_apellido_r=trim($nombre_apellido);
		$grado_academico=$contacto['grado_academico'];
		$grado_academico_r=trim($grado_academico);
		$institucion=$contacto['institucion'];
		$institucion_r=trim($institucion);
		$puesto=$contacto['puesto'];
		$puesto_r=trim($puesto);
		$subdependencia=$contacto['subdependencia'];
		$subdependencia_r=trim($subdependencia);
		$dependencia=$contacto['dependencia'];
		$dependencia_r=trim($dependencia);
		$sigla_institucion=$contacto['sigla_institucion'];
		$sigla_institucion_r=trim($sigla_institucion);
		$sigla_dependencia=$contacto['sigla_dependencia'];
		$sigla_dependencia_r=trim($sigla_dependencia);

		if (!empty($nombre_apellido_r))
		{
			if ($contacto['confirmo'])
				empty($grado_academico_r) ? $cadena.="<b><span style=\"background-color:#9BCD9B\">".$nombre_apellido.'</span></b>' :
				$cadena.="<b><span style=\"background-color:#9BCD9B\">".$contacto['grado_academico'].' '.$nombre_apellido.'</span></b>';
			else
				empty($grado_academico_r) ? $cadena.='<b>'.$nombre_apellido.'</b>' : $cadena.='<b>'.$contacto['grado_academico'].' '.$nombre_apellido.'</b>';
			$enNegritas=true;
		}

		if (!empty($institucion_r) || !empty($sigla_institucion_r))
		{
			empty($sigla_institucion_r) ? $instFinal=$institucion : $instFinal=$sigla_institucion;
			$es_institucion=true;
		}

		if (!empty($puesto_r))
		{
			if ($enNegritas)
				$cadena.='<br>'.$puesto;
			else
				$contacto['confirmo'] ? $cadena.="<br><b><span style=\"background-color:#9BCD9B\">".$puesto.'</span></b>' : $cadena.='<br><b>'.$puesto.'</b>';
			$enNegritas=true;
		}
		if (!empty($subdependencia_r))
		{
			if ($enNegritas)
				$cadena.='<br>'.$subdependencia;
			else
				$contacto['confirmo'] ? $cadena.="<br><b><span style=\"background-color:#9BCD9B\">".$subdependencia.'</span></b>' : $cadena.='<br><b>'.$subdependencia.'</b>';
			$enNegritas=true;
		}
		if (!empty($dependencia_r))
		{
			if ($enNegritas)
				$cadena.='<br>'.$dependencia;
			else
				$contacto['confirmo'] ? $cadena.="<br><b><span style=\"background-color:#9BCD9B\">".$dependencia.'</span></b>' : $cadena.='<br><b>'.$dependencia.'</b>';
			$enNegritas=true;
		}
		if ($es_institucion) {
			if ($enNegritas)
				$cadena.='<br>'.$instFinal;
			else
				$contacto['confirmo'] ? $cadena.="<br><b><span style=\"background-color:#9BCD9B\">".$instFinal.'</span></b>' : $cadena.='<br><b>'.$instFinal.'</b>';
		}

		if (strlen($contacto['cp']) == 5)
			$cp=$contacto['cp'];
		elseif (strlen($contacto['cp']) == 4 && (($domicilioAltPrincipal && !$esInternacionalAlternativo) || (!$domicilioAltPrincipal && !$esInternacional)))
		$cp='0'.$contacto['cp'];
		elseif(($domicilioAltPrincipal && $esInternacionalAlternativo) || (!$domicilioAltPrincipal && $esInternacional))
		$cp=$contacto['cp'];
		else
			$cp='<b>VERIFICAR CODIGO</b> ('.$contacto['cp'].')';

		if ($domicilioAltPrincipal)
		{
			if (empty($contacto['paises_id1']))
			{
				if ($esInternacionalAlternativo)
					$pais='<b>VERIFICAR PAIS</b> (NO TIENE)';
				else
					$pais='México';
					
			} else {
				if ($esInternacionalAlternativo)
					$pais=Paises::model()->findByPk($contacto['paises_id1'])->nombre;
				else
					$pais='México';
			}

			$domicilio=$this->datosDomicilio($contacto['codigo_postal_id1'], $cp,
					$contacto['direccion_alternativa'], $contacto['tipo_asentamiento_id1'],
					$contacto['asentamiento_alternativo'], $contacto['municipio_alternativo'],
					$contacto['ciudad_alternativa'], $contacto['ciudad_id1'] ,
					$contacto['estado_alternativo'], $pais, $esInternacionalAlternativo);

		} else {
			if (empty($contacto['paises_id']))
			{
				if ($esInternacional)
					$pais='<b>VERIFICAR PAIS</b> (NO TIENE)';
				else
					$pais='México';
					
			} else {
				if($esInternacional)
					$pais=Paises::model()->findByPk($contacto['paises_id'])->nombre;
				else
					$pais='México';
			}

			$domicilio=$this->datosDomicilio($contacto['codigo_postal_id'], $cp,
					$contacto['direccion'], $contacto['tipo_asentamiento_id'],
					$contacto['asentamiento'], $contacto['municipio'],
					$contacto['ciudad'], $contacto['ciudad_id'],
					$contacto['estado'], $pais, $esInternacional);
		}
		return $cadena.=$domicilio;
	}

	/**
	 *
	 * @param int $cp_id
	 * @param int $cp
	 * @param string $direccion
	 * @param int $tipoCol
	 * @param string $colonia
	 * @param string $municipio
	 * @param string $ciudad
	 * @param int $ciudadID
	 * @param string $estado
	 * @param int $pais
	 * @return string de los datos de la ubicacion por cada etiqueta
	 */
	private function datosDomicilio ($cp_id, $cp, $direccion, $tipoCol, $colonia, $municipio, $ciudad, $ciudadID, $estado, $pais, $internacional, $debug=false) {
		$domicilio="";

		$direccion_r=trim($direccion);

		if (!$debug)
			empty($direccion_r) ? $domicilio.='' : $domicilio.='<br>'.$direccion;
		else
			empty($direccion_r) ? $domicilio.='<br><b>VERIFICAR CALLE Y NUMERO</b> (NO TIENE)' : $domicilio.='<br>'.$direccion;

		if (empty($cp_id)) {
			$tipoColonia_r=trim($tipoCol);
			$colonia_r=trim($colonia);
			$municipio_r=trim($municipio);
			$ciudad_r=trim($ciudad);
			$ciudadID_r=trim($ciudadID);
			$estado_r=trim($estado);
			$cp_r=trim($cp);

			if (!empty($tipoColonia_r)) {
				$domicilio.='<br>'.TipoAsentamiento::model()->findByPk($tipoCol)->nombre;

				if ($internacional || !$debug)
					empty($colonia_r) ? $domicilio.='' : $domicilio.=' '.$colonia;
				else
					empty($colonia_r) ? $domicilio.=' <b>VERIFICAR COLONIA</b> (NO TIENE)' : $domicilio.=' '.$colonia;

					
			} else {
				if ($internacional || !$debug)
					empty($colonia_r) ? $domicilio.='' : $domicilio.='<br>'.$colonia;
				else
					empty($colonia_r) ? $domicilio.='<br><b>VERIFICAR COLONIA</b> (NO TIENE)' : $domicilio.='<br>'.$colonia;
			}

			if ($internacional && !empty($cp_r))
				$domicilio.='<br>'.$cp;
			elseif (!empty($cp_r))
			$domicilio.='<br>'.$cp;


			if (!empty($municipio_r) || !empty($ciudad_r) || !empty($ciudadID_r)){
				if (!empty($municipio_r)) {
					$domicilio.=' '.$municipio;
				} elseif (!empty($ciudadID_r)) {
					$ciudadConsulta=Ciudad::model()->findByPk($ciudadID);

					if ($ciudadConsulta != null)
						$domicilio.=' '.$ciudadConsulta->nombre;

				} elseif (!empty($ciudad_r)) {
					$domicilio.=' '.$ciudad;
				}
					
			} else {
				if ($internacional || !$debug)
					$domicilio.='';
				else
					$domicilio.=' <b>VERIFICAR MUNICIPIO O CIUDAD</b> (NO TIENE NINGUNO)';
			}

			if (!empty($estado_r)) {
				$estadoConsulta=Estado::model()->findByPk($estado);

				if ($estadoConsulta != null) {
					$domicilio.=', '.$estadoConsulta->nombre;
				} else {
					$domicilio.=', '.$estado;
				}
					
			} else {
				if ($internacional || !$debug)
					$domicilio.='';
				else
					$domicilio.=', <b>VERIFICAR ESTADO</b> (NO TIENE)';
			}

			$domicilio.='<br>'.$pais;


		} else {

			$ubicacion = Yii::app()->db->createCommand()
			->select('c.id AS cp_id, a.id AS id_a, a.nombre AS nombre_a, asen.id AS id_asen, asen.nombre AS nombre_asen,
					m.id AS id_m, m.nombre AS nombre_m, cd.id AS id_cd, cd.nombre AS nombre_cd, e.id AS id_e, e.nombre AS nombre_e')
					->from('codigo_postal c')
					->leftJoin('asentamiento a', 'c.asentamiento_id=a.id')
					->leftJoin('tipo_asentamiento asen', 'a.tipo_asentamiento_id=asen.id')
					->leftJoin('municipio m', 'a.municipio_id=m.id')
					->leftJoin('ciudad cd', 'm.ciudad_id=cd.id')
					->leftJoin('estado e', 'm.estado_id=e.id')
					->where('c.id='.$cp_id)
					->queryRow();

			$domicilio.='<br>'.$ubicacion['nombre_asen'].' '.$ubicacion['nombre_a'];
			$domicilio.='<br>'.$cp.' '.$ubicacion['nombre_m'].', '.$ubicacion['nombre_e'];
			$domicilio.='<br>'.$pais;
		}

		return $domicilio;
	}

}

