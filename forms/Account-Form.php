<div class="container-fluid">
  <div class="row mb-3">
              <div class="col">
                <div class="form-floating">
                  <input type="email" class="form-control" id="EM" name="email" placeholder="Email" required>
                  <label for="EM">Email</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating">
                  <input type="password" minlength="8" maxlength="128" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                  <i class="fa-solid fa-eye-slash" id="passwordIconId"></i>
                </div>
              </div>
            </div>

            <!-- USER INFORMATION -->
            <div class="row mb-3">

              <!-- FIRSTNAME -->
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control" id="FN" name="firstName" placeholder="First Name" required>
                  <label for="FN">First Name</label>
                </div>
              </div>

              <!-- MIDDLE NAME -->
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control" id="MN" name="middleName" placeholder="Middle Name" required>
                  <label for="MD">Middle Name</label>
                </div>
              </div>

              <!-- LAST NAME -->
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control" id="LN" name="lastName" placeholder="Lastname" required>
                  <label for="LN">Last Name Name</label>
                </div>
              </div>
            </div>

            <!-- DEPARTMENT INFO -->
            <div class="row mb-3">

              <!-- DEPARTMENT NAME -->
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control" id="DN" name="deptName" placeholder="Department Name" required>
                  <label for="DN">Department Name</label>
                </div>
              </div>

               <!-- CAMPUS -->
              <div class="col-6">
                <select class="form-select" aria-label="Campus" name="deptCampus" required>
                  <option value="">Campus...</option>
                  <option value="MV Campus">BCP MV Campus</option>
                  <option value="Main Campus">BCP Main Campus</option>
                  <option value="San Agustin Campus">BCP San Agustin Campus</option>
                  <option value="Bulacan Campus">BCP Bulacan Campus</option>
                  <option value="Marine Campus">BCP Marine Campus</option>
                </select>
              </div>
            </div>


            <div class="row mb-3">

              <!-- DEPARTMENT ROOM -->
              <div class="col">
                <div class="form-floating">
                  <input type="number" min="100" max="550" class="form-control" id="DR" name="deptRoom" placeholder="Department Room" required>
                  <label for="DR">Department Room</label>
                </div>
              </div>


              <!-- CONTACT NUMBER -->
              <div class="col">
                <div class="form-floating">
                  <input type="number" min="11" max="11" class="form-control" id="CN" name="contactNumber" placeholder="Contact Number" required>
                  <label for="CN">Contact Number</label>
                </div>
              </div>
            </div>

</div>