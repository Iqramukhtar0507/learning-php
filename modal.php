<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="user_form" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
              <div class="form=group">
                <input type="hidden" name="">
                <label>Select User Image</label>
                <input type="file" name="file" id="upload_file" class="form-control">
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
              <!-- <input type="hidden" name="user_id" id="user_id" /> -->
              <button type="submit" name="upload_button" id="upload_btn" class="btn btn-success" value="">Upload</button>
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- Optional JavaScript -->
<script src="./js/jquery-3.6.1.js"></script>
<script src="./js/img.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>