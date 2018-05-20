<?php
session_name('casa_cambio');
session_start();
$config=parse_ini_file('./configs/config.inc',true);
include('./configs/bd.php');
include('./configs/funciones_sistema.php');
include('./configs/funciones.php');
include('./modelo/bd_modelo.php');
include './configs/fpdf.php';

class PDF extends FPDF
{
	function Header()
	{
		global $title;
		// Arial bold 15
		$this->SetFont('Arial','B',10);
		// Calculamos ancho y posición del título.
		$w = $this->GetStringWidth($title)+6;
		$this->SetX((120-$w)/2);
		// Colores de los bordes, fondo y texto
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		// Ancho del borde (1 mm)
		$this->SetLineWidth(1);
		// Título
		$this->Image('./imagenes/logo129x50.png',20,10,80,20);
		$this->Ln(25);
		$this->Cell(100,10,'COMPROBANTE DE TRANSACCION',0,0,'C',false);
	
		// Salto de línea
		$this->Ln(10);
	}

	function titulo($data)
	{
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		//$this->SetDrawColor(0,147,0);
		$this->SetLineWidth(.3);
		$this->SetFont('Arial','B',10);
		if ($data['modificado'] == '0000-00-00 00:00:00')
		{
			$this->Cell(10,10,'Fecha: '.$data['creado'],'0',1,'L',false);
			$this->Ln(10);
		}
		else
		{
			$this->Cell(10,10,'Fecha: '.$data['modificado'],'0',1,'L',false);
			$this->Ln(10);
		}
	}

	function Footer()
	{
		// Posición a 1,5 cm del final
		$this->SetY(-15);
		// Arial itálica 8
		$this->SetFont('Arial','I',8);
		// Color del texto en gris
		$this->SetTextColor(128);
		// Número de página
	}

		// Tabla coloreada
	function FancyTable($data)
	{
		// Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		//$this->SetDrawColor(0,147,0);
		$this->SetLineWidth(.3);
		$this->SetFont('Arial','B',10);
		// Cabecera
		$f = 30;
		$w = array(30, 8, 40);
		// Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Datos
		$fill = false;
		
		$this->Cell($w[0],$w[1],'Id: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Cliente Envia: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['cliente_envia_id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Moneda Envia: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['moneda_envia_id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Monto Envia: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['monto_envia'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Sucursal Envia: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['sucursal_envia_id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Cliente Recibe: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['cliente_recibe_id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Moneda Recibe: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['moneda_recibe_id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Monto Recibe: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['monto_recibe'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Sucursal Recibe: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['sucursal_recibe_id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Estado: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['estado_id'],1,1,'L',$fill);
		$this->Cell($w[0],$w[1],'Personal: ',1,0,'L',$fill);
		$this->Cell($w[3],$w[1],$data['personal_id'],1,1,'L',$fill);
				
		
	}
}

$pdf = new PDF('L','mm',array(180,120));
// Títulos de las columnas
// Carga de datos
$id=$_REQUEST['id'];
$datos=bd_transacciones_datos($id);
   $datos['cliente_envia_id'] = bd_obt_clientes($datos['cliente_envia_id']);
   $datos['cliente_recibe_id'] = bd_obt_clientes($datos['cliente_recibe_id']);
   $datos['moneda_envia_id'] = bd_obt_monedas($datos['moneda_envia_id']);
   $datos['moneda_recibe_id'] = bd_obt_monedas($datos['moneda_recibe_id']);
   $datos['sucursal_envia_id'] = bd_obt_sucursales($datos['sucursal_envia_id']);
   $datos['sucursal_recibe_id'] = bd_obt_sucursales($datos['sucursal_recibe_id']);
   $datos['personal_id'] = bd_obt_personal($datos['personal_id']);
   $datos['estado_id'] = bd_obt_estados_operaciones($datos['estado_id']);
$data = $datos;
$pdf->SetFont('Arial','',7);
$pdf->AddPage();
$pdf->titulo($data);
$pdf->FancyTable($data);
$pdf->Output();