<?php include_once '../db.php';
require ('../fpdf.php');

$pdf = new FPDF();
$pdf->SetFont('Arial','',10);
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
	else if($_GET['category']=='reservation'){
		$query = mysqli_query($conn, "SELECT * FROM reservationreports_masterfile JOIN reservation_masterfile ON reservation_masterfile.reservation_id = reservationreports_masterfile.reservation_id INNER JOIN guest_masterfile ON guest_masterfile.guest_ID = reservation_masterfile.guest_id");
		$pdf->Cell(25,7,"Report ID",1);
		$pdf->Cell(55,7,"Guest Name", 1);
		$pdf->Cell(25,7,"Status", 1);
		$pdf->Cell(40,7,"Created at",1);
		$pdf->Cell(40,7,"Updated at",1);
		$pdf->Ln();
		while($row = mysqli_fetch_assoc($query)){
			$pdf->Cell(25,7,$row['reservereports_id'],1);
			$pdf->Cell(55,7,"{$row['guest_firstname']} {$row['guest_lastname']}",1);
			$pdf->Cell(25,7,$row['status'],1);
			$pdf->Cell(40,7,$row['created_at'],1);
			$pdf->Cell(40,7,$row['updated_at'],1);
			$pdf->Ln();
		}
		$pdf->Output();
	}
}

?>