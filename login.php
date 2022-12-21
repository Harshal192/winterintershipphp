<?php
session_start();
?>

<html>

<body>
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"><br><br>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"><br><br>

    <button type="submit" name="submit">Login</button><br><br>
    
  </div>


</form>

</body>

</html>
<?php
if(Isset($_POST['submit'])){
    $conn = mysqli_connect("localhost", "root", "", "internship","3307");
    if(!$conn){
        echo "Can't Connnect Database" . mysqli_connect_error();
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username==""  and $password==""){
    echo "<script>
        alert('fields cannot be empty');
        window.location.href = 'http://localhost/internship2-Harshal/login.php';
        </script>";

    }
$query = "SELECT username,password FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo "<script>alert('user does not exist');
    window.location.href = 'http://localhost/internship2-Harshal/login.php';
    </script>";
}

if ($username != $row['username'] or $password != $row['password']){
    echo "<script>
    alert('username and password mismatch try again');
    window.location.href = 'http://localhost/internship2-Harshal/login.php';
    </script>";
}
else if ($username == $row['username'] and $password == $row['password']){
    echo "<script>
    alert('sucessful');
    window.location.href = 'http://localhost/internship2-Harshal/index.php';
    </script>";
    $_SESSION['user'] = $username;
}


}
?>