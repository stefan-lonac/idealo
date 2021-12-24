<?php 
    require_once 'connections.php'; 
    include_once "write_file.php";
    include_once "write-biliger.php";
    include 'header.php';
 
   $sqlUser    = "SELECT * FROM login_table WHERE id='".$_SESSION['username']."'";
   $query      = $connect->query($sqlUser);
   $user       = $query->fetch_array(); 


    // Vraca usera na login stranu ako nije ulogovan
    if (!isset($_SESSION['username'])){
        header('Location: login.php');
     
    }

    // selektuje sve redove iz tabele i brikazuje broj redova iz select liste
    $countSql = mysqli_query( $connect,"SELECT * FROM app_table");
    $countRows = mysqli_num_rows($countSql);


?>



<div class="content-table"><!-- Start CONTENT -->


    <div class="welcome-title">
        <h2>Welcome, <span style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span></h2>
    </div>
        
    <ul class="info-container"><!-- Start Info container -->
        
        <li class="info-medizin">

            <div class="title-medizin">
                <h3>Insert products on Idealo</h3>
            </div>

            <table class="info-table">
                <tr>
                    <th>E-mail</th>
                    <td><p>test@test.com</p></td>
                </tr> 

                <tr>   
                    <th>Password</th>
                    <td><p>Test</p></td>
                </tr>

                <tr>
                    <th>URL</th>
                    <td>
                        <a href="https://www.test.com/" target="_blank">
                            <p>www.test.com</p>
                        </a>
                    </td>
                </tr>
            </table>
            
            <div class="medizin-img">
                <img src="img/Idealo_Logo_RGB_blue_white_letters.svg.png" alt="">
            </div>
        </li>    

        <li class="count-button"><!-- Prikaz iz select liste -->
            <h1><?php echo $countRows; ?></h1>
            <p>Product in Idealo.csv</p>

            <form method="post" action="script.php" class="excel-form">
                <input type="submit" name="export" class="excel-button" value="Download.csv" /><br>
            </form> 

            <div class="excel-form">
                <input class="excel-button" type="button" value="Idealo.csv" title="Save data to file medizinfuchs.txt" onclick="return RefreshWindow();"/>
            </div>
        </li>

    </ul><!-- END Info container -->

    <div class="table-container"><!-- Start Table container -->

        <form action="#" method="post">        
        <?php
            //
            $categorySql = mysqli_query($connect, "SELECT DISTINCT Hersteller_Markenname FROM app_table");

            if(mysqli_num_rows($categorySql)){
                $select= '<select name="select">';
                    $select.='<option selected="selected" value="*">All</option>';
                while($rs=mysqli_fetch_array($categorySql)){
                    $select.='<option value="'.$rs['Hersteller_Markenname'].'">'.$rs['Hersteller_Markenname'].'</option>';
                }
                $select.='</select>';
                echo $select;
            }
        ?>
            <input type="submit" name="submitcat" value="Show categories" />
        </form>

        <?php

            $sql = "SELECT * FROM app_table";

            if(isset($_POST['submitcat'])){
                $selected_val = $_POST['select'];  // Storing Selected Value In Variable
                switch ($_POST['select']) {
                    case '*':
                        $sql = "SELECT * FROM app_table";
                        break;

                    default:
                        $sql = "SELECT * FROM app_table WHERE Hersteller_Markenname = '$selected_val'";
                        echo "You have selected :" .$selected_val."<p id='rows-count'></p>";  // Displaying Selected Value
                        break;
                }
            }
        ?>
     


        <div class="table-in-container"><!-- Start Table in container -->

            <div class="table-title">
                <h3>List of products</h3>
            </div>


            <table border="1" cellspacing="0" cellpadding="0" id="myTable" id="pagination" class="sortable table pagination"><!-- Start table -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Name</th>
                        <th>EAN</th>
                        <th>URL</th>
                        <th>Shop Category</th>
                        <th>PRICE</th>
                        <th>DATE/TIME</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $result = $connect->query($sql);
         
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                            <tr class="inko-product <?php echo strtolower($row['Hersteller_Markenname']); ?>">
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['usernames']; ?></td>
                                <td><?php echo $row['Produktname']; ?></td>
                                <td><?php echo $row['EAN_GTIN_Barcodenummer_UPC']; ?></td>
                                <td><?php echo $row['ProduktURL']; ?></td>
                                <td><?php echo $row['shop_cat']; ?></td>
                                <td><?php echo $row['Preis_Brutto']; ?></td>
                                <td><?php echo $row['DATE']; ?></td>
                                <td>  
                                    <a href='show.php?id=<?php echo $row['id']; ?>'>
                                        <div class='img-cont view'>
                                            <img src='img/view.svg'>
                                        </div>
                                    </a>
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
                                  
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                    }
                ?>
                </tbody>
            </table><!-- END table -->

        </div><!-- END Table in container -->
    </div><!-- END Table container -->
</div><!-- END CONTENT -->

<a class="back-to-top" onclick="scrollToTop();return false;"></a><!-- BACK TO TOP -->

</body>
</html>

<script>
   //////// Count Rows JS ////////
    var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
    console.log(rows);
    document.getElementById("rows-count").innerHTML = rows;
</script>