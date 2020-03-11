<?php 
    require_once 'connections.php'; 
    include_once "write_file.php";
?>

<?php 

   $sqlUser    = "SELECT * FROM login_table WHERE id='".$_SESSION['username']."'";
   $query      = $connect->query($sqlUser);
   $user       = $query->fetch_array(); 

?>

<?php include 'header.php'; ?>

<div class="content-table">

    <div class="welcome-title">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    </div>


    <ul class="info-container">
        
        <li class="info-medizin">
            <div class="title-medizin">
                <h3>Insert products on Idealo</h3>
            </div>
            <table class="info-table">
                <tr>
                    <th>E-mail</th>
                    <td><p>dejan@pavlovic.com</p></td>
                </tr> 

                <tr>   
                    <th>Password</th>
                    <td><p>Tarinja2</p></td>
                </tr>

                <tr>
                    <th>URL</th>
                    <td>
                        <a href="https://www.idealo.de/" target="_blank">
                            <p>www.idealo.de</p>
                        </a>
                    </td>
                </tr>
            </table>
            <div class="medizin-img">
                <img src="img/Idealo_Logo_RGB_blue_white_letters.svg.png" alt="">
            </div>
        </li>    

        <li class="count-button">
            <h1 id="rows-count"></h1>
            <p>Product in Idealo.csv</p>
            <!-- <form method="post" action="script.php" class="excel-form">
                <input type="submit" name="export" class="excel-button" value="Idealo.csv" /><br>
            </form> -->

            <div class="excel-form">
                <input class="excel-button" type="button" value="Create .csv file for Idealo" title="Save data to file medizinfuchs.txt" onclick="return RefreshWindow();"/>
            </div>
        </li>

    </ul>

    <div class="table-container">
        
        <div class="table-in-container">

            <div class="table-title">
                <h3>List of products</h3>
            </div>

            <div class="search">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products.." title="Type in a name">
            </div>

    <!--             <div>
                    <select name="">
                        <option disabled selected>Choose Casegory</option>
                        <option value="Lovital">Lovital</option>
                        <option value="Asana">Asana</option>
                        <option value="Orange">Orange</option>
                        <option value="Black">Black</option>
                    </select>
                </div> -->

            <table border="1" cellspacing="0" cellpadding="0" id="myTable" class="sortable table"><!-- Added class(sortable) for sort table (JS-library) -->
                <thead>
                    <tr>
                        <th>Produktname</th>
                        <th>EAN / GTIN / Barcodenummer / UPC</th>
        				<th>ProduktURL</th>
                        <th>Hersteller_Markenname</th>
                        <th>Preis (Brutto)</th>
                        <th>DATE/TIME</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM app_table";
                    $result = $connect->query($sql);
         
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['Produktname']; ?></td>
                                <td><?php echo $row['EAN_GTIN_Barcodenummer_UPC']; ?></td>
                                <td><?php echo $row['ProduktURL']; ?></td>
                                <td><?php echo $row['Hersteller_Markenname']; ?></td>
                                <td><?php echo $row['Preis_Brutto']; ?></td>
                                <td><?php echo $row['DATE']; ?></td>
                                <td>
                                    <a href='edit.php?id=<?php echo $row['id']; ?>'>
                                        <div class='img-cont edit'>
                                            <img src='img/edit.svg'>
                                        </div>
                                    </a>

                                    <a href='delete.php?id=<?php echo $row['id']; ?>'>
                                        <div class='img-cont delete'>
                                            <img src='img/delete.svg'>
                                        </div>
                                    </a>
                                    <a href='show.php?id=<?php echo $row['id']; ?>'>
                                        <div class='img-cont view'>
                                            <img src='img/view.svg'>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<a class="back-to-top" onclick="scrollToTop();return false;"></a>

</body>
</html>





<script>
   //////// Count Rows JS ////////
    var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
    console.log(rows);
    document.getElementById("rows-count").innerHTML = rows;
</script>

<script>
    // Refreshing page to save data in text file
    function RefreshWindow() {
        window.location.reload(true);
    }
</script>

<script>
   //////// Back to TOP ////////
    var timeOut;
    function scrollToTop() {
        if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0) {
            window.scrollBy(0, -80);
            timeOut = setTimeout('scrollToTop()', 10);
        }else {
            clearTimeout(timeOut);
        }
    }
</script>
