<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <title>SSL FINAL</title>
        
    </head>
    <body class = 'bg-info'>
                <h2>Customer Check Out</h2>
                
                <form enctype="text/plain">
                <div class="form-group">
                    <label for="firstName"><strong>First Name</strong></label>
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                </div>
                
                <div class="form-group">
                    <label for="lastName"><strong>Last Name</strong></label>
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                </div>
                
                <label for="form-group"><strong>Gender</strong> </label><br />
                <select class="custom-select" id="gender" name="gender">
                    <option value="F">Female</option>
                    <option value='M' >Male</option>
                </select>
                <br /><br />
                
                <div class="form-group">
                    <label for="email"><strong>Email</strong></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                
                <input type="button" name ="checkout" value="checkout" id="checkout" class="btn btn-outline-danger">
                </form><br />
                
        <script src="js/js.js"></script>
    </body>
</html>