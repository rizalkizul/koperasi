<!DOCTYPE html>
<html>
<?php
	session_start();

	// include_once(dirname(__FILE__).'/controller/pengguna.php');
?>
<head>
	<title></title>
	<script type='text/javascript' src='assets/js/jquery-3.2.1.min.js'></script>
<style type="text/css">
	li.dropdown {
    display: inline-block;
}
.floating-tool {
font-family: comfortaa;
padding: 5px;;
z-index: 100;
position: fixed;
top: 0px;
right: 0px;
margin-right: 20px;
margin-top: 18px;
}
.floating-tool li {
   display:inline-block;
   color: #fff;
   height:100%;
   padding: 2px 20px;
  }
  li.dropdown {
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #191515;
    width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 10;
    right: 30px;
}

.dropdown-content a {
    color: white;
    padding: 12px 12px;
    text-decoration: none;
    display: block;
    text-align: center;
}

.dropdown-content a:hover {
background-color: grey;
}

.dropdown:hover .dropdown-content {
    display: block;
    color:white;
}
.dropbtn{
	color: white;
}
</style>
</head>
<body>
	<nav class="floating-tool">
             <ul>
              <?php
              $nama = $_SESSION['nama'];
              // $_SESSION['nama'];
              $result = (explode(" ",$nama));
                if(isset($_SESSION['login'])) {
                      echo "<li class=\"dropdown\"><a href=\"javascript:void(0)\" class=\"dropbtn\"><font size=\"5\">".$result[0]."</font>"."</a>";
                      echo "<div class=\"dropdown-content\">
                              <a href=\"controller/logoutController.php\">Logout</a>
                            </div></li>";
                }else{
					echo "<li class=\"dropdown\"><a href=\"javascript:void(0)\" class=\"dropbtn\"><font size=\"3\">Login</font>"."</a>";
                      echo "<div class=\"dropdown-content\">
                              <a href=\"loginadmin.php\">Login Admin</a>
                            </div></li>";
//                        echo "<li><a href=\"login.php\">login</a></li>";
                                    }
              echo "</ul>"; ?>
              </nav>
</body>
</html>