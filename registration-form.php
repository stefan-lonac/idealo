<?php 
    require_once 'connections.php';  
    include 'header.php';
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css">
        <!-- <script src="js/main.js"></script> -->
    </head>
    <body>

        <form class="form-change-pass" method="post" style="padding-top: 100px;" action="change-password.php">

            <div class="reg-h3-cont">
                <h3>Welcome <span style="text-transform: capitalize;">
                    <?php echo $_SESSION['username']; ?></span>
                to your account page!</h3>
            </div>
            
            <ul>
                <li>
                    <label for="">Old password</label>
                    <input type="text" name="oldpass" id="myInput">
                </li>

                <li>
                    <label for="">Change password</label>
                    <input type="text" name="changepass" id="myInput">
                </li>

                <li>
                    <label for="">Repeat new password</label>
                    <input type="text" name="repeatpass">
                </li>

                <li>
                    <input type="submit" name="submit" value="submit">
                </li>
            </ul>
        </form>




<?php 


 if ($result = $connect->query("SELECT count(*) usernames FROM app_table WHERE usernames = '".$_SESSION['username']."'")) {

     /* fetch the first row as result */
     $row = $result->fetch_assoc();

    printf("<h4>Added rows %d\n", $row['usernames']."</h4>");
   /* close result set */
    $result->close();
 }

 /* close connection */
 $connect->close();

?>


        <h5><a href="index.php">Back to Home page</a></h5>

    </body>
</html>



<style>
    
    .form-change-pass ul li {
        border:none;
        display: block;
        width: 30%;
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: left;
    }

    .form-change-pass ul li label {
        display: block;
        margin-bottom: 10px;
        margin-top: 10px;
    }

</style>