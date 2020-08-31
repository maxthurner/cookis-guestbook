<?php 
// Login data:
//      username: admin
//      password: CookisRocks
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'admin', 'EUDqKAf20uqOr4Sc');
    
    if(isset($_GET['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $statement = $pdo->prepare("SELECT * FROM user WHERE username = :username");
        $result = $statement->execute(array('username' => $username));
        //echo "<br>";
        //echo $result;
        $user = $statement->fetch();
            
        //check password
        if ($user !== false && password_verify($password, $user['password'])) {
            $_SESSION['userid'] = $user['id'];
            header("Location: admin.php");
            die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
        } else {
            $errorMessage = "Username or Password wrong<br>";
        }
    }
?>
<!DOCTYPE html> 
<html> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0 shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
        <link rel="icon" type="image/png" href="css/book-stack.png" sizes="512x512">

        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles -->
        <link href="css/customCSS.css" rel="stylesheet">

    </head> 
    <body>
        <?php 
            if(isset($errorMessage)) {
                echo $errorMessage;
            }
        ?>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.html" style="font-family: BerlinCustom;">GUESTBOOK</a>
            </div>
        </nav>

        <header class="bg-primary">
            <div class="container text-center">
            <h1 style="color: black; font-family: BerlinCustom; font-size: 50px;">LOGIN</h1>
            </div>
        </header>

        <section id="nav1" style="padding-top: 30px;">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                <div class="headlineLine"></div>

                <div class="LoginInputField">
                    <form action="?login=1" method="post" class="LoginForm">
                    <div >
                        <div class="inputDescription">Username</div>
                        <input class="usernameInput" type="text" name="username"></input>
                    </div>
                    <div>
                        <div class="inputDescription">Password</div>
                        <input class="userEmailInput" type="password" name="password"></input>
                    </div>

                        <button id="sendBtn" alt="Submit" class="sendBtn" style="margin-top: 10px;">Login</button>
                        
                        <input type="button" onclick="location.href='index.html';" value="Cancel" class="cancelBtn"/>
                    </form>  
                </div>
            </div>
        </section>
    </body>
</html>