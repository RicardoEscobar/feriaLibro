<?php



function full_catalog_array() {

	include("connection.php");

	try {

		$results=$db->query("SELECT media_id,title,category,img FROM media");

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

	try {

		$results=$db->prepare(

			"SELECT title,category,img, 

			format, year, publisher, isbn, genre

			FROM media

			JOIN Genres on media.genre_id=Genres.genre_id

			LEFT OUTER JOIN books on media.media_id=books.media_id

			WHERE media.media_id=?"

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

			FROM media_people

			JOIN people on pedia_people.people_id=people.people_id

			WHERE media_people.media_id=?"

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



function get_item_html($id,$item) {

	$output = "<li><a href='details.php?id="

					. $item["media_id"] ."'><img src='"

					. $item["img"] . "' title='" 

					. $item["title"] . "'>"

					. "<p>Ver detalles</p>"

					. "</a></li>";

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