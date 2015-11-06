<?php
require('fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("../img/logoReporte.png" , 10 ,8, 60 , 30 , "PNG" ,"");
    //Arial bold 15
    $this->SetFont('Arial','U',14);
    //Salto de línea
    $this->Ln(25);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'REPORTE DE ESTUDIANTES',0,1,'C');    
   }
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
//    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
   }
   /**Este método es para imprimir texto con alineación vertical.
    * @param $strText Tipo String, almacena el texto.
    * @param $w Tipo entero, almacena el ancho.
    * @param $h Tipo entero, almacena el alto.
    * @param $align Tipo String, almacena la alineacion horizontal.
    * @param $valign Tipo String, almacena la alineacion vertical.
    * @param $border Tipo Booleano, indica si se crea el borde.
    */
   function drawTextBox($strText, $w, $h, $align='L', $valign='T', $border=true)
{
    $xi=$this->GetX();
    $yi=$this->GetY();
    $hrow=$this->FontSize;
    $textrows=$this->drawRows($w,$hrow,$strText,0,$align,0,0,0);
    $maxrows=floor($h/$this->FontSize);
    $rows=min($textrows,$maxrows);
    $dy=0;
    if (strtoupper($valign)=='M')
        $dy=($h-$rows*$this->FontSize)/2;
    if (strtoupper($valign)=='B')
        $dy=$h-$rows*$this->FontSize;
    $this->SetY($yi+$dy);
    $this->SetX($xi);
    $this->drawRows($w,$hrow,$strText,0,$align,false,$rows,1);
    if ($border)
        $this->Rect($xi,$yi,$w,$h);
}
/***/
function drawRows($w, $h, $txt, $border=0, $align='J', $fill=false, $maxline=0, $prn=0)
{
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $b=0;
    if($border)
    {
        if($border==1)
        {
            $border='LTRB';
            $b='LRT';
            $b2='LR';
        }
        else
        {
            $b2='';
            if(is_int(strpos($border,'L')))
                $b2.='L';
            if(is_int(strpos($border,'R')))
                $b2.='R';
            $b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
        }
    }
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $ns=0;
    $nl=1;
    while($i<$nb)
    {
        //Get next character
        $c=$s[$i];
        if($c=="\n")
        {
            //Explicit line break
            if($this->ws>0)
            {
                $this->ws=0;
                if ($prn==1) $this->_out('0 Tw');
            }
            if ($prn==1) {
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
            }
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s,$i);
            continue;
        }
        if($c==' ')
        {
            $sep=$i;
            $ls=$l;
            $ns++;
        }
        $l+=$cw[$c];
        if($l>$wmax)
        {
            //Automatic line break
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
                if($this->ws>0)
                {
                    $this->ws=0;
                    if ($prn==1) $this->_out('0 Tw');
                }
                if ($prn==1) {
                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                }
            }
            else
            {
                if($align=='J')
                {
                    $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                    if ($prn==1) $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                }
                if ($prn==1){
                    $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                }
                $i=$sep+1;
            }
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s,$i);
        }
        else
            $i++;
    }
    //Last chunk
    if($this->ws>0)
    {
        $this->ws=0;
        if ($prn==1) $this->_out('0 Tw');
    }
    if($border && is_int(strpos($border,'B')))
        $b.='B';
    if ($prn==1) {
        $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    }
    $this->x=$this->lMargin;
    return $nl;
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
   
