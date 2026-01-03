<?php
session_start();
if ($usuario['usuario_id'] === 1) {
    header("Location: index.php");
} else {
    header("Location: index.php");
}
exit;

?>
