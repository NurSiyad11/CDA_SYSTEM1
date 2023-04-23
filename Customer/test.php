<!DOCTYPE html>
<html>
    <head>
        <title>JavaScript: Show And Hide Input Password Text</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
            #pass{padding: 10px;}
        </style>
        
        <script>

            function showPass()
            {
                var pass = document.getElementById('pass');
                if(document.getElementById('check').checked)
                {
                    pass.setAttribute('type','text');
                }else{
                    pass.setAttribute('type','password');
                }
            }

        </script>
        
        
    </head>
    <body>
        <input type="password" id="pass"/>
        <input type="checkbox" id="check" onclick="showPass();"/>Show Password
    </body>
</html>