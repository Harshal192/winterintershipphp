<?php

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
        window.location.href = 'http://localhost/internship2-Harshal/login.html';
        </script>";

    }
$query = "SELECT username,password FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo "<script>alert('user does not exist');
    window.location.href = 'http://localhost/internship2-Harshal/login.html';
    </script>";
}

if ($username != $row['username'] or $password != $row['password']){
    echo "<script>
    alert('username and password mismatch try again');
    window.location.href = 'http://localhost/internship2-Harshal/index.php';
    </script>";
}
else if ($username == $row['username'] and $password == $row['password']){
    echo "<script>
    alert('sucessful');
    window.location.href = 'http://localhost/internship2-Harshal/index.php';
    </script>";
}

?>