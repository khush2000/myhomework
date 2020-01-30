<html DOCUMENT>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Authorisation form</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">        
</head>

<body style="background-color:green">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#" style="color: rgb(241, 90, 216); font-size:106%">ДОМАШНЯЯ<strong style="color: rgb(37, 233, 240);">РАБОТА</stroig></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></strong></a>
            <div class="collapse navbar-collapse" id="navcol-1">                
                <ul class="nav navbar-nav ml-auto">               
                    <li class="nav-item" role="presentation"><a class="nav-link" style="font-size: 12px">
                    <span style="color: rgb(134, 131, 134)">Привет &nbsp;</span>
                    <span style="color: rgb(110, 20, 0)"><?php
                        session_start();
                        if( $_SESSION['user'] == $login)
                        {
                           echo $_SESSION['user'];                                                      
                        }
                    ?></span>              
                    </a></li>                    
                    <li class="nav-item" role="presentation" onclick="openForm()"><a class="nav-link" style="cursor: pointer; font-size: 12px">Настройки</a></li> 
                    <li class="nav-item" role="presentation" onclick="exit()"><a class="nav-link" href="index.html" style="font-size: 12px">Выйти</a></li> 
                </ul>
            </div>            
        </div>
    </nav>

    <div class ="form-popup" id="edit" style=" position: absolute; left: 50%; top:50%; transform: translate(-50%, -50%); padding: 20px; background-color: white; display:none; width: 300px; border:1px solid #f1f1f1; z-index:999999">
        <form  class="form-container" action = "edit.php" method="post" name="edit">
            <div class="block-heading">
                <h5 class="text-info" style="text-align: center;">Изменить пароль?</h5><br>                   
            </div>      
            <div class="form-group"><label for="login">Логин</label><input name="login" class="form-control item" type="login" id="login" required></div>
            <div class="form-group"><label for="password">Старый пароль</label><input name="old_password" class="form-control item" type="password" id="pwd" required></div>
            <div class="form-group"><label for="password">Новый пароль</label><input name="new_password" class="form-control item" type="password" id="pwd" required></div>
            <div class="form-group"><label for="password">Подтвердите пароль</label><input name="password_check" class="form-control item" type="password" id="repiate-password" required></div>
            <button class="btn btn-primary btn-block" type="submit">Изменить</button>
            <button class="btn btn-primary btn-block" type="button" onclick="closeForm()">Закрыть</button>
        </form>
    </div>
    <main id="page-wrapper" class="page login-page">
        <section class="clean-block clean-form dark" style="background-color: rgba(246,246,246,0);">
            <div class="container">
                <div class="block-heading">
                    <h3 style="padding-top: 220px"><a style="line-height:normal; background-color: rgba(192, 227, 243); position: relative; outline:rgba(192, 227, 243) solid 0.2em">Вы успешно авторизировались!</a></h3>
                </div>                                     
            </div>                
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
    function openForm()
    {
        document.getElementById("edit").style.display="block";
    }
    function closeForm()
    {
        document.getElementById("edit").style.display="none";
    }
    function exit()
    {
        session_abort();        
    }
    </script>
</body>
</html>