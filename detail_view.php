<?php
include('header.php');
?>
<link rel="stylesheet" href="style.css"/>

<form method="post">
 <section id="controls">
 <input class="button" type="submit" name="browse_books" value="Browse" />
 </section>
 <section>
 
<?php 
if (file_exists("images/" . $result['Cover'] )) {
	echo  "<img style='float: left; margin: 0px 35px 15px 15px;' src='images/" . $result['Cover'] . " '>";
} else {
	echo "<img style='float: left; margin: 0px 35px 15px 15px;' src='images/placeholder.png'>";
}
?>
 
 <span class=book-attr>
 <label>ISBN</label><?php echo $result['ISBN'] ?>
 </span>
 <span class=book-attr>
 <label>Title</label><?php echo $result['Title'] ?>
 </span>
 <span class=book-attr>
 <label>Author</label><?php echo $result['Author'] ?>
 </span>
 <span class=book-attr>
 <label>Publisher</label><?php echo $result['Publisher'] ?>
 </span>
 <span class=book-attr>
 <label>Format</label><?php echo $result['Format'] ?>
 </span>
 <span class=book-attr>
 <label>Category</label><?php echo $result['Category'] ?>
 </span>
 <span class=book-attr>
 <label>Description</label><?php echo $result['Description'] ?>
 </span>
 <span class=book-attr>
 <label>Rating</label><?php echo $result['Rating'] ?>
 </span>
 </section>
</form>

<?php
include('footer.php');
?>