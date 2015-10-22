<?php
require('fpdf.php');

class PDF extends FPDF
{
    private $cedulaEstudiantes;
    private $nombreEstudiantes;
    private $apellidoEstudiantes;
    private $telefonoEstudiantes;
    private $rutaFotos;
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("../img/logoReporte.png" , 10 ,8, 60 , 30 , "PNG" ,"");
    //Arial bold 15
    $this->SetFont('Arial','B',14);
    //Salto de línea
    $this->Ln(25);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'REPORTE DE ESTUDIANTES',0,1,'C');
    //Arial bold 12
    $this->SetFont('Arial','B',11);
    //Criterio de busqueda
    $this->Cell(160,10,'FILTRO DE BUSQUEDA UTILIZADO:',0,1,'L');
    //Salto de línea
    $this->Ln(20);      
   }
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
    //Cabecera
    for($i=0;$i<count($header);$i++){
        if($i==2 || $i==3)
            $this->Cell(30,7,$header[$i],1,0,'C',1);
        else
            $this->Cell(40,7,$header[$i],1,0,'C',1);
    }
    $this->Ln();   
    for($i=0, $y=73, $fila=1; $i<10; $i++){
        $this->Cell(40,5,"celda ".$i,1);
        $this->Cell(40,5,"celda2 ".$i,1);
        $this->Cell(40,5,"celda3 ".$i,1);
        $this->Cell(40,5,"celda4 ".$i,1);
        $this->Ln();
    }
   }
   
/**************Tabla coloreada************************************************/
    function TablaColores($header)
    {
//Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(0,32,96);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial','',11);
//Cabecera
        for($i=0;$i<count($header);$i++){
            if($i==2 || $i==3)
                $this->Cell(30,7,$header[$i],1,0,'C',1);
            else
                $this->Cell(40,7,$header[$i],1,0,'C',1);
        }
        $this->Ln();
//Restauración de colores y fuentes
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial','',11);
//Datos
        $n = count($nombreEstudiantes);
        for($i=0, $y=73, $fila=1; $i<$n; $i++){
            $fill=false;
            $this->Cell(40,40,$nombreEstudiantes[$i],1,0,'C',$fill);
            $this->Cell(40,40,$apellidoEstudiantes[$i],1,0,'C',$fill);
            $this->Cell(30,40,$cedulaEstudiantes[$i],1,0,'C',$fill);
            $this->Cell(30,40,$telefonoEstudiantes[$i],1,0,'C',$fill);
            $this->Cell(40,40,"FOTO",1,0,'C',$fill);
            $this->Image($rutaFotos, 152, $y, 35, 38);
            $this->Ln();
            $fill=!$fill;
            if($this->PageNo() >= 2 && $fila > 4){
                $y = 76;
                $fila=1;
            }
            else{
                $y=$y+40;
                $fila++;
            }
        }
        $this->Cell(160,0,'','T');
    }  
}
    $pdf=new PDF();
//Títulos de las columnas
    $header=array('NOMBRES','APELLIDOS','CEDULA','TELEFONO','FOTO');
    session_start();
    $cedulaEstudiantes = $_SESSION['cedulaEstudiantes'];
    $nombreEstudiantes = $_SESSION['nombresEstudiantes'];
    $apellidoEstudiantes = $_SESSION['apellidosEstudiantes'];
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetY(65);
    $pdf->SetY(65);
    $pdf->TablaColores($header);
    $pdf->Output();
?> 
