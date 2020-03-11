<?php 

	include 'header.php';
	require_once 'connections.php';

	if($_GET['id']) {
		$id = $_GET['id'];

		$sql = "SELECT * FROM app_table WHERE id = {$id}";
		$result = $connect->query($sql);

		$data = $result->fetch_assoc();

		$connect->close();

	?>

	<div class="content-table">
        <div class="welcome-title">
			<h3>Welcome 
				<span style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span> 
			to edit page</h3>
		</div>

		<div class="udate-cont">

			<h3>Last updated</h3>

		    <div class="date-time-cont">
		        <h4><?php echo $data['DATE'] ?></h4>
		    </div>


		</div>

		<fieldset>

			<form action="update.php" method="post">

				<div class="details-buttons-container">
					<div class="title-details">
						<h3>Edit product</h3>
					</div>

					<div class="save-delete">
						<input type="hidden" name="id" value="<?php echo $data['id']?>" />
						<div class="discard">
							<a onclick="discard();">
								<img src="img/discard.svg" alt="">
								<span>Discard</span>
							</a>
						</div>	

						<div class="save">
							<button id="someTable" type="submit">
								<img src="img/save.svg" alt="">
								<span>Save</span>
							</button>
						</div>
					</div>
				</div>

				<!-- <div class="select-cont">
					<h3>Select category</h3>
		            <div class="select-category">
		                <select name="" onchange="Category(event)">
		                    <option disabled selected>Choose Casegory</option>
		                    <option value="Lovital">Lovital</option>
		                    <option value="Asana">Asana</option>
		                    <option value="Orange">Orange</option>
		                    <option value="Black">Black</option>
		                </select>
		            </div>
		        </div> -->

				<table cellspacing="0" cellpadding="0" class="show-table">

					<tr>
						<th>Artikelnummer im Shop</th>
						<td><input type="text" name="Artikelnummer_im_Shop" placeholder="Artikel Nr" value="<?php echo $data['Artikelnummer_im_Shop'] ?>" /></td>
					</tr>

					<tr>
						<th>EAN / GTIN / Barcodenummer / UPC</th>
						<td><input type="text" name="EAN_GTIN_Barcodenummer_UPC" placeholder="EAN" value="<?php echo $data['EAN_GTIN_Barcodenummer_UPC'] ?>" /></td>
					</tr>

					<tr>
						<th>Herstellerartikelnummern (HAN/MPN)</th>
						<td><input type="text" name="Herstellerartikelnummern_HAN_MPN" placeholder="Hersteller Artikelnummer" value="<?php echo $data['Herstellerartikelnummern_HAN_MPN'] ?>" /></td>
					</tr>

					<tr>
						<th>Hersteller / Markenname</th>
						<td><input id="myCategory" type="text" name="Hersteller_Markenname" placeholder="Herstelle" value="<?php echo $data['Hersteller_Markenname'] ?>" /></td>
					</tr>

					<tr>
						<th>Produktname</th>
						<td><input type="text" name="Produktname" placeholder="Produktname" value="<?php echo $data['Produktname'] ?>" /></td>
					</tr>	

					<tr>
						<th>Preis (Brutto)</th>
						<td><input type="text" name="Preis_Brutto" placeholder="Price" id="purchase_price" value="<?php echo $data['Preis_Brutto'] ?>" /></td>
					</tr>

					<tr>
						<th>Lieferzeit</th>
						<td><input type="text" name="Lieferzeit" placeholder="Lieferzeit" value="<?php echo $data['Lieferzeit'] ?>" /></td>
					</tr>

					<tr>
						<th>Produktbeschreibung</th>
						<td><textarea rows="4" type="text" name="Produktbeschreibung" placeholder="Beschreibung"><?php echo $data['Produktbeschreibung'] ?></textarea></td>
					</tr>

					<tr>
						<th>ProduktURL</th>
						<td><input type="text" name="ProduktURL" placeholder="ProduktURL" value="<?php echo $data['ProduktURL'] ?>" /></td>
					</tr>

					<tr>
						<th>BildURL_1</th>
						<td><input type="text" name="BildURL_1" placeholder="ImgURL" value="<?php echo $data['BildURL_1'] ?>" /></td>
					</tr>

					<tr>
						<th>Old_price
							<select id="percentage" class="percentage">
	                            <option value="1.05">5%</option>
	                            <option value="1.10">10%</option>
	                            <option value="1.15">15%</option>
	                            <option value="1.20">20%</option>
	                        </select>
	                    </th>
						<td><input type="text" name="Old_price" placeholder="ImgURL" id="menu_price" value="<?php echo $data['old_price'] ?>" readonly/></td>
					</tr>

					<tr>
						<th>Versandkosten</th>
						<td><input type="text" name="Versandkosten" placeholder="Versandkosten" value="<?php echo $data['Versandkosten'] ?>" /></td>
					</tr>

					<tr>
		                <th>Shop Category Path <span class="required"> *</span></th>
		                <td><input type="text" name="shop_cat" placeholder="Shop Category" value="<?php echo $data['shop_cat'] ?>" /></td>
		            </tr>

		            <tr>
		                <th>PZN <span class="required"> *</span></th>
		                <td><input type="text" name="pzn" placeholder="PZN" value="<?php echo $data['pzn'] ?>" /></td>
		            </tr>
		            
		            <tr>
		                <th>Promo text <span class="required"> *</span></th>
		                <td><input type="text" name="promo_text" placeholder="Promo text" value="<?php echo $data['promo_text'] ?>" /></td>
		            </tr>

					<tr>
						<th>Vorkasse</th>
						<td><input type="text" name="Vorkasse" placeholder="Vorkasse" value="<?php echo $data['Vorkasse'] ?>" /></td>
					</tr>

					<tr>
						<th>Paydirekt</th>
						<td><input type="text" name="Paydirekt" placeholder="Paydirekt" value="<?php echo $data['Paydirekt'] ?>" /></td>
					</tr>

					<tr>
						<th>Paypal</th>
						<td><input type="text" name="Paypal" placeholder="Paypal" value="<?php echo $data['Paypal'] ?>" /></td>
					</tr>

					<tr>
						<th>Kreditkartenzahlung über BS PAYONE GmbH</th>
						<td><input type="text" name="Kreditkartenzahlung_uber_BS_PAYONE_GmbH" placeholder="Kreditkartenzahlung" value="<?php echo $data['Kreditkartenzahlung_uber_BS_PAYONE_GmbH'] ?>" /></td>
					</tr>

					<tr>
						<th>Versandkosten Kommentar</th>
						<td><textarea rows="4" type="text" name="Versandkosten_Kommentar" placeholder="Versandkosten_Kommentar"><?php echo $data['Versandkosten_Kommentar'] ?></textarea></td>
					</tr>

				</table>

			</form>

		</fieldset>

	</div>

</body>
</html>

<?php
}
?>


<script>
	function discard() {
		swal({
		  title: '<strong>Are you sure you do not want to save changes?</strong>',
		  type: 'info',
		  html:
		    '',
		  showCloseButton: true,
		  showCancelButton: true,
		  focusConfirm: false,
		  confirmButtonText:
		    '<a style="color:white;" href="index.php"> Yes</a>',
		  confirmButtonAriaLabel: 'Thumbs up, great!',
		  cancelButtonText:
		    '<a style="color:white;">No</a>',
		  cancelButtonAriaLabel: 'Thumbs down',
		})
	}




    $("#percentage").change(function () {
    var perc = parseFloat($("#purchase_price").val());
    var purch = parseFloat($("#percentage").val());

    $("#menu_price").val((purch * perc).toFixed(2));
});
</script>