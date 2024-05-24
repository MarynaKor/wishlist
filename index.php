<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php
         session_start();
         function cleanDate($data){
            return htmlspecialchars(stripcslashes(trim($data)));
         }
          function getWishesForm($errorMessage = '') {
            echo"<h1> My Wishlist </h1>";
            if ($errorMessage){
                echo "<p>$errorMessag<p";
            }
            echo" <form method='post' action= ''>
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

         function displayWishes($errorMessage= '') {
            if ($errorMessage){
                echo "<p>$errorMessag<p";
            }
            echo" 
            <h2>Meine Lieferangaben </h2> <br>
            <p>1.Wish:  ihr Wunsch der ersten Seite </p><br>
            <p>2.Wish:  ihr Wunsch der ersten Seite </p><br>
            <p>3.Wish: ihr Wunsch der ersten Seite </p><br>
            <p> </p>
            <form method='post' action= ''>
            <label for= fullName> Vor- und Nachname: </label>
            <input type='text' id='fullName name='fullName'> <br>
            <label for= secondAdressLine> PLZ und Ort: </label>
            <input type='text' id='secondAdressLine name='secondAdressLine'> <br>
            <label for= phoneNumber> Telefon :</label>
            <input type='text' id='phoneNumber' name='phoneNumber'> <br>
            <input type='submit' name='cancelAdress' value='Cancel'>
            <input type='submit' name='submitAdress' value='Submit'>
            </form>
            ";
         }
        // displayWishes('Gift', 'Cat', 'Picture');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['submitWishes'])){
                $wish1 = cleanData($_POST['wish1']);
                $wish2 = cleanData($_POST['wish2']);
                $wish3 = cleanData($_POST['wish3']);
             
            if(preg_match('/[^a-zA-Z0-9 ]/', $wish1) || preg_match('/[^a-zA-Z0-9 ]/', $wish2) || preg_match('/[^a-zA-Z0-9 ]/', $wish3)) {
                echo('You have unwanted characters');
            }else{
                if(!empty($wish1) || !empty($wish2) || !empty($wish3)){
                    $_SESSION['wishes'] = [$wish1, $wish2, $wish3];
                    print_r($_SESSION['wishes']);
                    displayWishes();
                }
            } 
            }    
        }else{
            getWishesForm();
        }
          ?>
    </body>
</html>
