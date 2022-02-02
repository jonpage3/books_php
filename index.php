<?php
require_once('database_library.php');
$db = null;

connect_to_database();

// Initial display of the index.php page
if ( empty($_POST) && empty($_GET) ) {
   $statement = get_list_of_all_books();
   include('list_view.php');
}
// User has selected the Browse button
elseif (isset($_POST['browse_books'])) {
    // Sets the Location HTTP header to the index page.
    // This will clear any $_POST or $_GET array contents.
	header('Location: index.php');

}
// User has selected the Search button
elseif (isset($_POST['search_books'])) {
   $search_term = trim($_POST['search_term']);
   $statement = search_books($search_term);
   include('list_view.php');
}
// User has clicked title link for detailed view
elseif (isset($_GET['ISBN'])) {
 $isbn = $_GET['ISBN'];
 $result = get_book($isbn);
 include('detail_view.php');
}

// User has clicked link to add new book.
elseif (isset($_POST['add_book'])) {
	include('add_view.php');
}

// Saves new book created.
elseif (isset($_POST['save_new_book'])) {
	$successful_save = save_new_book();
	if ($successful_save) {
		$isbn = $_POST['isbn'];
		$result = get_book($isbn);
		include('detail_view.php');
	}
}

?>
