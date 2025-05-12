<?php
$conn = mysqli_connect("localhost", "root", "", "lab");

$user = $_POST['username'];
$pass = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)) {
    echo "Logado com sucesso!";
} else {
    echo "Login inválido!";
}
?>
