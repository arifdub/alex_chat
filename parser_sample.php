<html>
    <head>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<p id="someElement"></p>
<p id="anotherElement"></p>

<script>
function sendToDatabase(){


  
  
  $.get( "https://api.xmltime.com/timeservice?accesskey=ceCO2TB3GX&expires=2016-04-07T12%3A16%3A24%2B00%3A00&signature=Aw%2F%2BcbEuuCcGhkkI3Op70Hq%2BLJo%3D&version=2&out=xml&placeid=norway%2Foslo", function( data ) {
  xml = new XMLSerializer().serializeToString(data.documentElement);
  xmlDoc = $.parseXML( xml ),
  $xml = $( xmlDoc ),
  $title = $xml.find( "time" );
    $( "#someElement" ).append( $title.text() );
  });


}
</script>
    </head>

    
    <button onclick="sendToDatabase()">Query Service</button>


</html>