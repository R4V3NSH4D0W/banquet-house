<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header" style="margin:15px;">
                    <ul class="nav navbar-nav navbar-right">

                   <a href="home" style="color: white;text-decoration: none;margin-top:10px;">
                    <b>  <i class="glyphicon glyphicon-home "></i> Home
                    </a></b>


  <a href="../pages/dashboard" style="color: white;text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;
                <b>  <i class="glyphicon glyphicon-stats "></i> Dashboard
                </a></b>
               
               <!-- <a href="archive" style="color: white;text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>  <i class="glyphicon glyphicon-ok-sign "></i> Archive
                  </a></b> -->
                </ul>
                  </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
        <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['name'];?>

                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
              <li><!-- start notification -->
                            <a href="profile">
                              <i class="glyphicon glyphicon-user text-green"></i> Profile
                            </a>
                          </li><!-- end notification -->

                          <li><!-- start notification -->
                            <a href="logout">
                              <i class="glyphicon glyphicon-off text-red"></i> Logout
                            </a>
                          </li><!-- end notification -->



                        </ul>
                      </li>

                    </ul>
                  </li>


                </ul>
              </div><!-- /.navbar-custom-menu -->
        </nav>
      </header>
