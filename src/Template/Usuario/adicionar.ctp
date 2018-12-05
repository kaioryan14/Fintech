<?php
    header("Content-Type: application/json; charset=utf-8");
    $this->layout = false;
    echo json_encode($data[0]);
?>