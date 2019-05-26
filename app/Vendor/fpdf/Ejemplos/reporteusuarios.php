<?php 
	include("mc_table.php");
	require_once('../../conexion.php');
	define('FPDF_FONTPATH', 'font/');
	$pdf = new PDF_Mc_Table();
	$pdf->AddPage();
	$pdf->SetFont('arial','B',14);
	$pdf->Ln(10);
	$pdf->Cell(10);
    $pdf->Cell(175,10,"DATOS GENERALES DEL USUARIO",0,0,'C'); 
	
	$usuario=2;
	
//   include("../../conexion.php");

	//
   $sql= "select concat(nombre,' ',apellidos) as 'nombre_completo',date_format(fec_nac,'%d/%m/%Y') as 'fecha_nacimiento',case sexo when 0 then 'Masculino' when 1 then 'Femenino' end as 'genero', email from usuarios where id_usuario='$usuario'";

   $Resultado=mysqli_query($login,$sql); 
   if(mysqli_num_rows($Resultado) > 0) {
		$pdf->SetFont('arial','B',12);
		$pdf->Ln(10);
		$pdf->Cell(5);
		
		$Datos=mysqli_fetch_array($Resultado);
		$pdf->Ln(8);
		$pdf->Cell(5);
		$pdf->Cell(60,8,'NOMBRE COMPLETO',1,0,'D');
		$pdf->SetFont('arial','',12);
		$pdf->Cell(80,8,$Datos[0],1,0,'C');
		
		$pdf->Ln(8);
		$pdf->Cell(5);
		$pdf->SetFont('arial','B',12);
		$pdf->Cell(60,8,'FECHA DE NACIMIENTO',1,0,'D');
		$pdf->SetFont('arial','',12);
		$pdf->Cell(80,8,$Datos[1],1,0,'C');
		
		$pdf->Ln(8);
		$pdf->Cell(5);
		$pdf->SetFont('arial','B',12);
		$pdf->Cell(60,8,'GENERO',1,0,'D');
		$pdf->SetFont('arial','',12);
		$pdf->Cell(80,8,$Datos[2],1,0,'C');
		
		$pdf->Ln(8);
		$pdf->Cell(5);
		$pdf->SetFont('arial','B',12);
		$pdf->Cell(60,8,'CORREO ELECTRONICO',1,0,'D');
		$pdf->SetFont('arial','',12);
		$pdf->Cell(80,8,$Datos[2],1,0,'C');
		
      }
	  
	$pdf->SetFont('arial','B',14);
	$pdf->Ln(10);
	$pdf->Cell(10);
    $pdf->Cell(175,10,"CONTACTO AGREGADOS",0,0,'C'); 
	
	$sql="SELECT concat(nombre,' ',apellidos), apodo FROM `contactos`,usuarios WHERE contactos.id_contacto=usuarios.id_usuario and contactos.id_usuario='$usuario'";
	
	$Resultado=mysqli_query($login,$sql); 
    if(mysqli_num_rows($Resultado) > 0) {
		
			$pdf->Ln(12);
			$pdf->Cell(5);
			$pdf->Cell(90,8,'NOMBRE DE USUARIO',1,0,'D');
			$pdf->Cell(50,8,'APODO',1,0,'C');
			$pdf->SetFont('arial','',14);
	   while($Datos=mysqli_fetch_array($Resultado)){
		   $pdf->Ln(8);
			$pdf->Cell(5);
			$pdf->Cell(90,8,$Datos[0],1,0,'D');
			$pdf->Cell(50,8,$Datos[1],1,0,'C');
	   }
    }
	
	//MENSAJES ENVIADOS
	$sql="SELECT count(*) as 'enviados' from conversacion where user_from='$usuario'";
	$Resultado=mysqli_query($login,$sql); 
    if(mysqli_num_rows($Resultado) > 0) {
		
		$pdf->Ln(15);
		$pdf->Cell(5);
		$Datos=mysqli_fetch_array($Resultado);
		$pdf->SetFont('arial','B',14);
		$pdf->Cell(90,8,'MENSAJES ENVIADOS',1,0,'D');
		$pdf->SetFont('arial','',14);
		$pdf->Cell(50,8,$Datos[0],1,0,'C');
		
	}
	
	
	//MENSAJES RECIBIDOS
	$sql="SELECT count(*) as 'recibidos' from conversacion where user_to='$usuario'";
	$Resultado=mysqli_query($login,$sql); 
    if(mysqli_num_rows($Resultado) > 0) {
		
		$pdf->Ln(8);
		$pdf->Cell(5);
		$Datos=mysqli_fetch_array($Resultado);
		$pdf->SetFont('arial','B',14);
		$pdf->Cell(90,8,'MENSAJES RECIBIDOS',1,0,'D');
		$pdf->SetFont('arial','',14);
		$pdf->Cell(50,8,$Datos[0],1,0,'C');
		
	}
	
	
	
    $pdf->Output();
?>