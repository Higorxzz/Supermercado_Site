<?php
session_start();

if ($_POST['codigo'] == $_SESSION['codigo']) {
    header("Location: ../index.html");
    exit;
} else {
    echo "<script>alert('Código incorreto!');history.back();</script>";
}
?>
