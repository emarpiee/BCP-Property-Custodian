<div class="container-fluid">
  <h5 class="separator m-3">User Information</h5>
  <div class="row mb-3">
              <div class="col position-relative">
                <div class="form-floating">
                  <input type="email" class="form-control" id="EM" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
                  <label for="EM">Email</label>
                </div>
                <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['email']; ?>
                  </p>
              </div>

              <div class="col position-relative">
                <div class="form-floating">
                  <input type="password" minlength="8" maxlength="128" class="form-control" id="inputPassword" name="password" placeholder="Password" value="<?php echo htmlspecialchars($password); ?>" required>
                  <label for="inputPassword">Password</label>
                  <i class="fa-solid fa-eye-slash" id="passwordIconId"></i>
                  <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['password']; ?>
                  </p>
                </div>
              </div>
            </div>

            <!-- USER INFORMATION -->
            <div class="row mb-3">

              <!-- FIRSTNAME -->
              <div class="col position-relative">
                <div class="form-floating">
                  <input type="text" class="form-control" id="FN" name="firstName" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>" required>
                  <label for="FN">First Name</label>
                  <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['firstName']; ?>
                  </p>
                </div>
              </div>

              <!-- LAST NAME -->
              <div class="col position-relative">
                <div class="form-floating">
                  <input type="text" class="form-control" id="LN" name="lastName" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName); ?>" required>
                  <label for="LN">Last Name</label>
                  <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['lastName']; ?>
                  </p>
                </div>
              </div>
            </div>

            <h5 class="separator m-3">Department Information</h5>

            <!-- DEPARTMENT INFO -->
            <div class="row mb-3">

              <!-- DEPARTMENT NAME -->
              <div class="col position-relative">
                <div class="form-floating">
                  <input type="text" class="form-control" id="DN" name="deptName" placeholder="Department Name" value="<?php echo htmlspecialchars($deptName); ?>" required>
                  <label for="DN">Department Name</label>
                  <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['deptName']; ?>
                  </p>
                </div>
              </div>

               <!-- CAMPUS -->
              <div class="col-6 position-relative">
                <select class="form-select" aria-label="Campus" name="deptCampus" required>
                  <option value="">Campus...</option>
                  <option value="MV Campus">BCP MV Campus</option>
                  <option value="Main Campus">BCP Main Campus</option>
                  <option value="San Agustin Campus">BCP San Agustin Campus</option>
                  <option value="Bulacan Campus">BCP Bulacan Campus</option>
                  <option value="Marine Campus">BCP Marine Campus</option>
                </select>
                <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['deptCampus']; ?>
                  </p>
              </div>
            </div>


            <div class="row mb-3">

              <!-- DEPARTMENT ROOM -->
              <div class="col position-relative">
                <div class="form-floating">
                  <input type="number" min="100" max="550" class="form-control" id="DR" name="deptRoom" placeholder="Department Room" value="<?php echo htmlspecialchars($deptRoom); ?>" required>
                  <label for="DR">Department Room</label>
                  <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['deptRoom']; ?>
                  </p>
                </div>
              </div>


              <!-- CONTACT NUMBER -->
              <div class="col position-relative">
                <div class="form-floating">
                  <input type="number" minlength="11" maxlength="13" class="form-control" id="CN" name="contactNumber" placeholder="Contact Number"value="<?php echo htmlspecialchars($contactNumber); ?>" required>
                  <label for="CN">Contact Number</label>
                  <p class="small text-danger m-auto px-1">
                    <?php echo $errorMsg['contactNumber']; ?>
                  </p>
                </div>
              </div>
            </div>

</div>