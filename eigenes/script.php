<?php


/* E-Mail Kontaktformular */


$error = "";
$successMessage = "";

if ($_POST) {
    
    // wurde Email addresse eingegeben?
    if (! $_POST["email"]) {
        
        $error .= "Eine Emailadresse wird benötigt.<br>";
    }
    
    // wurde betreff eingegeben?
    if (! $_POST["titel"]) {
        
        $error .= "Ein Titel wird benötigt.<br>";
    }
    
    // wurde inhalt eingegeben?
    if (! $_POST["content"]) {
        
        $error .= "Inhalt wird benötigt.<br>";
    }
    
    // ist email addresse gültig?
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        $error .= "Die Emailadresse ist ungültig.<br>";
    }
    
    // wenn nicht, dann fehlermeldung
    if ($error != "") {
        
        $error = '<div class="alert alert-danger" role="alert"><p><b>Es gab fehler in deinem Formular:</b></p>' . $error . '</div>';
        
        // ansonsten
    } else {
        
        $emailTo = "me@mydomain.com";
        
        $subject = $_POST['titel'];
        
        $content = $_POST['content'];
        
        $headers = "From: " . $_POST['email'];
        
        // wenn alls gültig ist, dann
        if (mail($emailTo, $subject, $content, $headers)) {
            
            $successMessage = '<div class="alert alert-success" role="alert"><p><b>Alles hat geklappt. Wir antworten dir so schnell wir können</b></p></div>';
            
            // wenn nicht, dann
        } else {
            
            $error = '<div class="alert alert-danger" role="alert"><p><b>Das Formular konnte nicht übertragen werden. Bitte versuche es noch einmal.</b></p></div>';
        }
    }
} else {}

?>



		<div id="error"> 
		
		<?php

echo $error;
echo $successMessage;

?>
		
		


			</div>
			<script type="text/javascript">


				<!-- Subit-Funktion--> 
		      
		         $("form").submit(function( event ) {
		              
		              event.preventDefault();
		              
		              var error = "";

		              <!-- Wenn keine Email angegeben wird, dann.. -->
		              
		              if($("#email").val() == ""){
		                  
		                  error += "<p>Die Email ist leer. Bitte trage sie ein.</p>";
		                 
		              }

		              <!-- Wenn kein Betreff angegeben wird, dann..--> 
		              if($("#titel").val() == ""){
		                  
		                  error += "<p>Der Titel ist leer. Bitte trage ihn ein.</p>";


		              <!-- Wenn Textfeld leer ist, dann..-->    
		              }if($("#content").val() == "" ){
		                  
		                  error += "<p>Das Inhaltfeld ist leer, bitte trage etwas ein. </p>";
		                  
		              }
		              <!-- Wenn Fehlermeldung, dann..--> 
		              if(error != ""){
		                  
		                  $("#error").html('<div class="alert alert-danger" role="alert"><p><b>Es gab fehler in deinem Formular:</b></p>' + error + '</div>');
		                  

		              <!-- Wenn alles klappt, dann..-->   
		              }else{
		                  
		                  $("form").unbind('submit').submit();
		                  
		              }
		              
		              
		            });
		          
		          
		          
		      