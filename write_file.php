<?php 
	// This function will delete $file and then create new one with same name and fill it with all data from database
	// fopen makes problem with .csv file if already exist, deleting $file ( unlink($file) ) solves that problem

require_once 'connections.php'; 


$query = "SELECT Artikelnummer_im_Shop, EAN_GTIN_Barcodenummer_UPC, Herstellerartikelnummern_HAN_MPN, Hersteller_Markenname, Produktname, Preis_Brutto, Lieferzeit, Produktbeschreibung, ProduktURL, BildURL_1, Versandkosten, Vorkasse, Paydirekt, Paypal, Kreditkartenzahlung_uber_BS_PAYONE_GmbH, Versandkosten_Kommentar 
	FROM app_table";

$result = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));

	$file   = "inko-versand.txt";
	// Delete file if exist
	unlink($file);
	// Write to the file or create if not exist
	$f      = fopen($file, 'w'); // Open in write mode ('w' will overwrite everything everytime)

	$table  	= "app_table";
	$sql 		= mysqli_query($connect, "SELECT * FROM $table");
	$num_rows 	= mysqli_num_rows($sql);
	$products	= mysqli_fetch_array($sql);
	// Writing data in file var $file
	$connect->set_charset( 'utf8mb4' );

	$i = 1;
	while($row = mysqli_fetch_array($sql)) {

	  $nameComma 				  = $row['Produktname'];
		$name   					= str_replace(",", "", $nameComma);
		$pzn 						= $row['EAN_GTIN_Barcodenummer_UPC'];
		$url 						= $row['ProduktURL'];
		$brand 						= $row['Hersteller_Markenname'];
	  $priceComma 				  = $row['Preis_Brutto'];
		$price   					= str_replace(",", ".", $priceComma);
		$Artikelnummer 				= $row['Artikelnummer_im_Shop'];

	  $Produktbeschreibung  = $row['Produktbeschreibung'];
	  //Removes all 3 types of line breaks
		$Produktbeschreibung = str_replace("\r", " ", $Produktbeschreibung);
		$Produktbeschreibung = str_replace("\n", " ", $Produktbeschreibung);

		$Herstellerartikelnummern 	= $row['Herstellerartikelnummern_HAN_MPN'];
	  $LieferzeitComma 			  = $row['Lieferzeit'];
		$Lieferzeit 				= str_replace(",", "", $LieferzeitComma);
		$BildURL_1 					= $row['BildURL_1'];
	  $VersandkostenComma 		  = $row['Versandkosten'];
		$Versandkosten 				= str_replace(",", ".", $VersandkostenComma);
		$Vorkasse 					= $row['Vorkasse'];
		$Paydirekt 					= $row['Paydirekt'];
		$Paypal 					= $row['Paypal'];
		$Kreditkartenzahlung 		= $row['Kreditkartenzahlung_uber_BS_PAYONE_GmbH'];
	  $KommentarComma 			  = $row['Versandkosten_Kommentar'];
		$Kommentar   				= str_replace(",", "", $KommentarComma);

		if ($brand == 'Tena') {
			continue;
		}
		if ($i==1) {
			$product = "Artikelnummer im Shop".";"."EAN / GTIN / Barcodenummer / UPC".";"."Herstellerartikelnummern (HAN/MPN)".";"."Hersteller / Markenname".";"."Produktname".";"."Preis (Brutto)".";"."Lieferzeit".";"."Produktbeschreibung".";"."ProduktURL".";"."BildURL_1".";"."Versandkosten".";"."Vorkasse".";"."Paydirekt".";"."Paypal".";"."Kreditkartenzahlung über BS PAYONE GmbH".";"."Versandkosten Kommentar"."\n".$Artikelnummer.";".$pzn.";".$Herstellerartikelnummern.";".$brand.";".$name.";".$price.";".$Lieferzeit.";".$Produktbeschreibung.";".$url.";".$BildURL_1.";".$Versandkosten.";".$Vorkasse.";".$Paydirekt.";".$Paypal.";".$Kreditkartenzahlung.";".$Kommentar."\n";
		} else {
			$product = $Artikelnummer.";".$pzn.";".$Herstellerartikelnummern.";".$brand.";".$name.";".$price.";".$Lieferzeit.";".$Produktbeschreibung.";".$url.";".$BildURL_1.";".$Versandkosten.";".$Vorkasse.";".$Paydirekt.";".$Paypal.";".$Kreditkartenzahlung.";".$Kommentar."\n";
		}

		$i++;

		$product = str_replace("\t", "", $product);

		fwrite($f, $product);
	}
	fclose($f);

?>