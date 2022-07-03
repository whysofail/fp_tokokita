<div class="main-content">
    <section class="section">
            <h2 class="align-content-center">Feedback</h2>
            <p>We like to hear your feedback.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Feedback</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                        <h5 class="ml-3">Youre posting as : <?php echo  $_SESSION['Username']; ?> </h5>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Feedback</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" style="min-width: 100%"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar (Optional, apabila ada bug)</label>

                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Gambar</label>
                          <input type="file" name="image" id="image-upload" />
                        </div>
                      </div>
                    </div>
                        <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Kirim Feedback</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </section>
</div>