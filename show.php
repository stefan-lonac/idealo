<html>
<?php require_once 'connections.php'; ?>
<?php include 'header.php'; ?>


<div class="content-table">
    
    <div class="show-table-container">

        <div class="details-buttons-container">
            <div class="title-details">
              <h3>Details</h3>
            </div>
            <div id="edit-js" class='edit-img save-delete'></div>
        </div>

        <table class="show-table">

            <tbody>
                 <?php

                $id = $_GET['id'];
                $sql = "SELECT * FROM app_table where id in ($id)";
            
                $result = $connect->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {


                        echo "
                            <tr>
                                <td style='display:none;'>
                                <div id='edit'>
                                    <a href='edit.php?id=".$row['id']."'><img src='img/edit.svg'>Edit</a>
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <th>Author</th>
                                <td>".$row['usernames']."</td>
                            </tr>

                            <tr>
                                <th>Artikelnummer im Shop</th>
                                <td>".$row['Artikelnummer_im_Shop']."</td>
                            </tr>

                            <tr>
                                <th>EAN / GTIN / Barcodenummer / UPC</th>
                                <td>".$row['EAN_GTIN_Barcodenummer_UPC']."</td>
                            </tr>

                            <tr>
                                <th>Herstellerartikelnummern (HAN/MPN)</th>
                                <td>".$row['Herstellerartikelnummern_HAN_MPN']."</td>
                            </tr>

                            <tr>
                                <th>Hersteller / Markenname</th>
                                <td>".$row['Hersteller_Markenname']."</td>
                            </tr>

                            <tr>
                                <th>Produktname</th>
                                <td>".$row['Produktname']."</td>
                            </tr>

                            <tr>
                                <th>Preis (Brutto)</th>
                                <td>".$row['Preis_Brutto']."</td>
                            </tr>

                            <tr>
                                <th>Lieferzeit</th>
                                <td>".$row['Lieferzeit']."</td>
                            </tr>

                            <tr>
                                <th>Produktbeschreibung</th>
                                <td>".$row['Produktbeschreibung']."</td>
                            </tr>

                            <tr>
                                <th>ProduktURL</th>
                                <td>".$row['ProduktURL']."</td>
                            </tr>

                            <tr>
                                <th>BildURL_1</th>
                                <td>".$row['BildURL_1']."</td>
                            </tr>

                             <tr>
                                <th>Old_price</th>
                                <td>".$row['old_price']."</td>
                            </tr>

                            <tr>
                                <th>Versandkosten</th>
                                <td>".$row['Versandkosten']."</td>
                            </tr>

                            <tr>
                                <th>Link to Shop Category</th>
                                <td>".$row['shop_cat']."</td>
                            </tr>

                            <tr>
                                <th>PZN</th>
                                <td>".$row['pzn']."</td>
                            </tr>
                            
                            <tr>
                                <th>Promo text</th>
                                <td>".$row['promo_text']."</td>
                            </tr>

                            <tr>
                                <th>Vorkasse</th>
                                <td>".$row['Vorkasse']."</td>
                            </tr>

                            <tr>
                                <th>Paydirekt</th>
                                <td>".$row['Paydirekt']."</td>
                            </tr>


                            <tr>
                                <th>Paypal</th>
                                <td>".$row['Paypal']."</td>
                            </tr>

                            <tr>
                                <th>Kreditkartenzahlung über BS PAYONE GmbH</th>
                                <td>".$row['Kreditkartenzahlung_uber_BS_PAYONE_GmbH']."</td>
                            </tr>

                            <tr>
                                <th>Versandkosten Kommentar</th>
                                <td>".$row['Versandkosten_Kommentar']."</td>
                            </tr> ";
                    }
                } else {
                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
 
</body>
</html>

<script type="text/javascript">

    /////////// Pokazuje element na drugom mestu (edit-js) ///////////
    var edit = document.getElementById("edit");
    document.getElementById("edit-js").innerHTML = edit.innerHTML;
</script>