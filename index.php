<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0 shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
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
</head>


<body id="page-top" class="testclass">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-family: BerlinCustom;">GUESTBOOK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#nav1">Nav1</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary">
    <div class="container text-center">
      <h1 style="color: black; font-family: BerlinCustom; font-size: 50px;">THE GUESTBOOK</h1>
      <p class="lead" style="font-size: 25px;">Write something worth reading</p>
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
                <tr>
                    <th>Item</th>
                    <th>Year</th>
                </tr>
                <tr v-for="item in items">
                    <td>{{item.id}}</td>
                    <td>{{item.username}}</td>
                </tr>
            </table>
          </div>

          <br><br><br>

          <ul id="example-1">
            <li v-for="item in items" :key="item.message">
              {{ item.message }}
            </li>
          </ul>
          <script>
            var ItemsVue = new Vue({
                el: '#Itemlist',
                data: {
                    items: []
                },
                mounted: function () {
                    var self = this;
                    $.ajax({
                        url: '/selectEntries.php',
                        method: 'GET',
                        success: function (data) {
                            self.items = JSON.parse(data);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });


            // function reqListener (){
            //   console.log(this.responseText);
            // }

            // var oReq = new XMLHttpRequest();
            // oReq.onload = function() {
            //     // This is where you handle what to do with the response.
            //     // The actual data is found on this.responseText
            //     var jsonArray = $.parseJSON(this.responseText);
            //     console.log(typeof $jsonArray);
            //     console.log(jsonArray[0].username);
            //     console.log(typeof this.responseText);
            //     console.log(this.responseText);
            // };
            // oReq.open("GET", "selectEntries.php", true);
            // //                                      ^ Don't block the rest of the execution.
            // //                                        Don't wait until the request finishes to
            // //                                        continue.
            // oReq.send();
          </script>


          <div class="inputField">
            <form action="newEntry.php" method="post">
              <div >
                <div class="inputDescription">Username</div>
                <input class="usernameInput" type="text" name="username"></input>
              </div>
              <div>
                <div class="inputDescription">Email</div>
                <input class="userEmailInput" type="email" name="email"></input>
              </div>
              <div>
                <div class="inputDescription">Message</div> 
                <textarea class="inputForm" id="inputForm" placeholder="New Entry" name="message"></textarea>
              </div>
              <button id="sendBtn" alt="Submit" class="sendBtn">Send</button>
            </form>
          <div>

        </div>
      </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

<script>




  var textarea = document.getElementById('inputForm');
  var textareaValue = document.getElementById('inputForm').value;
  var maxInputLength = 256;

  textarea.addEventListener("keypress", function(){
    inputValue = document.getElementById('inputForm').value;
    if(inputValue.length > maxInputLength){
      document.getElementById('inputForm').value = inputValue.slice(0,maxInputLength);
      //alert("Warning! " + maxInputLength + " characters maximum!");
    }
  });


  var send = document.getElementById("sendBtn");
  send.onclick = function () {
      
  }

</script>


<!-- 
Attributes:
<p>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></p>


-->


</html>