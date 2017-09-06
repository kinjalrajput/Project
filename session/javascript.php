<html>
   <head>
   
      <script type="text/javascript">
         function sayHello()
         {
			 var retVal = prompt("Enter your name : ", "your name here");
          document.write("script is here.." +retVal);
         }
      </script>
      
   </head>
   <body>
      
      <form>
         <input type="button" onclick="sayHello()" value="Say Hello">
      </form>
      </body>
</html>