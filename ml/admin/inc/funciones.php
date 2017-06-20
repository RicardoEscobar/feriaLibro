<?php
function full_catalog_array() {
	include("connection.php");
    $db = new PDO("mysql:host=localhost;dbname=mlportaldb;port=3307","root","");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	try {
		$results=$db->query("SELECT media_id,title,category,img FROM Media");
	} catch(Exception $e) {
		echo "Error: ";
		echo $e->getMessage();
		exit;
	}
	$catalog=$results->fetchAll(PDO::FETCH_ASSOC);
	return $catalog;
}

function single_item_array($id) {
	include("connection.php");
    $db = new PDO("mysql:host=localhost;dbname=mlportaldb;port=3307","root","");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	try {
		$results=$db->prepare(
			"SELECT title,category,img, 
			format, year, publisher, isbn, genre
			FROM Media
			JOIN Genres on Media.genre_id=Genres.genre_id
			LEFT OUTER JOIN Books on Media.media_id=Books.media_id
			WHERE Media.media_id=?"
		);
		$results->bindParam(1,$id,PDO::PARAM_INT);
		$results->execute();
	} catch(Exception $e) {
		echo "Error: ";
		echo $e->getMessage();
		exit;
	}
	$item=$results->fetch(PDO::FETCH_ASSOC);
	if(empty($item)) return $item; // early return
	// query para people
	try {
		$results=$db->prepare(
			"SELECT fullname, role
			FROM Media_People
			JOIN People on Media_People.people_id=People.people_id
			WHERE Media_People.media_id=?"
		);
		$results->bindParam(1,$id,PDO::PARAM_INT);
		$results->execute();
	} catch(Exception $e) {
		echo "Error: ";
		echo $e->getMessage();
		exit;
	}
	while($row=$results->fetch(PDO::FETCH_ASSOC)) {
		$item[$row["role"]][]=$row["fullname"];
	}
	return $item;
}

function delete_item($id,$item) {
	$output = "<li><a href='consulta.php?id="
					. $item["media_id"] ."'><img src='../"
					. $item["img"] . "' title='" 
					. $item["title"] . "'></a>"
                    . "<p><a href='modificar.php?id=".$item["media_id"]."'>Modificar</a></p>"
                    . "<p><a href='eliminar.php?id=".$item["media_id"]."'>Eliminar</a></p>"
					. "</li>";
	return $output;
}

function array_category($catalog,$category) {
	$output=array();
	foreach($catalog as $id=>$item) {
		if($category==null OR strtolower($category)==strtolower($item["category"])) {
			$sort=$item["title"];
			$sort=ltrim($sort,"The ");
			$sort=ltrim($sort,"A ");
			$sort=ltrim($sort,"An ");
			$output[$id]=$sort;
		}
	}
	asort($output);
	return array_keys($output);
}
function alta_and_media_people($persona,$id,$rol) {
    include("connection.php");
    foreach (explode(', ', $persona) as $n5) {
    $cont=0;
    $sql1 = "select  * from people";
    $result1 = $db->query($sql1);
    //Construir y ejecutar el query
    while($row=$result1->fetch_assoc()){
        if($row["fullname"]==$n5){
           $cont++;
        }
    }
    if($cont==0){
    $query = "insert into people values (null,'$n5')";
    $result=$db->query($query);
    }
    $sql1 = "select  * from people";
    $result1 = $db->query($sql1);
    //Construir y ejecutar el query
    while($row=$result1->fetch_assoc()){
        if($row["fullname"]==$n5){
            $people_id=$row["people_id"];
        }
    }
    $query3 = "insert into media_people values ('$id','$people_id','$rol')";
    $result3=$db->query($query3);
    }
}
function modifica_and_media_people($persona,$id,$rol) {
    include("connection.php");
    foreach (explode(', ', $persona) as $n5) {
    $cont=0;
    $sql1 = "select  * from people";
    $result1 = $db->query($sql1);
    //Construir y ejecutar el query
    while($row=$result1->fetch_assoc()){
        if($row["fullname"]==$n5){
           $cont++;
        }
    }
    if($cont==0){
    $query = "insert into people values (null,'$n5')";
    $result=$db->query($query);
        
    $sql1 = "select  * from people";
    $result1 = $db->query($sql1);
    //Construir y ejecutar el query
    while($row=$result1->fetch_assoc()){
        if($row["fullname"]==$n5){
            $people_id=$row["people_id"];
        }
    }
    $query3 = "insert into media_people values ('$id','$people_id','$rol')";
    $result3=$db->query($query3);
    }
    }
}