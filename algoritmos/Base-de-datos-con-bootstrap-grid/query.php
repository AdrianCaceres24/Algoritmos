<?php 

if (!$link=mysqli_connect('localhost','root','','classicmodels')){die('error de coneccion' );}

$tables=[
	'products' => 'products',
	'productlines' => 'productlines',
	'offices' => 'offices',
	];


if (isset($_GET['table'])){
	if (isset($tables[$_GET['table']])){
		$query="Select * from " . $_GET['table'] . " limit ". (isset($_GET['page']) ? $_GET['page'] : 0)*10 . ",10";
		$qr=mysqli_query($link, $query);
		while ($row=mysqli_fetch_assoc($qr)){
			$arr[]=$row;
		}
		$arr2=[$arr, ceil(mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(".key($arr).") AS cOC FROM ".$_GET['table']))['cOC']/10)];
		echo json_encode($arr2);

	}
}





?>