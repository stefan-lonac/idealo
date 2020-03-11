<?php 
    include 'header.php';
        require_once 'connections.php';
?>

<div class="content-table">
    <fieldset>
     
        <form action="add.php" method="post" >

            <div class="details-buttons-container">
                <div class="title-details">
                    <h3>Add product</h3>
                </div>

                <div class="save-delete">
                    <input type="hidden" name="id" />
                    <div class="discard">  
                        <a href="index.php">
                            <img src="img/discard.svg" alt="">  
                            <span>Discard</span>
                        </a>
                    </div>

                    <div class="save">
                        <button name="submit" value="submit" id="someTable" type="submit">
                            <img src="img/save.svg" alt="">
                            <span>Save</span>
                        </button>
                    </div>
                </div>
            </div>


            <table cellspacing="0" cellpadding="0" class="show-table">
                <tr>
                    <th>Artikelnummer im Shop <span class="required"> *</span></th>
                    <td><input type="text" name="Artikelnummer_im_Shop" placeholder="Artikel Nr" /></td>
                </tr>

                <tr>
                    <th>EAN / GTIN / Barcodenummer / UPC <span class="required"> *</span></th>
                    <td><input type="text" name="EAN_GTIN_Barcodenummer_UPC" placeholder="EAN" /></td>
                </tr>

                <tr>
                    <th>Herstellerartikelnummern (HAN/MPN) <span class="required"> *</span></th>
                    <td><input type="text" name="Herstellerartikelnummern_HAN_MPN" placeholder="Hersteller Artikelnummer" /></td>
                </tr>

                <tr>
                    <th>Hersteller / Markenname <span class="required"> *</span></th>
                    <td><input id="myCategory" type="text" name="Hersteller_Markenname" placeholder="Hersteller" /></td>
                </tr>

                <tr>
                    <th>Produktname<span class="required"> *</span></th>
                    <td><input type="text" name="Produktname" placeholder="Produktname" /></td>
                </tr> 

                <tr>
                    <th>Preis (Brutto) <span class="required"> *</span></th>
                    <td><input type="text" name="Preis_Brutto" placeholder="Price" id="purchase_price"/></td>
                </tr>

                <tr>
                    <th>Lieferzeit <span class="required"> *</span></th>
                    <td><input type="text" name="Lieferzeit" placeholder="Lieferzeit" value="ca. 5-7 Tage" /></td>
                </tr>

                <tr>
                    <th>Produktbeschreibung <span class="required"> *</span></th>
                    <td><textarea rows="4" type="text" name="Produktbeschreibung" placeholder="Beschreibung"></textarea></td>
                </tr>

                <tr>
                    <th>ProduktURL <span class="required"> *</span></th>
                    <td><input type="text" name="ProduktURL" placeholder="ProduktURL" /></td>
                </tr>

                <tr>
                    <th>BildURL_1 <span class="required"> *</span></th>
                    <td><input type="text" name="BildURL_1" placeholder="ImgURL" /></td>
                </tr>

                <tr>
                    <th>Old_price<span class="required"> *</span>
                        <select id="percentage" class="percentage">
                            <option value="1.05">5%</option>
                            <option value="1.10">10%</option>
                            <option value="1.15">15%</option>
                            <option value="1.20">20%</option>
                        </select>
                    </th>
                    <td><input type="text" name="Old_price" placeholder="Old_price" id="menu_price" readonly/></td>
                </tr>

                <tr>
                    <th>Versandkosten <span class="required"> *</span></th>
                    <td><input type="text" name="Versandkosten" placeholder="Versandkosten" value="6.90" /></td>
                </tr>

                <tr>
                    <th>Shop Category Path <span class="required"> *</span></th>
                    <td><input type="text" name="shop_cat" placeholder="Shop Category" /></td>
                </tr>

                <tr>
                    <th>PZN <span class="required"> *</span></th>
                    <td><input type="text" name="pzn" placeholder="PZN" /></td>
                </tr>

                <tr>
                    <th>Promo text <span class="required"> *</span></th>
                    <td><input type="text" name="promo_text" placeholder="Promo text" /></td>
                </tr>

                <tr>
                    <th>Vorkasse</th>
                    <td><input type="text" name="Vorkasse" placeholder="Vorkasse" /></td>
                </tr>

                <tr>
                    <th>Paydirekt</th>
                    <td><input type="text" name="Paydirekt" placeholder="Paydirekt" /></td>
                </tr>

                <tr>
                    <th>Paypal</th>
                    <td><input type="text" name="Paypal" placeholder="Paypal" /></td>
                </tr>

                <tr>
                    <th>Kreditkartenzahlung über BS PAYONE GmbH</th>
                    <td><input type="text" name="Kreditkartenzahlung_uber_BS_PAYONE_GmbH" placeholder="Kreditkartenzahlung" /></td>
                </tr>

                <tr>
                    <th>Versandkosten Kommentar <span class="required"> *</span></th>
                    <td><textarea rows="4" type="text" name="Versandkosten_Kommentar" placeholder="Kommentar">Fur die Lieferung innerhalb Deutschlands berechnen wir pauschal 6.90 euro pro Lieferung, unabhangig vom Gewicht der Lieferung innerhalb Deutschlands. Ab einer Bestellung in Hohe von 150.00 euro liefern wir portofrei.</textarea></td>
                </tr>

 <!--                <div class="select-cont">
                    <h3>Select category</h3>
                    <div class="select-category">
                        <select name="" onchange="Category(event)">
                            <option disabled selected>Choose Casegory</option>
                            <option value="Lovital">Lovital</option>
                            <option value="Asana">Asana</option>
                            <option value="Euron">Euron</option>
                            <option value="Seni">Seni</option>
                            <option value="Tena">Tena</option>
                            <option value="AMD">AMD</option>
                            <option value="Comfy">Comfy</option>
                            <option value="Abena">Abena</option>
                        </select>
                    </div>
                </div> -->

            </table>

        </form>     
    </fieldset>

</div>
</body>
</html>


    
<script>
    $("#percentage").change(function () {
    var perc = parseFloat($("#purchase_price").val());
    var purch = parseFloat($("#percentage").val());

    $("#menu_price").val((purch * perc).toFixed(2));
});
</script>