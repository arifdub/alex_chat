
<head>  <meta charset="utf-8">  
<title>IWACA - Alex Doyle - 2015713</title>  

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  
		
</head>		
 
 <!-- API below from timeanddate.com expires after 24 hours. A new unexpired key is required to make it valid -->		
		
<script>
	function sendToDatabase(){

		$.get("https://api.xmltime.com/timeservice?accesskey=6jufFqFitK&expires=2016-05-22T21%3A46%3A27%2B00%3A00&signature=rQAEL0FS9IVcNarGyeg1dDDx98A%3D&version=2&placeid=norway%2Foslo&geo=0&sun=0&timechanges=0&tz=0&verbosetime=0")
}
</script>


<div id="answer"> 

</div>

<script>

var currentId = 0;

function checkForAnswer(){

$.post( "ajax.php", { type: "checkstatus", id:currentId }) 
.done(function( data ) { 

if(data == '0'){
// alert('no answer yet')
} else {
gotAnswer();
} 
});
}
function gotAnswer(){

$.post( "ajax.php", { type: "gotAnswer", id:currentId }) 
.done(function(data) { 

$("#answer").html(data);
$("#sampledialog").dialog("close");

});


}

function askQuestion(){

var var1 = document.getElementById('app_name').value;
var var2 = document.getElementById('app_ques').value; 


$.post( "ajax.php", { type: "submitquestion", app_name: var1, app_ques: var2 }) 
.done(function( data ) { 

currentId = data;
// pop up a box to the user
$( "#sampledialog" ).dialog();
$( "#hiddendiv" ).show();
});


// start the timer to check for an answer
setInterval(function(){ checkForAnswer(); }, 3000);

}
</script>


   
	<h1>Chat App - IWACA - Alex Doyle - 2015713</h1>
	
    Name: <input type="text" name="app_name" id="app_name"></input><br>   


    Question: <input type="text" name="app_ques" id="app_ques"> </input><br>
    
    <button onclick="askQuestion();">Ask Question</button> 
	<button onclick="sendToDatabase()">Get Local time in Norway!</button>
    
    
    
<div id="sampledialog" title="Your status">
  <p>Thank you for asking a question, please wait for an answer!</p>
</div>

<div id="hiddendiv">
This is an example of a hidden div!, Nobody knows it is here until we tell it to show()

</div>    
    
<script>
      $( "#sampledialog" ).hide();
      
       $( "#hiddendiv" ).hide();
  </script>
    


    
