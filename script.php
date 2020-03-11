<?php  


require_once 'connections.php'; 

$query = "SELECT Artikelnummer_im_Shop, EAN_GTIN_Barcodenummer_UPC, Herstellerartikelnummern_HAN_MPN, Hersteller_Markenname, Produktname, Preis_Brutto, Lieferzeit, Produktbeschreibung, ProduktURL, BildURL_1, Versandkosten, Vorkasse, Paydirekt, Paypal, Kreditkartenzahlung_uber_BS_PAYONE_GmbH, Versandkosten_Kommentar 
	FROM app_table";

$result = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));

$records = array();

while( $rows = mysqli_fetch_assoc($result) ) {
	$records[] = $rows;
}



if(isset($_POST["export"])) {
	$csv_file = "idealo_table/".date('Ymd') . ".csv";
	header("Content-Type: text/csv; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$csv_file\"");
	$fh = fopen( 'php://output', 'w' );
	$is_coloumn = true;

	if(!empty($records)) {
		foreach($records as $record) {
			if($is_coloumn) {
				fputcsv($fh, array_keys($record));
				$is_coloumn = false;
			}
			fputcsv($fh, array_values($record));
		}
		fclose($fh);
	}
	exit;
}



?>


