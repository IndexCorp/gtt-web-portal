<!--

    * 
    * Admin New Creation Modal 
    *


    -->

    <!-- Title Modal -->
<div class="modal fade" id="modal-default1">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Add Section</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST"   enctype="multipart/form-data">
          
            <div class="modal-body">
                       
            <div class="form-group" ><!-- form-group Starts -->

              <label class="col-md-6 control-label" > Title</label>

              <div class="col-md-10 " >
                <input type="text" name="title" class="form-control" placeholder="Enter Title " required>
              </div>

              </div>


              <div class="form-group" ><!-- form-group Starts -->

                    <label class="col-md-6 control-label" >Link</label>

                    <div class="col-md-10 " >
                    <textarea class="form-control" required id="exampleInputPassword1" name="link" placeholder="Enter course Link here.."></textarea>
                    </div>

             </div>
             <div class="row">
             <div class="col-6">
            
              <div class="form-group" data-select2-id="17">
                      <label for="select01">Type</label>
                      <select id="select01" name="type" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                          <option value="Video">Video</option>
                          <option value="Audio">Audio</option>
                      </select>
                  </div>
              </div>

              <div class="col-6">

                <div class="form-group" ><!-- form-group Starts -->

                <label class="col-md-6 control-label" > Duration</label>

                <div class="col-md-10 " >
                  <input type="text" name="duration" class="form-control" placeholder="Enter Duration " required>
                </div>

                </div>
            </div> 
            </div>
            </div>
           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="new_course_section" class="btn btn-primary" value="Submit Details">
           
              </div>

           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->







 <!-- Video  Modal -->
 <div class="modal fade" id="modal-video">
 <?php
  //  $cid = $_GET['cont_id'];
?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Add Video</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST"   enctype="multipart/form-data">
          
            <div class="modal-body">
                       
            <div class="form-group" ><!-- form-group Starts -->

              <label class="col-md-6 control-label" > Link</label>

              <div class="col-md-10 " >
                <input type="text" name="link" class="form-control" placeholder="Enter Youtube Link " required>
                <input type="hidden" name="section_id" value="<?php //=$cid;?>" class="form-control" placeholder="Enter Youtube Link " required>
              </div>

              </div>
            </div>
           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="section_video" class="btn btn-primary" value="Submit Details">
           
              </div>

           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->










 <!-- Audio  Modal -->
 <div class="modal fade" id="modal-audio">
 <?php
   // $cid = $_GET['cont_id'];
?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Add Audio</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST"   enctype="multipart/form-data">
          
            <div class="modal-body">
                       
            <div class="form-group" ><!-- form-group Starts -->

              <label class="col-md-6 control-label" > Link</label>

              <div class="col-md-10 " >
                <input type="text" name="link" class="form-control" placeholder="Enter Audio Link " required>
                <input type="hidden" name="section_id" value="<?php //$cid;?>" class="form-control" placeholder="Enter Youtube Link " required>
              </div>

              </div>
            </div>
           
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="section_audio" class="btn btn-primary" value="Submit Details">
           
              </div>

           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




