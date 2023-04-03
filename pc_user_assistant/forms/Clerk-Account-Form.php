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