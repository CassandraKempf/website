/**
 *  $( "#mehrErfahren" ).click(function() { alert("Mehr erfahren...
 * angeklickt."); });
 * 
 */



// dropdown

$(document).ready(function() {
	$(".nav li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
		};
	})
	
	$(".toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(".nav").toggle();
	});
	adjustMenu();
})

$(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww <= 736) {
		$(".toggleMenu").css("display", "inline-block");
		if (!$(".toggleMenu").hasClass("active")) {
			$(".nav").hide();
		} else {
			$(".nav").show();
		}
		$(".nav li").unbind('mouseenter mouseleave');
		$(".nav li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww > 736) {
		$(".toggleMenu").css("display", "none");
		$(".nav").show();
		$(".nav li").removeClass("hover");
		$(".nav li a").unbind('click');
		$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when
			// hover over submenu
		 	$(this).toggleClass('hover');
		});
	}
}


/*
 * When the user clicks on the button, toggle between hiding and showing the
 * dropdown content
 */
/*
 * function myFunction() {
 * document.getElementById("myDropdown").classList.toggle("show"); }
 *  // Close the dropdown if the user clicks outside of it window.onclick =
 * function(e) { if (!e.target.matches('.dropbtn')) { var myDropdown =
 * document.getElementById("myDropdown"); if
 * (myDropdown.classList.contains('show')) {
 * myDropdown.classList.remove('show'); } } }
 */


// Carousel

$(document).ready(function(){
    $('.carousel').carousel();
  });



































/* E-Mail Kontaktformular */

<?php
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
		          
		          
		          
		      
		      </script>

