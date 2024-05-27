<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php
         session_start();

         function cleanData($data){
            return htmlspecialchars(stripcslashes(trim($data)));
         }
          function getWishesForm($errorMessage = '') {
            echo"<h1> Meine Wünsche </h1>";
            if ($errorMessage){
                echo "<p>$errorMessage<p>";
            }
            echo" <form method='post' action= ''>
            <label for= wish1> 1.Wunsch </label>
            <input type='text' id='wish1' name='wish1'> <br>
            <label for= wish2> 2.Wunsch </label>
            <input type='text' id='wish2' name='wish2'> <br>
            <label for= wish3> 3.Wunsch </label>
            <input type='text' id='wish3' name='wish3'> <br>
            <input type='submit' name='cancelWishes' value='Cancel'>
            <input type='submit' name='submitWishes' value='Submit'>
            </form>
            ";
         }

         function displayWishes() { 
            echo" 
            <br>
            <p>1.Wunsch...... " . $_SESSION['wishes'][0] ." .....</p><br>
            <p>2.Wunsch...... " . $_SESSION['wishes'][1] ." .....</p><br>
            <p>3.WUnsch...... " . $_SESSION['wishes'][2] ." .....</p><br>
            <br>
            ";
            
         }
         function askAdress($errorMessage = '') {
            echo"<h1> Meine Lieferangaben </h1>";
            displayWishes();
            if ($errorMessage){
                echo "<p>$errorMessage<p>";
            }
            echo"
            <form method='post' action= ''>
            <label for= fullName> Vor- und Nachname: </label>
            <input type='text' id='fullName' name='fullName'> <br>
            <label for= secondAdressLine> PLZ und Ort:  </label>
            <input type='text' id='secondAdressLine' name='secondAdressLine'> <br>
            <label for= phoneNumber> Telefon: </label>
            <input type='text' id='phoneNumber' name='phoneNumber'> <br>
            <input type='submit' name='cancelAdress' value='Cancel'>
            <input type='submit' name='submitAdress' value='Submit'>
            </form>
            ";
            
         }

         function displayWishesAndAdress($errorMessage= '') {
            echo"<h1> Wunschübersicht </h1>";
            displayWishes();
            echo" 
            <br>
            <p>Vor- und Nachname: ....." . $_SESSION['Adress'][0] . ".....</p><br>
            <p>PLZ und Ort: ....." . $_SESSION['Adress'][1] . ".....</p><br>
            <p>Telefon: ....." . $_SESSION['Adress'][2] . ".....</p><br>
            ";
         }
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
                        askAdress();
                    }else{
                        getWishesForm();
                    }
                } 
            }elseif(isset($_POST['submitAdress'])){
                $fullName = cleanData($_POST['fullName']);
                $secondAdressLine = cleanData($_POST['secondAdressLine']);
                $phoneNumber = cleanData($_POST['phoneNumber']);
                  if(preg_match('/[^a-zA-Z0-9 ]/', $fullName) || preg_match('/[^a-zA-Z0-9 ]/', $secondAdressLine) || preg_match('/[^a-zA-Z0-9 ]/', $phoneNumber)) {
                    echo('You have unwanted characters');
                    if(!empty($fullName) || !empty($secondAdressLine) || !empty($phoneNumber)){
                        $_SESSION['Adress'] = [$fullName, $secondAdressLine, $phoneNumber];
                        displayWishesAndAdress();
                    }else{
                        askAdress();
                    }
                }
            }    
        }else{
            getWishesForm();
        }
          ?>
    </body>
</html>
