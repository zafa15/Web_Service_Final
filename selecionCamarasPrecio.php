<?php 

 define('DB_HOST', 'localhost');
 define('DB_USER', 'id11466685_sa');
 define('DB_PASS', 'aA-7852396541');
 define('DB_NAME', 'id11466685_infotec');
 
 $conn = new mysqli("localhost", "id11466685_sa", "aA-7852396541", "id11466685_infotec");
 
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //el query
 $v1 = $_GET['v1'];
 $v2 = $_GET['v2'];
 $stmt = $conn->prepare("SELECT id, name, description, price, stock, img_url 
FROM article
WHERE id_category = 1 AND price BETWEEN $v1 and $v2;");
 
 // ejecutar query 
 $stmt->execute();
 
 //obtener resultados
 $stmt->bind_result($id, $name, $description, $price, $stock, $img_url);
 
 $products = array(); 
 
 //muestra de resultados
 while($stmt->fetch()){
 $temp = array();
 $temp['id'] = $id; 
 $temp['name'] = $name; 
 $temp['description'] = $description; 
 $temp['price'] = $price; 
 $temp['stock'] = $stock; 
 $temp['img_url'] = $img_url; 
 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);