<nav class="uk-navbar uk-navbar-container uk-margin">
    <div class="uk-navbar-right">
      <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-nav">

            <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
        </button>
    </div>
</nav>



<div id="offcanvas-nav" uk-offcanvas="overlay: true;">
    <div class="uk-offcanvas-bar uk-offcanvas-default">

        <ul class="uk-nav uk-nav-default uk-nav-">
          <?php
            if(empty($_SESSION['didi'])){
                echo '
                <li class="uk-nav-header"><a href="index.php">loginpage</a></li>
                ';
            }else if(!empty($_SESSION['didi'])){
                  echo '
                <li class="uk-nav-header"><a href="index.php?we=1">log Out page</a></li>
                ';
            }
    /*        <!--          <li class="uk-nav-header"><a href="area.php">subcategory</a></li>-->
<!--          <li class="uk-nav-header"><a href="clients.php">searchclient</a></li>-->
<!--          <li class="uk-nav-header"><a href="clientpage.php">clientpage</a></li>-->*/
            ?>
          <li class="uk-nav-header"><a href="district.php">maincategory</a></li>

          <li class="uk-nav-header"><a href="delayed.php">delayed</a></li>
         
            <?php
            // <li class="uk-nav-header"><a href="reports.php">reports</a></li>
            if(!empty($_SESSION['ta2_admin'])){
                echo '
                     <li class="uk-nav-header"><a href="adminlist.php">Adduser</a></li>
          
                     <li class="uk-nav-header"><a href="static.php">static</a></li>
                     
                ';
//                           <li class="uk-nav-header"><a href="addnewclient.php">addnewclient</a></li>
            }
            ?>
     

       
        </ul>

    </div>
</div>
