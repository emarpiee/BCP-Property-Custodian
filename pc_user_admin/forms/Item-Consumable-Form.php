<div class="container-fluid">
  
  <div class="row mb-3">
    <div class="col">
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
  </div>

</div>