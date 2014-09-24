
<div class="container">
  <?php 
    if(!isset($user)){ ?>
      <div class="welcome-note welcome-init" id="phrase">
            <h2>Welcome to DBMS</h2>
      </div>

      <form action="<?php echo base_url(); ?>" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" novalidate>
        <div class="login login-init col-md-6 col-sm-6" id = "login">
          <input type="text" placeholder="username" name="txt_username"><br>
          <input type="password" placeholder="password" name="txt_password"><br>
          <input type="submit" value="Login">
        </div>
      </form>
    <?php
    }else{
      echo '<div class="welcome-note welcome-init" id="phrase">
            <h2>Welcome, '.$user->CategoryID.'</h2>
            </div>
            <button class="btn btn-default btn-md welcome-button" href="#" id="proceed_button">Proceed</button>
            ';
    }
    ?>

</div>
    <script src="<?= base_url() . 'application/public/js/jquery-2.1.1.min.js'?>"></script>
    <script src="<?= base_url() . 'application/public/js/jquery.lettering.js'?>"></script>
    <script>
        $(document).ready(function() {
          $( "#login" ).hide( "slow", function() {
          });
          $("#phrase").hide( "slow", function() {

          });

          $("#proceed_button").hide( "slow", function() {

          });
        
          $("#phrase").after(function() { 
            $( "#login" ).removeClass("login-init").show( "slow", function() {

            });
            $("#phrase").removeClass("welcome-init").show( "slow", function() {

            });
            $("#proceed_button").show( "slow", function() {

            });

        });
      });
    </script>

    