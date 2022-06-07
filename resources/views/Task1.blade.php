<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- <link rel="stylesheet" type="text/css" href="css/jquery-tokens/tokens.css"> -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        
    </head>
    <body>

        <div class="container">
            <h1>jquery tokens</h1>
        </div>
        <form class="form">
            <div class="container">
                <div class="row">
                    <div class='col-sm-4 form-group'>
                        <label for="name">Type the text</label>
                        <input id="demo-tokens" class="form-control" type="text" required>
                    </div>
                </div>
            </div>
        </form>        

       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tokeninput/1.6.0/jquery.tokeninput.min.js" integrity="sha512-JzX4UtMH7pknjlPVL/V0i17peCHUbWrDWqSEX+wHVCoUv+QYP3AwNDINh2xLYXZPNJ8Jfrv8/OWzkz+iFw9azQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- <script src="js/jquery-tokens/tokens.js"></script> -->
        <script type="text/javascript">
         
            $(function(){
                $('#demo-tokens').tokenInput({
                    source : [
                        'United States', 'United Kingdom', 'Canada', 'Mexico',
                        'Germany', 'France', 'Russia', 'Spain',
                        'Turkey', 'India', 'Pakistan', 'Bangladesh',
                        'Sri Lanka', 'Nepal', 'Brazil', 'Oman', 'United Arab Emirates',
                        'Saudi Arabia'
                    ],
                    minChars:'2',
                    initValue : [ 'United States' ]
                });
            });
        </script>
    </body>
</html>