<?php

class PDF extends FPDF
{

private $i;
private $f;

public function __construct($inicio, $fin){
        $this->i = date("d-m-Y", strtotime($inicio));
        $this->f = date("d-m-Y", strtotime($fin));
        parent::__construct();
}


// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'PEDIDOS CONFIRMADOS',0,1,'C');
    $this->Cell(0,10,'Distribuidora Feliu S.A. de C.V',0,1,'C');
    $this->SetFont('Arial','',12);
    $this->Cell(50,7,'Desde: ' . $this->i,0,1,'L');
    $this->Cell(50,11,'Hasta: ' . $this->f,0,1,'L');
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

    // Creación del objeto de la clase heredada
    $pdf = new PDF($inicio, $fin);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',12);

    # Ancho de las Colummas
    $ancho = array(10,60,30,30,30,20);

    # Genera los Encabezados de la tabla
    $pdf->Cell($ancho[0],9,'#',1,0,'C',0);
    $pdf->Cell($ancho[1],9,'Cliente',1,0,'C',0);
    $pdf->Cell($ancho[2],9,'Fecha',1,0,'C',0);    
    $pdf->Cell($ancho[3],9,'Subtotal',1,0,'C',0);
    $pdf->Cell($ancho[4],9,'Descuento',1,0,'C',0);
    $pdf->Cell($ancho[5],9,'Total',1,1,'C',0);

    # varibles generales
    $fila = 0;
    $subgrl = 0;
    $descgrl = 0;
    $totgrl = 0;
    $pdf->SetFont('Times','',12);
    # Genera las filas
    foreach ($registros as $pedido) {
        $pdf->Cell($ancho[0],9,$fila++,1,0,'R',0);
        $pdf->Cell($ancho[1],9,$pedido['Cliente']['nombre'].' '.$pedido['Cliente']['apellido'],1,0,'L',0);
        $pdf->Cell($ancho[2],9,date("d-m-Y", strtotime($pedido['Pedido']['fecha_solicitud'])),1,0,'C',0);

        $subtotal = 0;
        foreach ($pedido['Producto'] as $producto) {
            $subtotal += $producto['PedidosProducto']['precio_unitario'];
        }
        $pdf->Cell($ancho[3],9,'$ '. $subtotal,1,0,'C',0);

        $descuento = 0;
        if ($pedido['Pedido']['promotion_id'] != 0) {
            $descuento = $pedido['Promotion']['descuento'] * $subtotal / 100;
        }
        $pdf->Cell($ancho[4],9,'$ '. $descuento,1,0,'C',0);

        $pdf->Cell($ancho[5],9,'$ '. ($subtotal - $descuento),1,1,'C',0);

        $subgrl += $subtotal;
        $descgrl += $descuento;
        $totgrl += ($subtotal - $descuento);
    }

    # Resumen general
    $pdf->Cell(0,9,'',0,1,'C',0);
    $pdf->setX(140);
    $pdf->Cell(30,7,'Subtotal:',0,0,'L',0);
    $pdf->Cell(20,7,'$ ' . $subgrl,0,1,'R',0);

    $pdf->setX(140);
    $pdf->Cell(30,7,'Descuento:',0,0,'L',0);
    $pdf->Cell(20,7,'$ ' . $descgrl,0,1,'R',0);

    $pdf->setX(140);
    $pdf->Cell(30,7,'Total:',0,0,'L',0);
    $pdf->Cell(20,7,'$ ' . $totgrl,0,1,'R',0);


    $pdf->Output();
    exit;
?>