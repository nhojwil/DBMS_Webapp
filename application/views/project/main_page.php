<div class="container">
 
  <?php
    if(isset($a_table_project_data) && $a_table_project_data != NULL){
  ?>

      <div class="intro-project-table" id="phrase"> 
        <button class="btn btn-black btn-sm m-b-5"><a href="<?=base_url()?>bms/create">Create New Project</a></button><br>
        <table class = "  " id="keywords" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Purpose</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($a_table_project_data as $key => $value){
                echo'<tr>
                      <td> '.$value->Proj_ID.' </td>
                      <td> '.$value->Proj_Name.' </td>
                      <td> '.$value->Proj_Purpose.' </td>
                      <td> '.$value->Proj_Desc.' </td>
                      <td><button class="btn btn-info btn-sm">View</button>&nbsp<button class="btn btn-success btn-sm">Update</button></td>
                    </tr>';
              }
            ?>
          </tbody>
        </table>
      </div>

  <?php
    }else{
  ?>
      <div class="intro-project" id="phrase">
            <h2>you currently have no projects.</h2>
            <h2 id = "please-project">please    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   &nbsp to get started</h2>
            <a href = "<?=base_url()?>bms/create"><h2 id = "click-project" class ="click-project">click here</h2></a>
      </div>
  <?php
    }
  ?>   
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
              $('#keywords').tablesorter(); 
      });
    </script>