<?php
  session_start();
  if(!isset($_SESSION['userid'])) {
    header("Location: login.php");  
    die();
  }

  //Abfrage der Nutzer ID vom Login
  $userid = $_SESSION['userid'];

  function logout(){
    session_destroy();
  }
  if(isset($_GET['logout'])){
    logout();
    header("Location: index.html");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0 shrink-to-fit=no">
  <meta name="description" content="Guestbook for posts of any kind">
  <meta name="author" content="Max Thurner">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <link rel="icon" type="image/png" href="css/book-stack.png" sizes="512x512">
  <title>THE GUESTBOOK</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles -->
  <link href="css/customCSS.css" rel="stylesheet">
  
  <!-- Vue.js -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    // --- Constants ---
    //Constants for Developing State --> replace when deploy!
    const URLselectEntries = "/index/Guestbook/selectEntries.php";
    const URLlike = "like.php";
    const URLdelete = "delete.php";
  </script>
</head>

<body id="page-top" class="mainbody">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-family: BerlinCustom;">Admin Console</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="admin.php?logout=true" style="color: red;">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary">
    <div class="container text-center">
      <h1 style="color: black; font-family: BerlinCustom; font-size: 50px;">Welcome to the mini Backend</h1>
      <p class="lead" style="font-size: 25px;">"Delete, or don't delete - that is the question"</p>
      <p>Info: It is intended to display the message in this form (with tags) --> 1:1 SQL storage form</p>
    </div>
  </header>

  <section id="nav1">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="headlineLine"></div>
          <h2 class="headlineText" style="color: black">Entities</h2>
          
          <div id="Itemlist">
            <table class="table">
                <td>Entry ID</td>
                <td>User</td>
                <td>Message</td>
                <tr v-for="(item, index) in items">
                    <td>{{item.id}}</td>
                    <td>{{item.username}}
                        <div>{{item.timestamp}}</div>
                    </td>
                    <td>{{item.message}}</td>
                    <td>
                        <div id="likeBtn" onclick="deleteItem(this)" style='font-size: larger;'>
                            <img src="css/trashICO.png" style="width: 25px; height: 30px;"></img>
                            <p style="color: transparent;">{{item.id}}</p>
                        </div>
                    </td>
                </tr>
            </table>
          </div>

          <br><br><br>
        </div>
      </div>
    </div>

  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Thurner</p>
      
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

<script>
  //Grab ID and pass Data to delete.php   
  function deleteItem(domObject){
    var id = domObject.innerHTML.slice(95); //same ugly string manipulation
    var x = id.length - 4;  //it gets uglier 
    id = id.slice(0,x);     //finally over
    
    $.ajax({
      type: "POST",
      url: URLdelete,
      data: {id: id},
      success: function(success){
          console.log("says it works");
          console.log(success);
          location.reload();
      },
      error: function(error){
          console.log(error);
      }
    })
  }
    
  //Collect Data from selectEntries and provide it
  var ItemsVue = new Vue({
      el: '#Itemlist',
      data: {
          items: []
      },
      mounted: function () {
          var self = this;
          $.ajax({
              url: URLselectEntries,
              method: 'GET',
              success: function (data) {
                  self.items = data;
              },
              error: function (error) {
                  console.log(error);
              }
          });
      }
  });

</script>

</html>