<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <meta name="author" content="PT ADHI KARYA (Persero) Tbk"/>
  <title>Adhi Karya | @yield('title')</title>
  <!-- Favicon -->

  <link rel="icon" href="http://ahsanaproperty.com/wp-content/uploads/2018/04/cropped-favicon-32x32.png" sizes="32x32" />

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
@yield('custom-header')

@yield('content')

<style type="text/css">

html,body{
  background-image: url('./assets/theme/img/bg_login_ahsana.jpeg');
  background-size: cover;
  background-repeat: no-repeat;
  height: 100%;
  font-family: 'Roboto', sans-serif;
}

.container{
  height: 100%;
  align-content: center;
}

.card{
  height: 490px;
  margin-top: auto;
  margin-bottom: auto;
  width: 400px;
  background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
  font-size: 60px;
  margin-left: 10px;
  color: #89D237;
}

.social_icon span:hover{
  color: white;
  cursor: pointer;
}

.card-header h3{
  color: white;
}

.social_icon{
  position: absolute;
  right: 20px;
  top: -45px;
}

.input-group-prepend span{
  width: 50px;
  background-color: #F00;
  color: black;
  border:0 !important;
}

input:focus{
  outline: 0 0 0 0  !important;
  box-shadow: 0 0 0 0 !important;

}

.remember{
  color: white;
}

.remember input
{
  width: 20px;
  height: 20px;
  margin-left: 15px;
  margin-right: 5px;
}

.login_btn{
  color: black;
  background-color: #F00;
  width: 100px;
}

.login_btn:hover{
  color: black;
  background-color: #BB0909;
}

.links{
  color: white;
}

.links a{
  margin-left: 4px;
}
</style>
</body>
</html>