/*****************************Tabla coloreada**********************************/
    function TablaColores($header, $cedulaEstudiantes, $nombreEstudiantes, 
            $apellidoEstudiantes, $telefonosEstudiantes, $rutasFoto, $criterio)
    {
        //Arial bold 12
        $this->SetFont('Arial','B',11);
        //Criterio de busqueda
        if($criterio!=""){
            $this->Cell(160,10,'FILTRO DE BUSQUEDA UTILIZADO: '.$criterio,0,1,'L');
        }
        else{
            $this->Cell(160,10,'',0,1,'L');
        }
        $this->Ln(20);
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
        for($i=0, $y=63, $fila=1; $i<$n; $i++){
            $fill=false;
            //Crea el marco e imprime el nombre
            $cantidadLetras = strlen($nombreEstudiantes[$i]);
            $x = $this->GetX();
            $vertical = $this->GetY();
            $this->Line($x, $vertical, $x + 40, $vertical); //Superior
            $this->Line($x, $vertical, $x, $vertical + 40); //Izquierda
            $this->Line($x + 40, $vertical, $x + 40, $vertical +40); //Derecha
            $this->Line($x, $vertical + 40, $x + 40, $vertical + 40); //Inferior
            if ($cantidadLetras<=15){
                $horizontal = $this->GetStringWidth($nombreEstudiantes[$i])/2;
                $this->Text($x+20-$horizontal, $vertical +6, $nombreEstudiantes[$i]);
            }
            else {//Divide en lineas el string
                for ($j=15, $k=0; $j < $cantidadLetras; $j+=15) {
                    $linea = substr($nombreEstudiantes[$i], $k, $j);
                    $horizontal = $this->GetStringWidth($linea)/2;
                    $this->Text($x+20-$horizontal, $vertical +6, $linea);
                    $vertical = $vertical + 6;
                }
            }
            $x = $x + 40;
            $this->SetX($x);
            //Crea el marco e imprime el apellido
            $cantidadLetras = strlen($apellidoEstudiantes[$i]);
            $x = $this->GetX();
            $vertical = $this->GetY();
            $this->Line($x, $vertical, $x + 40, $vertical); //Superior
            $this->Line($x, $vertical, $x, $vertical + 40); //Izquierda
            $this->Line($x + 40, $vertical, $x + 40, $vertical +40); //Derecha
            $this->Line($x, $vertical + 40, $x + 40, $vertical + 40); //Inferior
            if ($cantidadLetras<=15){
                $horizontal = $this->GetStringWidth($apellidoEstudiantes[$i])/2;
                $this->Text($x+20-$horizontal, $vertical +6, $apellidoEstudiantes[$i]);
            }
            else {//Divide en lineas el string
                for ($j=15, $k=0; $j < $cantidadLetras; $j+=15) {
                    $linea = substr($apellidoEstudiantes[$i], $k, $j);
                    $horizontal = $this->GetStringWidth($linea)/2;
                    $this->Text($x+20-$horizontal, $vertical +6, $linea);
                    $vertical = $vertical + 6;
                }
                $y = $y + 40;
            }
            $x = $x + 40;
            $this->SetX($x);
            //Crea el marco e imprime la cedula
            $x = $this->GetX();
            $vertical = $this->GetY();
            $this->Line($x, $vertical, $x + 30, $vertical); //Superior
            $this->Line($x, $vertical, $x, $vertical + 40); //Izquierda
            $this->Line($x + 30, $vertical, $x + 30, $vertical +40); //Derecha
            $this->Line($x, $vertical + 40, $x + 30, $vertical + 40); //Inferior
            $horizontal = $this->GetStringWidth($cedulaEstudiantes[$i])/2;
            $this->Text($x + 15 - $horizontal, $vertical +6, $cedulaEstudiantes[$i]);
            $x = $x + 30;
            $this->SetX($x);
            //Crea el marco e imprime el número de télefono
            $x = $this->GetX();
            $this->Line($x, $vertical, $x + 30, $vertical); //Superior
            $this->Line($x, $vertical, $x, $vertical + 40); //Izquierda
            $this->Line($x + 30, $vertical, $x + 30, $vertical +40); //Derecha
            $this->Line($x, $vertical + 40, $x + 30, $vertical + 40); //Inferior
            $horizontal = $this->GetStringWidth($telefonosEstudiantes[$i])/2;
            $this->Text($x + 15 - $horizontal, $vertical +6, $telefonosEstudiantes[$i]);
            $x = $x + 30;
            $this->SetX($x);
            //Para el marco de la foto
            $x = $this->GetX();
            $this->Line($x, $vertical, $x + 40, $vertical); //Superior
            $this->Line($x, $vertical, $x, $vertical + 40); //Izquierda
            $this->Line($x + 40, $vertical, $x + 40, $vertical +40); //Derecha
            $this->Line($x, $vertical + 40, $x + 40, $vertical + 40); //Inferior
            $horizontal = $this->GetStringWidth("Foto ".$i)/2;
            $this->Text($x + 20 - $horizontal, $vertical +6, "Foto ".$i);
            $x = $x + 40;
            $this->SetX($x);
            /**************************************************************************/
            $this->Cell(40,40,"",0,0,'C',$fill);
//            if($this->PageNo() == 1 && $fila > 4){
//                $y = 46;
//                $fila=1;
//            }
//            else {
                if($this->PageNo() >= 2 && $fila > 4){
                    $y = 46;
                    $fila=1;
                }
                else{
                    $y=$y+40;                    
                    $fila++;
                }
//            }
            //Verifica si el archivo es jgp
            if(strpos($rutasFoto[$i], ".jpg")){
                $this->Image("../img/fotos/".basename( $rutasFoto[$i] ), 152, $y, 35, 38);
            }
            else{//Verifica si el archivo es png
                $this->Image("../img/fotos/".basename( $rutasFoto[$i] ), 152, $y, 35, 38, "PNG", "");
            }
            $this->SetY($y);
            $this->Ln();
            $fill=!$fill;
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
    $telefonosEstudiantes = $_SESSION['telefonoEstudiantes'];
    $rutasFoto = $_SESSION['rutaFotoEstudiantes'];
    $criterio = $_SESSION['criterio'];
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetY(65);
    $pdf->SetY(65);
    $pdf->TablaColores($header, $cedulaEstudiantes, $nombreEstudiantes, 
            $apellidoEstudiantes, $telefonosEstudiantes, $rutasFoto, $criterio);
    $pdf->Output();
?> 
