<?php
session_start();
if(Isset($_SESSION['user'])){
?>
<h1>This is the LOGGED-IN page</h1>
<button onclick="window.location.href='logout.php'" type="button">Logout</button>
<?php
}else{
?>
<h1>This is not the LOGGED-IN page</h1>
<?php
}
?>
<html>

<body>
    <style>
        h1 {
            background-color: aquamarine;
            color: red;
        }
    </style>
    <h1>Hallo</h1>
    <?php
    echo "Za Worldo";
    ?>

</body>

</html>