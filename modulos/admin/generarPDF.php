<?php
if(isset($_GET['i'])){
    $u=$_GET['i'];
    $si=$_GET['i'];
    include ('../../fpdf/fpdf.php');
    include("../class.php");
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', 'B', 11);

    $pdf->Ln();
    $pdf->Write (7,"Master Clinic S.A.S");
    $pdf->Ln();
    $pdf->Write (7,"NIT: 900.458.900-5");
    $pdf->Ln();$pdf->Ln();
    $pdf->Cell(190,7,"Historial Medico",1,0,'C');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(190,7,"Datos Del Paciente",1,0,'C');
    $pdf->Ln();
    $t = new Trabajo();
    $reg=$t->get_paciente_id($u);
    for ($i=0;$i<count($reg);$i++){
        $pdf->Cell(55,7,"Nombre",1,0,'C');$pdf->Cell(30,7,"Identificacion",1,0,'C');$pdf->Cell(50,7,"Direccion",1,0,'C');$pdf->Cell(30,7,"Telefono",1,0,'C');$pdf->Cell(25,7,"N hitorial",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(55,7,$reg[$i]['nombre'],1,0,'C');$pdf->Cell(30,7,$reg[$i]['id_p'],1,0,'C');$pdf->Cell(50,7,$reg[$i]['direccion'],1,0,'C');$pdf->Cell(30,7,$reg[$i]['tel'],1,0,'C');$pdf->Cell(25,7,$reg[$i]['nhistorial'],1,0,'C');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(190,7,"Citas Registradas",1,0,'C');
    $pdf->Ln();
    $reg=$t->get_cita_p($si);
    for ($i=1;$i<count($reg);$i++){
        $pdf->Cell(50,7,"Nombre Medico",1,0,'C');$pdf->Cell(35,7,"Especialidad",1,0,'C');$pdf->Cell(50,7,"Fecha",1,0,'C');$pdf->Cell(30,7,"Hora",1,0,'C');$pdf->Cell(25,7,"Estado",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(50,7,$reg[$i]['nombreM'],1,0,'C');$pdf->Cell(35,7,$reg[$i]['especialidad'],1,0,'C');$pdf->Cell(50,7,$reg[$i]['fecha'],1,0,'C');$pdf->Cell(30,7,$reg[$i]['hora'],1,0,'C');$pdf->Cell(25,7,$reg[$i]['estado'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(190,7,"Observaciones",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(190,7,$reg[$i]['obser'],1,0,'C');
        $pdf->Ln();
        $pdf->Ln();
    }


    $pdf->Output("Historial_medico.pdf",'F');

    echo "<script language='javascript'>window.open('Historial_medico.pdf','_self','');</script>";
    

    exit;
}
?>