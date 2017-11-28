<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffddff;">
    <a class="navbar-brand">🔥Media Manager🔥</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php
          if($activePage === "GALLERY"){
            echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li><li class='nav-item active'><a class='nav-link' href='gallery.php'>Gallery</a></li><li class='nav-item'><a class='nav-link' href='cinema.php'>Cinema</a></li><li class='nav-item'><a class='nav-link' href='upload.php'>Upload File</a></li><li class='nav-item'><a class='nav-link' href='api/logOut.php'>Log Out</a></li>";
          } else if($activePage === "UPLOAD") {
            echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li><li class='nav-item'><a class='nav-link' href='gallery.php'>Gallery</a></li><li class='nav-item'><a class='nav-link' href='cinema.php'>Cinema</a></li><li class='nav-item active'><a class='nav-link' href='upload.php'>Upload File</a></li><li class='nav-item'><a class='nav-link' href='api/logOut.php'>Log Out</a></li>";
          } else if($activePage === "LOGIN") {
            echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li><li class='nav-item'><a class='nav-link' href='gallery.php'>Gallery</a></li><li class='nav-item'><a class='nav-link' href='cinema.php'>Cinema</a></li><li class='nav-item'><a class='nav-link' href='upload.php'>Upload File</a></li><li class='nav-item active'><a class='nav-link' href='login.php'>Log In</a></li>";
          } else if($activePage === "CINEMA") {
            echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li><li class='nav-item'><a class='nav-link' href='gallery.php'>Gallery</a></li><li class='nav-item active'><a class='nav-link' href='cinema.php'>Cinema</a></li><li class='nav-item'><a class='nav-link' href='upload.php'>Upload File</a></li><li class='nav-item'><a class='nav-link' href='api/logOut.php'>Log Out</a></li>";
          } else if($activePage === "HOME" && $isUserLogged){
            echo "<li class='nav-item active'><a class='nav-link' href='index.php'>Home</a></li><li class='nav-item'><a class='nav-link' href='gallery.php'>Gallery</a></li><li class='nav-item'><a class='nav-link' href='cinema.php'>Cinema</a></li><li class='nav-item'><a class='nav-link' href='upload.php'>Upload File</a></li><li class='nav-item'><a class='nav-link' href='api/logOut.php'>Log Out</a></li>";
          } else {
              echo "<li class='nav-item active'><a class='nav-link' href='index.php'>Home</a></li><li class='nav-item'><a class='nav-link' href='gallery.php'>Gallery</a></li><li class='nav-item'><a class='nav-link' href='cinema.php'>Cinema</a></li><li class='nav-item'><a class='nav-link' href='upload.php'>Upload File</a></li><li class='nav-item'><a class='nav-link' href='login.php'>Log In</a></li>";
          }

        ?>
      </ul>
    </div>
</nav>

<div class="container-fluid">
  <div class="my-4"></div>
