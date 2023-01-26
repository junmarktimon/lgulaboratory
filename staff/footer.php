    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>


<!-- add client modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../code1.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="lname" class="form-control" id="lastname" style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="fname" class="form-control" id="firstname" style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" name="mname" class="form-control" id="middlename" style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Suffix Name</label>
            <input type="text" name="suffix" class="form-control" id="suffixname" style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="number" name="age" class="form-control" id="age" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" id="address" style="text-transform: uppercase;" required>
          </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="btn_add_client" class="btn btn-primary">Add</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal for add client -->



<!-- add member modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../code1.php" method="post">

            <input type="hidden" class="form-control" id="editInput_family_id" name="view_client">

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="mlname" class="form-control"  style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="mfname" class="form-control"  style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" name="mmname" class="form-control"  style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Suffix Name</label>
            <input type="text" name="msuffix" class="form-control"  style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Relation</label>
            <select class="form-control"  name="relation" style="text-transform: uppercase;" required>
                <option>-- select -- </option>
                <option value="brother">Brother</option>
                <option value="daughter">Daughter</option>
                <option value="husband">Husband</option>
                <option value="nephew">Nephew</option>
                <option value="niece">Niece</option>
                <option value="son">Son</option>
                <option value="wife">Wife</option>
                <option value="sister">Sister</option>
                <option value="step-father">Step-father</option>
                <option value="step-mother">Step-mother</option>
                <option value="brother-in-law">Brother-in-law</option>
                <option value="sister-in-law">Sister-in-law</option>
                <option value="mother">Mother</option>
                <option value="father">Father</option>
                <option value="border">Border</option>
                <option value="step-sister">Step-sister</option>
                <option value="step-brother">Step-brother</option>
                <option value="father-in-law">Father-in-law</option>
                <option value="mother-in-law">Mother-in-law</option>
                <option value="mother-in-law">Mother-in-law</option>
                <option value="helper">Helper</option>
                <option value="cousin">Cousin</option>
                <option value="friend">Friend</option>
                <option value="great mother-in-law">Great mother-in-law</option>
                <option value="great father-in-law">Great father-in-law</option>
            </select>
          </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="btn_add_member" class="btn btn-primary">Add</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal for add member -->




<!-- update client modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../code1.php" method="post">

        <input type="hidden" class="form-control" id="editInput_client_id"  name="edit_client">

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="lname" class="form-control" id="clastname" style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="fname" class="form-control" id="cfirstname" style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" name="mname" class="form-control" id="cmiddlename" style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Suffix Name</label>
            <input type="text" name="suffix" class="form-control" id="csuffixname" style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="number" name="age" class="form-control" id="cage" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" id="caddress" style="text-transform: uppercase;" required>
          </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="btn_update_client" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal for update client -->



<!-- update member modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop4" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../code1.php" method="post">

          <input type="hidden" class="form-control" id="editInput_client_member_id" name="view_client">
            <input type="hidden" class="form-control" id="editInput_member_id" name="view_member">

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="mlname" class="form-control" id="mlastname" style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="mfname" class="form-control" id="mfirstname" style="text-transform: uppercase;" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" name="mmname" class="form-control" id="mmiddlename" style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Suffix Name</label>
            <input type="text" name="msuffix" class="form-control" id="msuffixname" style="text-transform: uppercase;">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Relation</label>
            <select class="form-control" id="input_select_mrelation" name="mrelation" style="text-transform: uppercase;" required>
                <option>-- select -- </option>
                <option value="brother">Brother</option>
                <option value="daughter">Daughter</option>
                <option value="husband">Husband</option>
                <option value="nephew">Nephew</option>
                <option value="niece">Niece</option>
                <option value="son">Son</option>
                <option value="wife">Wife</option>
                <option value="sister">Sister</option>
                <option value="step-father">Step-father</option>
                <option value="step-mother">Step-mother</option>
                <option value="brother-in-law">Brother-in-law</option>
                <option value="sister-in-law">Sister-in-law</option>
            </select>
          </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="btn_update_member" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal for update member -->







<script>
      // error meesage fadeOut
      $('document').ready(function(){ 
        $("#message").fadeIn(1000).fadeOut(5000); 
      });


      //get user id for specific add member using jquery and by calling input or button id
        //add memeber
        $(document).on('click', '#add_member', function(){
                            
            var addmemberid = $(this).data('id1');

            document.getElementById("editInput_family_id").value = addmemberid;

        });


        //get user id for specific update client using jquery and by calling input or button id
        //update client
        $(document).on('click', '#edit_client', function(){
                            
            var cid = $(this).data('id1');
            var lname = $(this).data('id2');
            var fname = $(this).data('id3');
            var mname = $(this).data('id4');
            var suffix = $(this).data('id5');
            var age = $(this).data('id6');
            var address = $(this).data('id7');

            document.getElementById("editInput_client_id").value = cid;
            document.getElementById("clastname").value = lname;
            document.getElementById("cfirstname").value = fname;
            document.getElementById("cmiddlename").value = mname;
            document.getElementById("csuffixname").value = suffix;
            document.getElementById("cage").value = age;
            document.getElementById("caddress").value = address;

        });

        //get user id for specific update member using jquery and by calling input or button id
        //update memeber
        $(document).on('click', '#edit_member', function(){
                            
            var mid = $(this).data('id1');
            var mlname = $(this).data('id2');
            var mfname = $(this).data('id3');
            var mmname = $(this).data('id4');
            var msuffix = $(this).data('id5');
            var mrelation = $(this).data('id6');
            var head_id = $(this).data('id7');

            document.getElementById("editInput_member_id").value = mid;
            document.getElementById("mlastname").value = mlname;
            document.getElementById("mfirstname").value = mfname;
            document.getElementById("mmiddlename").value = mmname;
            document.getElementById("msuffixname").value = msuffix;
            document.getElementById("input_select_mrelation").value = mrelation;
            document.getElementById("editInput_client_member_id").value = head_id;


        });


    </script>



  </body>
</html>