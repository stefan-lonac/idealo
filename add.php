<?php
    include 'header.php';
    header('Content-Type: text/html; charset=utf8mb4_general_ci');
    require_once 'connections.php';

 
    if($_POST) {
      $nameComma                    = $_POST['Produktname'];
        $name                       = str_replace(",", "", $_POST['Produktname']);

        // str_replace(",", "", str_replace("Ä", "&Auml;", str_replace("ä", "&auml;", str_replace("é", "&eacute;", str_replace("ö", "&ouml;", str_replace("Ö", "&Ouml;", str_replace("ü", "&uuml;", str_replace("Ü", "&Uuml;", str_replace("ß", "&szlig;", $_POST['Produktname'])))))))));
        
        $ean                        = $_POST['EAN_GTIN_Barcodenummer_UPC'];
        $url                        = $_POST['ProduktURL'];
        $brand                      = $_POST['Hersteller_Markenname'];
      $priceComma                   = $_POST['Preis_Brutto'];
        $price                      = str_replace(",", ".", $priceComma);
        $Artikelnummer              = $_POST['Artikelnummer_im_Shop'];
      $ProduktbeschreibungComma     = $_POST['Produktbeschreibung'];
        $Produktbeschreibung        = str_replace(",", "", $ProduktbeschreibungComma);
        $Herstellerartikelnummern   = $_POST['Herstellerartikelnummern_HAN_MPN'];
      $LieferzeitComma              = $_POST['Lieferzeit'];
        // $Lieferzeit                 = str_replace(",", "", $LieferzeitComma);
        $Lieferzeit                 = 'ca. 5-7 Tage';
        $BildURL_1                  = $_POST['BildURL_1'];
        $Old_price                  = $_POST['Old_price'];
      $VersandkostenComma           = $_POST['Versandkosten'];
        // $Versandkosten              = str_replace(",", ".", $VersandkostenComma);
        $Versandkosten              = '6.90';

        $shopCategory               = $_POST['shop_cat'];
        $pzn                        = $_POST['pzn'];
        $promoText                  = $_POST['promo_text'];

        $Vorkasse                   = $_POST['Vorkasse'];
        $Paydirekt                  = $_POST['Paydirekt'];
        $Paypal                     = $_POST['Paypal'];
        $Kreditkartenzahlung        = $_POST['Kreditkartenzahlung_uber_BS_PAYONE_GmbH'];
      $KommentarComma               = $_POST['Versandkosten_Kommentar'];
        // $Kommentar                  = str_replace(",", "", $KommentarComma);
        $Kommentar                  = 'Für die Lieferung innerhalb Deutschlands berechnen wir pauschal 6.90 euro pro Lieferung, unabhangig vom Gewicht der Lieferung innerhalb Deutschlands. Ab einer Bestellung in Hohe von 150.00 euro liefern wir portofrei.';
        $usernames                  = $_SESSION['username'];


        $sql = "INSERT INTO app_table (
            Artikelnummer_im_Shop,
            EAN_GTIN_Barcodenummer_UPC,
            Herstellerartikelnummern_HAN_MPN,
            Hersteller_Markenname,
            Produktname,
            Preis_Brutto,
            Lieferzeit,
            Produktbeschreibung,
            ProduktURL,
            BildURL_1,
            old_price,
            Versandkosten,
            shop_cat,
            pzn,
            promo_text,
            Vorkasse,
            Paydirekt,
            Paypal,
            Kreditkartenzahlung_uber_BS_PAYONE_GmbH,
            Versandkosten_Kommentar,
            usernames
        )
        VALUES (
            '$Artikelnummer',
            '$ean',
            '$Herstellerartikelnummern',
            '$brand',
            '$name',
            '$price',
            '$Lieferzeit',
            '$Produktbeschreibung',
            '$url',
            '$BildURL_1',
            '$Old_price',
            '$Versandkosten',
            '$shopCategory',
            '$pzn',
            '$promoText',
            '$Vorkasse',
            '$Paydirekt',
            '$Paypal',
            '$Kreditkartenzahlung',
            '$Kommentar',
            '$usernames'
        )";

        if($connect->query($sql) === TRUE) {
            // Back to homepage after success
            header('Location: index.php');
        } else {
            echo "Error " . $sql . ' ' . $connect->connect_error;
        }
     
        $connect->close();
    }

?><!-- 

<script>

    swal({
      type: 'success',
      title: '<strong>New product successfully created</strong>',
      text: 'Just keep on going so fast we reach 1000!',
      focusConfirm: true,
      allowOutsideClick: false,
      confirmButtonText:
        '<a style="color:white;" href="index.php">Home</a>',
      confirmButtonAriaLabel: 'Thumbs up, great!',
      
    })

</script>
 -->


