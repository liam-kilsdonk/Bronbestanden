<?php
     include_once("functions.php");
     
     echo '
<!DOCTYPE html>
<html lang="nl">
<style>
    /* Styles for the popup */
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        border: 1px solid #000000;
        padding: 20px;
        z-index: 1000;
    }

    /* Styles for overlay */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
</style>
     <head>
          <title>Ultima Casa account aanvragen</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="ucstyle.css?' . mt_rand() . '">
     </head>
     <body>

     <div id="overlay" class="overlay"></div>

     <!-- Popup content -->
     <div id="popup" class="popup">
         <h2>Toestemming Aanvraag</h2>
         <p>We hebben uw toestemming nodig om uw privégegevens op te slaan. Stemt u ermee in?</p>
         <button id="allowButton">Toestaan</button>
         <button id="denyButton">Afwijzen</button>
     </div>
     

          <div class="container">
               <div class="col-sm-4 col-md-6 col-lg-4 col-sm-offset-4 col-md-offset-3 col-lg-offset-4">                                     
                    <h4 class="text-center">Ultima Casa account aanvragen</h4>
                    <table>
                         <tr>
                              <th>&nbsp;</th>
                              <th class="text-center">Account</th>
                              <th>&nbsp;</th>
                         </tr>
                         <tr>
                              <td>&nbsp;</td>
                              <td>               
                                   <form action="maakaccount-save.php" method="GET">
                                        <div class="form-group">
                                             <label for="Naam">Naam:</label>
                                             <input type="text" class="form-control" id="Naam" name="Naam" placeholder="Naam" required>
                                        </div>
                                        <div class="form-group">
                                             <label for="Email">E-mailadres:</label>
                                             <input type="email" class="form-control" id="Email" name="Email" placeholder="E-mailadres" required
                                             pattern="' . $emailpattern . '">
                                        </div>
                                        <div class="form-group">
                                             <label for="Wachtwoord">Wachtwoord:</label>
                                             <input type="password" class="form-control" id="Wachtwoord" name="Wachtwoord" placeholder="Wachtwoord" required>
                                        </div>
                                        <div class="form-group">
                                             <label for="Telefoon">Mobiel telefoonnummer:</label>
                                             <input type="tel" class="form-control" id="Telefoon" name="Telefoon" 
                                                    placeholder="Telefoonnummer" 
                                                    pattern="' . $telefoonpattern . '" required>
                                        </div>
                                        <div class="form-group"><br><br>
                                             <button type="submit" class="action-button" title="Uw account aanmaken">Maak account</button>
                                             <button class="action-button"><a href="index.php" >Annuleren</a></button>
                                        </div>
                                   </form>
                              </td>
                              <td>&nbsp;</td>
                         </tr>
                    </table>
               </div>
          </div>

          <script>
        // Function to display the popup
        function displayPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }
    
        // Function to hide the popup
        function hidePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    
        // Event listener for Allow button
        document.getElementById("allowButton").addEventListener("click", function() {
            // Here you can implement the logic to save private information
            // For example, send an AJAX request to the server
            // After saving the information, hide the popup
            hidePopup();
        });
    
        // Event listener for Deny button
        document.getElementById("denyButton").addEventListener("click", function() {
            // Handle the case when the user denies permission
            // For example, navigate back to the previous page
            window.history.back();
        });
    
        // Call displayPopup() function when the page loads (for demonstration purposes)
        displayPopup();
    </script>

     </body>
</html>';

?>