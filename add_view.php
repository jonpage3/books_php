<?php
include('header.php');
?>

<link rel="stylesheet" href="style.css"/>

<form method ="post">
<section id="controls">
<input class="button" type="submit" name="browse_books" value="Browse">
</section>
</form>

<form method="post">
<section id="controls">
 <input class="button" type="submit" name="save_new_book" value="Save Book">
</section>
<section id="input">
 <span class=book-attr>
 <label>ISBN</label><input type="text" name="isbn" size=20 required minlength="14">
 </span>
 <span class=book-attr>
 <label>Title</label><input type="text" name="title" size=50 required>
 </span>
 <span class=book-attr>
 <label>Author</label><input type="text" name="author" size=20 required minlength="3">
 </span>
 <span class=book-attr>
 <label>Publisher</label><input type="text" name="publisher" size=20 required minlength="5">
 </span>
 <span class=book-attr>
 <label>Format</label>
	<select name="format" required>
		<option value="Audio">Audio</option>
		<option value="Hardcover">Hardcover</option>
		<option value="Paperback">Paperback</option>
		<option value="eBook">eBook</option>
	</select>
 </span>
 <span class=book-attr>
 <label>Category</label>
	<select name="category" required>
		<option value="Biography">Biography</option>
		<option value="Children">Children</option>
		<option value="Fiction">Fiction</option>
		<option value="Historical Fiction">Historical Fiction</option>
		<option value="History">History</option>
		<option value="Literary Fiction">Literary Fiction</option>
		<option value="Literature">Literature</option>
		<option value="Novel">Novel</option>
		<option value="Poetry">Poetry</option>
	</select>	
 </span>
 <span class=book-attr>
 <label>Description</label><textarea rows="4" cols="40" name="description" minlength=20></textarea>
 </span>
 <span class=book-attr>
 <label>Rating</label>
	<select name="rating" required><?php
				for ($i=1; $i<=5; $i++)
				{
					?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
					<?php
				}
	?>
    </select>
 </span>
 <span class=book-attr>
 <label>Cover Image</label><input type="text" name="cover" size=20 required>
</section>
</form>


<?php
include('footer.php');
?>