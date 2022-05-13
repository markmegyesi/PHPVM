<?php
require_once '../classes/Crud_class.php';
$service=$_GET['id'];

$delete= new Crud_class();
$delete->delete($service);
header('location:../index.php');
