<?php
require_once './fetch.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['data'];
    $show = new MostrarData();
    $data = $show->mostrar($id);
} else {
    header('Location: index.php');
}
