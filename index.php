<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php
         session_start();
         function getWishesForm($errorMessage = '') {
            echo"<h1> My Wishlist </h1>";
            if ($errorMessage){
                echo "<p>$errorMessag<p";
            }
            echo" <form method='post' function= ''>
            <label for= wish1> Wish One</label>
            <input type='text' id='wish1 name='wish1'> <br>
            <label for= wish2> Wish Two</label>
            <input type='text' id='wish2 name='wish2'> <br>
            <label for= wish3> Wish Three</label>
            <input type='text' id='wish3 name='wish3'> <br>
            <input type='submit' name='cancelWishes' value='Cancel'>
            <input type='submit' name='submitWishes' value='Submit'>
            </form>
            ";
         }
         getWishesForm();
          ?>
    </body>
</html>
