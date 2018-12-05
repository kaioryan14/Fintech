<?php 
$this->layout = false;
header("Content-Type: application/json; charset=utf-8");
echo json_encode($data);
?>