<?php 
$looking = isset($_GET['title']) || isset($_GET['author']);
?>
<?php require_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bookstore</title>
    </head>
    <body>
        <p><?php echo loginMessage(); ?></p>   <!-- Call to function in functions.php -->
            <?php
                // Obtaining JSON array from 'books.json'
                $booksJson = file_get_contents(__DIR__.'/Books/books.json'); //using DIR as test.
                $books = json_decode($booksJson, true);
                
                // retrieves title of book in URL after it's been clicked on
                if (isset($_GET['title'])) 
                {
                    echo '<p>Looking for <b>' . $_GET['title'] . '</b></p>';
                    if (bookingBook($books, $_GET['title']))
                    {
                        echo 'Success, booked!';
                        updateBooks($books);
                    }
                    else {
                        echo 'The book is not available...';
                    }
                } else {
                    echo '<p>Are you looking for a book?</p>';
                }
            ?>
            <ul>
                <?php foreach ($books as $book): ?>   
                    <li>
                        <!-- Loop through books display as links, if clicked on puts title in URL for booking -->
                        <a href="?title=<?php echo $book['title']; ?>">                                 
                        <?php echo printableTitle($book); ?> 
                    </li>
                        <?php endforeach; ?>
            </ul>
    </body>
</html>