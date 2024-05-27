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
                echo "<p tyle='color: red '>$errorMessage<p>";
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
            <p>3.Wunsch...... " . $_SESSION['wishes'][2] ." .....</p><br>
            <br>
            ";
            
         }
         function askAdress($errorMessage = '', $possition = 0) {
            echo"<h1> Meine Lieferangaben </h1>";
            displayWishes();
            if ($possition == 0){
                echo "<p style='color: red'>$errorMessage<p>"; 
                } 
            echo" 
            <form method='post' action= ''> 
            <label for= fullName> Vor- und Nachname: </label> 
            <input type='text' id='fullName' name='fullName'> <br> ";
            if ($possition == 1){
                echo "<p style='color: red'>$errorMessage<p>"; 
                }  
            echo"
            <label for= secondAdressLine> PLZ und Ort: </label>
            <input type='text' id='secondAdressLine' name='secondAdressLine'>
            <br>";
            if ($possition == 2){
                echo "<p style='color: red'>$errorMessage<p>"; 
                }  
            echo"
            <label for= phoneNumber> Telefon: </label> 
            <input type='text' id='phoneNumber' name='phoneNumber'> <br>";
            if ($possition == 3){
                echo "<p style='color: red'>$errorMessage<p>"; 
                }  
            echo"
            <input type='submit' name='cancelAdress' value='Cancel'> 
            <input type='submit' name='submitAdress' value='Submit'> </form> ";
            
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
             
                if(preg_match('/[^a-zA-Züöä ]/', $wish1) || preg_match('/[^a-zA-Züöä ]/', $wish2) || preg_match('/[^a-zA-Züöä ]/', $wish3)) {
                    $errorMessage= 'Bitte benutze nur Buchstaben';
                    getWishesForm($errorMessage);
                    }else{
                    if(!empty($wish1) || !empty($wish2) || !empty($wish3)){
                        $_SESSION['wishes'] = [$wish1, $wish2, $wish3];
                        askAdress();
                    }else{
                        $errorMessage = 'Bitte gebe wenigstens einen Wunsch an!';
                        getWishesForm($errorMessage);
                    }
                } 
            }else if(isset($_POST['submitAdress'])){ 
                $fullName = cleanData($_POST['fullName']); 
                $secondAdressLine = cleanData($_POST['secondAdressLine']); 
                $phoneNumber = cleanData($_POST['phoneNumber']); 
                if(empty($fullName) || empty($secondAdressLine) || empty($phoneNumber)){
                    $errorMessage = "Bitte fülle alle Felder";
                    askAdress($errorMessage, 0);
                }else{ 
                    if (preg_match('/[^a-zA-Züäö ]/', $fullName)){
                        $errorMessage = 'Gib einen validen Namen ein ohn Sonderzeichen'; 
                        askAdress($errorMessage, 1); 
                    }elseif(!preg_match('/^\d{5}\s[a-zA-Züöä\s]+$/', $secondAdressLine) ){
                        $errorMessage = 'Bitte gebe einen vollständigen PLZ und Ort ein';
                        askAdress($errorMessage, 2); 
                    }elseif(preg_match('/[^0-9+ ]/', $phoneNumber)){
                        $errorMessage = 'Bitte gebe ein gültige Nummer ein!';
                        askAdress($errorMessage, 3);
                    }else{ 
                        $_SESSION['Adress'] = [$fullName, $secondAdressLine, $phoneNumber];
                        displayWishesAndAdress(); 
                    }
                }  
                }  
            }else{
                getWishesForm(); 
            }
        ?>
    </body>
</html>
