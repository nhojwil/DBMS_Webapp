<div class="container">
 

      <div class="intro-project" id="phrase">
            <h2>you currently have no projects.</h2>
            <h2 id = "please-project">please    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   &nbsp to get started</h2>
            <a href = "<?=base_url()?>bms/create_project"><h2 id = "click-project" class ="click-project">click here</h2></a>
      </div>

</div>

 <script src="<?= base_url() . 'application/public/js/jquery-2.1.1.min.js'?>"></script>
    <script>
        $(document).ready(function() {
           $('#click-project').addClass("visibility-hidden").hide("slow",function() {});
            $('#please-project').addClass("visibility-hidden").hide("slow",function() {});
           $('#phrase').addClass("visibility-hidden").hide("slow",function() {}).delay(100)
                      .queue(function() {
                        $(this).removeClass("visibility-hidden");
                        $(this).fadeIn(300,function() {});
                        $('#click-project').delay(300).queue(function(){
                                                  $(this).removeClass("visibility-hidden");
                                                  $(this).fadeIn(300,function() {});
                                                  $(this).dequeue();
                                                });
                        $('#please-project').delay(300).queue(function(){
                                                  $(this).removeClass("visibility-hidden");
                                                  $(this).fadeIn(300,function() {});
                                                  $(this).dequeue();
                                                });
                        $(this).dequeue();
                      });
      });
    </script>