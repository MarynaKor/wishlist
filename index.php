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
            <input type='text' id='wish1' name='wish1'> <br>
            <label for= wish2> Wish Two</label>
            <input type='text' id='wish2' name='wish2'> <br>
            <label for= wish3> Wish Three</label>
            <input type='text' id='wish3' name='wish3'> <br>
            <input type='submit' name='cancelWishes' value='Cancel'>
            <input type='submit' name='submitWishes' value='Submit'>
            </form>
            ";
         }

         function displayWishes($first_wish = '',$second_wish = '',$third_wish = '') {
            echo" <form method='post' function= ''>
            <h2>Meine Lieferangaben </h2> <br>
            <p>1.Wish: " . $first_wish . " ihr Wunsch der ersten Seite </p><br>
            <p>2.Wish: " . $second_wish . " ihr Wunsch der ersten Seite </p><br>
            <p>3.Wish: " . $third_wish . " ihr Wunsch der ersten Seite </p><br>
            <p> </p>
            <form method='post' function= ''>
            <label for= fullName> Vor- und Nachname: </label>
            <input type='text' id='fullName name='fullName'> <br>
            <label for= secondAdressLine> PLZ und Ort: </label>
            <input type='text' id='secondAdressLine name='secondAdressLine'> <br>
            <label for= phoneNumber> Telefon :</label>
            <input type='text' id='honeNumber' name='honeNumber'> <br>
            <input type='submit' name='cancelWishes' value='Cancel'>
            <input type='submit' name='submitWishes' value='Submit'>
            </form>
            ";
         }
        //  getWishesForm();
        displayWishes('Gift', 'Cat', 'Picture');
          ?>
    </body>
</html>
