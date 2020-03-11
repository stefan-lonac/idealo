<?php
	include 'header.php';
	require_once 'connections.php';
?>

<?php 

	if($_POST) {
	  $nameComma 					= $_POST['Produktname'];
		$name   					= str_replace(",", "", $nameComma);
		$ean 						= $_POST['EAN_GTIN_Barcodenummer_UPC'];
		$url 						= $_POST['ProduktURL'];
		$brand 						= $_POST['Hersteller_Markenname'];
	  $priceComma 					= $_POST['Preis_Brutto'];
		$price   					= str_replace(",", ".", $priceComma);
		$Artikelnummer 				= $_POST['Artikelnummer_im_Shop'];
	  $ProduktbeschreibungComma		= $_POST['Produktbeschreibung'];
		$Produktbeschreibung		= str_replace(",", "", $ProduktbeschreibungComma);
		$Herstellerartikelnummern 	= $_POST['Herstellerartikelnummern_HAN_MPN'];
	  $LieferzeitComma 				= $_POST['Lieferzeit'];
		// $Lieferzeit				= str_replace(",", "", $LieferzeitComma);
		$Lieferzeit					= '1-3 Werktage bei Bestellungen vor 12.00 Uhr';
		$BildURL_1 					= $_POST['BildURL_1'];
		$Old_price					= $_POST['Old_price'];
	  $VersandkostenComma 			= $_POST['Versandkosten'];
		// $Versandkosten			= str_replace(",", ".", $VersandkostenComma);
		$Versandkosten				= '4.50';

		$shopCategory				= $_POST['shop_cat'];
		$pzn						= $_POST['pzn'];
		$promoText					= $_POST['promo_text'];

		$Vorkasse 					= $_POST['Vorkasse'];
		$Paydirekt 					= $_POST['Paydirekt'];
		$Paypal 					= $_POST['Paypal'];
		$Kreditkartenzahlung 		= $_POST['Kreditkartenzahlung_uber_BS_PAYONE_GmbH'];
	  $KommentarComma 				= $_POST['Versandkosten_Kommentar'];
		// $Kommentar				= str_replace(",", "", $KommentarComma);
		$Kommentar					= 'Für die Lieferung innerhalb Deutschlands berechnen wir pauschal 4.50 euro pro Lieferung, unabhangig vom Gewicht der Lieferung innerhalb Deutschlands. Ab einer Bestellung in Hohe von 150.00 euro liefern wir portofrei.';
		$usernames                  = $_SESSION['username'];


		$id = $_POST['id'];

		$sql  = "UPDATE app_table 
			SET Produktname 							= '$name',
				EAN_GTIN_Barcodenummer_UPC 				= '$ean',
				ProduktURL 								= '$url',
				Hersteller_Markenname 					= '$brand',
				Preis_Brutto 							= '$price',
				Artikelnummer_im_Shop 					= '$Artikelnummer',
				Produktbeschreibung 					= '$Produktbeschreibung',
				Herstellerartikelnummern_HAN_MPN 		= '$Herstellerartikelnummern',
				Lieferzeit 								= '$Lieferzeit',
				BildURL_1 								= '$BildURL_1',
				old_price								= '$Old_price',
				Versandkosten 							= '$Versandkosten',
				shop_cat 								= '$shopCategory',
				pzn 									= '$pzn',
				promo_text 								= '$promoText',
				Vorkasse 								= '$Vorkasse',
				Paydirekt 								= '$Paydirekt',
				Paypal 									= '$Paypal',
				Kreditkartenzahlung_uber_BS_PAYONE_GmbH = '$Kreditkartenzahlung',
				Versandkosten_Kommentar 				= '$Kommentar',
				usernames								= '$usernames'
			WHERE id = $id";

		if($connect->query($sql) === TRUE) {
            // Back to homepage after success
            header('Location: index.php');
        } else {
            echo "Error " . $sql . ' ' . $connect->connect_error;
        }
     
        $connect->close();

	}

?>


<!-- <script>
	
	swal({
	  type: 'success',
	  title: '<strong>Succcessfully Updated</strong>',
	  text: 'Back to the home page and continue to fill out',
	  focusConfirm: true,
	  confirmButtonText:
	    '<a style="color:white;" href="https://www.inko-versand.de/idealo/index.php">Home</a>',
	  confirmButtonAriaLabel: 'Thumbs up, great!',
	})

</script> -->