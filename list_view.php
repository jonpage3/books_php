<?php
include('header.php');
?>
        <section id="controls">
            <form  method="post">
                <input class="button" type="submit" id="browse" name="browse_books" value="Browse">
                <input class="search" type="text"   name="search_term" size=10 value="<?php if (isset($_POST['search_books'])) echo $search_term ?>">
			        	<input class="button" type="submit" name="search_books" value="&#128269;">
				&nbsp;
				&nbsp;
				<input class="button" type="submit" name="add_book" value="Add Book">
            </form>
        </section>
<?php
   echo "<table>
         <thead>
         <tr>
         <th>Title</th>
         <th>Author</th>
         <th>Category</th>
         </tr>
         </thead>
		 <tbody>";
   while($result = $statement->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>";
      echo "<td>" . '<a href="index.php?ISBN=' . $result['ISBN'] .'">' . $result['Title'] . '</a>' . "</td>";
      echo "<td>" . $result['Author'] .   "</td>";
      echo "<td>" . $result['Category'] . "</td>";
      echo "</tr>";
   }
   echo "</tbody></table>";
   $statement->closeCursor();

include('footer.php');
?>
