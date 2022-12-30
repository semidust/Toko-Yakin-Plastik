<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="uts.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
   
  <script src="uts.js"></script>
</head>
<body>
  <form class="login-form" action="aksi_login.php" method="POST">
  <div class="shadow-lg p-3 mb-5 bg-body rounded">
  <center>
  <h1>ADMIN LOGIN</h1><br><br>
  </center>
      <div class="form-group">
        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username">
      </div>
      <br>

      <div class="form-group">
        <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
      </div>
    

      <center><br>
        <button type="submit" class="btn btn-primary">Login</button>
      </center>
      </div>
  </form>

  <style>
    *{
      padding: 0;
      margin: 0;
      font-family: "Poppins", sans-serif;
    }
    body{
      background-image: url("https://api.brut.works/images/director/_projects_tablet/unilever_US_opening1_02_270121_Artboard-4.png");
      background-size:1920px 1080px;
      background-repeat: repeat;
    }
    .login-form{
      background:white;
      width: 350px;
      top:50%;
      left: 50%;
      transform: translate(-50%,-50%);
      position: absolute;
      margin-top: 20px;
      border-radius: 15px;
    }
    .login-form h1{
      color:white;
  text-align: center;
  font-weight: bold;
  font-size: 1rem;
  line-height: 3.3rem;
  background: #3647ce;
  padding: 9px;
  border-radius: 10px;
  
    }
    .login-form .form-group label{
      font-size: 15px;
      color: black;
    }
    .login-form button{
      font-size: 15px;
      font-weight: bold;
      margin: 5px 0;
      padding:10px 15px;
      color:whitesmoke;
      background: blue;

   
    }
    .login-form button:hover{
      font-weight: bold;
      padding:10px 15px;
      color:black;
      background: white;
    }
  </style>
</body>
</html>