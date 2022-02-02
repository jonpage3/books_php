<?php
function connect_to_database() {
   global $db;
   try {
      $db = new PDO('sqlite:books.db');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch (PDOException $e) {
      $error_message = $e->getMessage();
      echo "<p>SQL error: $error_message </p>";
      $db = null;   // "closes" a connection
      exit();
   }
}

function get_list_of_all_books() {
   global $db;
   try {
      $query = "SELECT * FROM BOOK ORDER BY Title";
      $statement = $db->prepare($query);
      $statement->execute();
      return $statement;
   }
   catch (PDOException $e) {
      $error_message = $e->getMessage();
      echo "<p>SQL error: $error_message </p>";
   }
}

function search_books($term) {
   global $db;
   try {
      $query = "SELECT * FROM BOOK WHERE Title LIKE '%" . $term . "%' OR
                                         Author LIKE '%" . $term . "%' OR
                                         Category LIKE '%" . $term . "%' ORDER BY Title";
      $statement = $db->prepare($query);
      $statement->execute();
      return $statement;
   }
   catch (PDOException $e) {
      $error_message = $e->getMessage();
      echo "<p>SQL error: $error_message </p>";
   }
}

function get_book($isbn)  {
	global $db;
	$query = "SELECT * FROM BOOK WHERE ISBN='" . $isbn . "'";
	
	try {
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;	
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo "<p>SQL error: $error_message </p>";
	}
}
		
function save_new_book() {
 global $db;
 // print_r($_POST);
 $query = "INSERT INTO BOOK VALUES ('" . trim($_POST['isbn']) . "','" .
 trim($_POST['title']) . "','" . trim($_POST['author']) . "','" .
 trim($_POST['publisher']) . "','" . trim($_POST['format']) . "','" .
 trim($_POST['category']) . "','" . trim($_POST['description']) . "','" .
 trim($_POST['rating']) . "','" . trim($_POST['cover']) . "')" ;
 try {
 $statement = $db->prepare($query);
 $statement->execute(); // true if successful, otherwise false
 $statement->closeCursor();
 return TRUE;
 }
 catch (PDOException $e) {
 $error_message = $e->getMessage();
 echo "<p>SQL error: Insert Book failed, $error_message </p>";
 return FALSE;
 }
}		
		
		
?>
