<!DOCTYPE html>
<html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title</title>
<link rel="stylesheet" href="../style/sidebar.css" />
<link rel="stylesheet" href="../style/style.css" />
<link rel="stylesheet" href="../style/main.css" />
<link rel="stylesheet" href="../style/bootstrap.css" />
<link rel="stylesheet" href="../style/login.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
<link rel="icon" type="image/x-icon" href="assets/images/bcp-logo.png">
</head>
<body>

  <div class="container-fluid">
    <form>
      <div class="row mb-3">
        <div class="col position-relative">
          <div class="form-floating">
            <textarea class="form-control" id="RD" name="requestDesc" placeholder="Description / Message (optional)" value="<?php echo htmlspecialchars($requestDesc); ?>"></textarea>
            <label for="RD">Description / Message (optional) </label>
          </div>

          <div class="col position-relative">
            <div class="form-floating">
              <input type="number" minlength="1" maxlength="500" class="form-control" id="QTY" name="itemQuantity" placeholder="Item Quantity"value="<?php echo htmlspecialchars($itemQuantity); ?>" required>
              <label for="QTY">Item Quantity</label>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script>
    // initialize tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

        // prevent user from using F12 (inspect element)
    $(document).keydown(function(e){ 
      if(e.which === 123){ 

        return false; 

      } 

    });
  </script>
</body>
</html>