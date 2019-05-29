<?php

class PDF extends FPDF{

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
    $this->Image('img/log.jpg',10,8,22,22);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'PRODUCTOS SOLICITADOS',0,1,'C');
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
    $ancho = array(10,80,30,30);

    # Genera los Encabezados de la tabla
    $pdf->Cell($ancho[0],9,'#',1,0,'C',0);
    $pdf->Cell($ancho[1],9,'Producto',1,0,'C',0);
    $pdf->Cell($ancho[2],9,'Marca',1,0,'C',0);    
    $pdf->Cell($ancho[3],9,'Cantidad',1,1,'C',0);

    # varibles generales
    $fila = 1;
    $pdf->SetFont('Times','',12);

    # Genera las filas
    foreach ($registros as $llave => $producto) {
		$pdf->Cell($ancho[0],9,$fila++,1,0,'R',0);
	    $pdf->Cell($ancho[1],9,$llave,1,0,'L',0);
	    $pdf->Cell($ancho[2],9,$producto['Marca'],1,0,'C',0);    
	    $pdf->Cell($ancho[3],9,$producto['Cantidad'],1,1,'C',0);        
    }

    $pdf->Output();
    exit;
?>


