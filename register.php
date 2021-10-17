<?php include 'font-header.php'; ?>
<main id="main">
<section id="register" class="register">
      <div class="container mt-5" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-md-8 m-auto">
              <div class="card shadow-sm p-4">
                  <h4 class="card-title text-center">Register Here</h4>
                  <hr>
                  <div class="card-body">
                    <form action="admission.php" method="POST" id="student" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bx bxs-user"></i></span>
                            <input type="text" name="student_name" class="form-control" placeholder="Enter your name here..." aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"><i class="bx bxs-envelope"></i></span>
                            <input type="text" name="student_email" class="form-control" placeholder="Enter your gmail here..." aria-label="email" aria-describedby="basic-addon2" required>
                        </div>

                        <div class="input-group mb-3">
                          <label class="input-group-text" for="student-img">Upload</label>
                          <input type="file" name="file" class="form-control form-control" id="student-img" required>
                        </div>

                        <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Course</label>
                        <select class="form-select" name="course_category" id="course_category" required>
                          <option selected>Select your course category</option>
                          <?php
                            if($get_course_category->num_rows > 0){
                              while($row = $get_course_category->fetch_object()){
                                ?>
                                  <option value="<?php  echo $row->course_category_id; ?>"><?php echo $row->course_category_name; ?></option>
                                <?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="d-grid gap-2">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                      </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </section><!-- End Trainers Section -->
</main>

<?php include 'font-footer.php' ?>