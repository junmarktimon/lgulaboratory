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

        <form action="../code.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="lname" class="form-control" id="lastname" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="fname" class="form-control" id="firstname" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" name="mname" class="form-control" id="middlename">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Suffix Name</label>
            <input type="text" name="suffix" class="form-control" id="suffixname">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="number" name="age" class="form-control" id="age" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" id="address" required>
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

        <form action="../code.php" method="post">

            <input type="hidden" class="form-control" id="editInput_family_id" name="view_client">

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="mlname" class="form-control" id="lastname" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="mfname" class="form-control" id="firstname" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" name="mmname" class="form-control" id="middlename">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Suffix Name</label>
            <input type="text" name="msuffix" class="form-control" id="suffixname">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Relation</label>
            <select class="form-control" id="input_select" name="relation" required>
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
            <button type="submit" name="btn_add_member" class="btn btn-primary">Add</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal for add member -->




<!-- add services modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Services</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../code.php" method="post">

            <input type="text" class="form-control" id="editInput_family_id1" name="view_client">

              <!-- query for course or section -->
                <?php
                 $query = "SELECT * FROM tbl_household_member";
                 $query_run = mysqli_query($connection,$query);

              ?>

                <!-- Input Fields -->
                <div class="form-group">
                    <label>Name</label>
                        <select name="section" class="form-control" required>
                            <option selected disabled value="">-- Select --</option>
                            

                                <?php

                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>

                                    <option value="<?php echo $row['id'];?>"> <?php echo $row['lname'] . " " . $row['fname'] . " " . $row['mname'] . " " . $row['suffix'];?> </option>


                                  <?php
                                }
                            }
                                    ?>

                        </select>
                </div>
             <!-- end query for course or section -->

          <div class="form-group">
            <label for="exampleFormControlSelect1">Services</label>
            <select class="form-control" id="input_select" name="relation" required>
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
          <div class="form-group">
            <label for="exampleInputEmail1">Amount</label>
            <input type="number" name="amount" class="form-control" id="amount">
          </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="btn_add_member" class="btn btn-primary">Add Services</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal for add services -->



<script>
      // error meesage fadeOut
      $('document').ready(function(){ 
        $("#message").fadeIn(1000).fadeOut(5000); 
      });


      //get user id for specific add member using jquery and by calling input or button id
        //add memeber
        $(document).on('click', '#add_member', function(){
                            
            var id = $(this).data('id1');

            document.getElementById("editInput_family_id").value = id;

        });

        //get user id for specific add services using jquery and by calling input or button id
        //add services
        $(document).on('click', '#add_services', function(){
                            
            var id1 = $(this).data('id3');

            document.getElementById("editInput_family_id1").value = id1;

        });


    </script>


  </body>
</html>