<?php 
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$database = "lab_2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(count($_POST) > 0) {

    $sql = "SELECT id, pass_, f_name, l_name, photo, role_id FROM users";

    $result = $conn->query($sql);
    
    while($row = $result->fetch_assoc()) {
        if(($row["f_name"] == $_POST["f_name"]) && ($row["pass_"] == $_POST["pass_"])) {
            $_SESSION['id'] = $row["id"];
            $_SESSION['f_name'] = $_POST["f_name"];
            $_SESSION['l_name'] = $row["l_name"];
            $_SESSION['photo'] = $row["photo"];
            $_SESSION['role_id'] = $row["role_id"];
            $_SESSION['auth'] = true;
            if($row['role_id'] == 1) {
                header('Location: main_adm.php');
            } else {
                header('Location: main.php');
            }
        break;
        } else {
            $_SESSION['auth'] = false;
        }
    }
    
}


?>