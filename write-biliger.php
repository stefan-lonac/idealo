<?php 
	// This function will delete $file and then create new one with same name and fill it with all data from database
	// fopen makes problem with .txt file if already exist, deleting $file ( unlink($file) ) solves that problem

require_once 'connections.php'; 


$query = "SELECT * FROM app_table";

$result = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));

	$file   = "inko-biliger.txt";
	// Delete file if exist
	unlink($file);
	// Write to the file or create if not exist
	$f      = fopen($file, 'w'); // Open in write mode ('w' will overwrite everything everytime)

	$table  	= "app_table";
	$sql 		= mysqli_query($connect, $query);
	$num_rows 	= mysqli_num_rows($sql);
	$products	= mysqli_fetch_array($sql);
	// Writing data in file var $file
	$connect->set_charset( 'utf8mb4' );

	$i = 1;
	while($row = mysqli_fetch_array($sql)) {

		$sku 						= $row['Artikelnummer_im_Shop'];
		$brand 						= $row['Hersteller_Markenname'];
		$Herstellerartikelnummern 	= $row['Herstellerartikelnummern_HAN_MPN'];
		$ean 						= $row['EAN_GTIN_Barcodenummer_UPC'];
		$name						= $row['Produktname'];
		$Produktbeschreibung		= $row['Produktbeschreibung'];
		//Removes all 3 types of line breaks
		$Produktbeschreibung = str_replace("\r", " ", $Produktbeschreibung);
		$Produktbeschreibung = str_replace("\n", " ", $Produktbeschreibung);

		$shopCategory				= $row['shop_cat'];
	  $priceComma					= $row['Preis_Brutto'];
		$price 						= str_replace(",", ".", $priceComma);
		$url 						= $row['ProduktURL'];
		$BildURL_1 					= $row['BildURL_1'];
		$Old_price                  = $row['old_price'];
		$Lieferzeit 				= $row['Lieferzeit'];
		$Versandkosten 				= '6.90';
		// $Versandkosten 				= $row['Versandkosten'];
		$pzn						= $row['pzn'];
		$promoText					= $row['promo_text'];
		$Kommentar					= $row['Versandkosten_Kommentar'];
		

		// Filtriranje Tena proizvoda pri unosu
		if ($brand == 'Tena') {
			continue;
		} else {
			if ($i==1) {
				$product = "aid".";"."brand".";"."mpnr".";"."ean".";"."name".";"."desc".";"."shop_cat".";"."price".";"."link".";"."image".";"."old_price".";"."dlv_time".";"."dlv_cost".";"."pzn".";"."promo_text".";"."\n".
				$sku.";".$brand.";".$Herstellerartikelnummern.";".$ean.";".$name.";".$Produktbeschreibung.";".$shopCategory.";".$price.";".$url.";".$BildURL_1.";".$Old_price.";".$Lieferzeit.";".$Versandkosten.";".$pzn.";".$promoText.";"."\n";
			} else {
				$product = $sku.";".$brand.";".$Herstellerartikelnummern.";".$ean.";".$name.";".$Produktbeschreibung.";".$shopCategory.";".$price.";".$url.";".$BildURL_1.";".$Old_price.";".$Lieferzeit.";".$Versandkosten.";".$pzn.";".$promoText.";"."\n";
			}
		}

		$i++;

		$product = str_replace("\t", "", $product);

		fwrite($f, $product);
	}
	fclose($f);

?> 