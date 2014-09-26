
<div class="container row">
  <?php 
    if(!isset($user)){ ?>
      <div class="welcome-note col-md-6 col-sm-6 col-xs-6" id="phrase">
            <h2 class="welcome-text" id = "welcome-text"> Welcome</h2> 
            <h2 class="to-text"      id = "to-text">        to   </h2>
            <h2 class="B-text"       id = "B-text">          B   </h2>
            <h2 class="M-text"       id = "M-text">          M   </h2>
            <h2 class="S-text"       id = "S-text">          S   </h2>
            
      </div>
      <div class="login col-md-6 col-sm-6 col-xs-6" id = "login">
        <form action="<?php echo base_url(); ?>" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" novalidate>        
          <input type="text" placeholder="username" name="txt_username"><br>
          <input type="password" placeholder="password" name="txt_password"><br>
          <input type="submit" value="Login">   
        </form>
        <div class = "register-text visibility-hidden" id = "register">
          No account? <a href = "#" id= "text-register" class = "">Register</a> now.
        </div>
      </div>
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
          $('#proceed_button').addClass("visibility-hidden").hide("slow",function() {});
          $('#login').addClass("visibility-hidden").hide("slow",function() {}); 
          $('#welcome-text').addClass("visibility-hidden").hide("slow",function() {});
          $('#to-text').addClass("visibility-hidden").hide("slow",function() {});
          $('#B-text').addClass("visibility-hidden").hide("slow",function() {});
          $('#M-text').addClass("visibility-hidden").hide("slow",function() {});
          $('#S-text').addClass("visibility-hidden").hide("slow",function() {});
          $('#phrase').addClass("visibility-hidden").hide("slow",function() {}).delay(100)
                      .queue(function() {
                        $(this).removeClass("visibility-hidden");
                        $(this).fadeIn(300,function() {});

                        $('#welcome-text').delay(200)
                                   .queue(function() {
                                            $(this).removeClass("visibility-hidden");
                                            $(this).fadeIn(200,function() {});
                                            $('#to-text').delay(200)
                                                              .queue(function() {
                                                                       $(this).removeClass("visibility-hidden");
                                                                       $(this).fadeIn(400,function() {});
                                                                       $('#B-text').delay(200)
                                                                                    .queue(function() {
                                                                                              $(this).removeClass("visibility-hidden");
                                                                                              $(this).fadeIn(400,function() {});
                                                                                              $('#M-text').delay(400)
                                                                                                           .queue(function() {
                                                                                                                    $(this).removeClass("visibility-hidden");
                                                                                                                    $(this).show(500,function() {});
                                                                                                                    $('#S-text').delay(400)
                                                                                                                                .queue(function() {
                                                                                                                                        $(this).removeClass("visibility-hidden");
                                                                                                                                        $(this).fadeIn(700,function() {});
                                      
                                                                                                                                        $(this).dequeue();
                                                                                                                                      });
                                      
                                                                                                                    $(this).dequeue();
                                                                                                                  });
                                                                                              $(this).dequeue();
                                                                                            });
                                                                       $(this).dequeue();
                                                                    });
                 
                                            $(this).dequeue();
                                          });
                

                        $('#login').delay(100)
                                   .queue(function() {
                                    $(this).removeClass("visibility-hidden");
                                    $(this).fadeIn(200,function() {
                                       $('#register').hide("fast",function() {}).delay(300)
                                                  .queue(function(){
                                                    $(this).removeClass("visibility-hidden");
                                                    $(this).fadeIn(300,function() {});
                                                    $(this).dequeue();
                                                  });
                                    });
                                    $(this).dequeue();
                                  });

                        $('#proceed_button').delay(100)
                                   .queue(function() {
                                    $(this).removeClass("visibility-hidden");
                                    $(this).fadeIn(200,function() {
                                       $('#register').hide("slow",function() {}).delay(300)
                                                  .queue(function(){
                                                    $(this).removeClass("visibility-hidden")
                                                    $(this).fadeIn(300,function() {});
                                                    $(this).dequeue();
                                                  });
                                    });
                                    $(this).dequeue();
                                  });

                        
                        $(this).dequeue();
                        });
                       

        

      });
    </script>

    