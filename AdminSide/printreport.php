<?php include_once '../db.php';
require ('../fpdf.php');

$pdf = new FPDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
if(isset($_GET['category'])){
	if($_GET['category'] == 'financial'){
		$total = 0;
		$query = mysqli_query($conn, "SELECT * FROM financialreports_masterfile");
		$pdf->Cell(45,7,"Financial report ID",1);
		$pdf->Cell(45,7,"Payment", 1);
		$pdf->Cell(45,7,"Payment Type", 1);
		$pdf->Cell(50, 7,"Created_At", 1);
		$pdf->Ln();
		while($row = mysqli_fetch_assoc($query)){
			$pdf->Cell(45,7,$row['financialreport_id'],1);
			$pdf->Cell(45,7,number_format($row['payment'],2) . " PHP",1);
			$pdf->Cell(45,7,$row['payment_type'],1);
			$pdf->Cell(50,7,$row['created_at'],1);
			$pdf->Ln();
			$total+= $row['payment'];
		}
		$pdf->Ln();
		$pdf->Cell(45,7,"Total: ");
		$pdf->Cell(45,7,number_format($total,2) . " PHP");
		$pdf->Output();
	}
}

?>