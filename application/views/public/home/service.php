
  <!-- Start service  -->
  <section id="mu-service" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xm-12">
          <div class="mu-service-area">
          
          <?php foreach ($generic_services->result_array() as $generic_service): ?>
          
            <div class="mu-service-single col-lg-4 col-md-4 col-xm-6">
              <figure>
                <img style="width: 100%; height: 202px" 
                  src="<?= base_url('assets/img/reason/').$generic_service['img_reason'];?>" alt="img">
              </figure>
              <h4><?= $generic_service['name_reason']; ?></h4>
              <p><?= $generic_service['note_reason']; ?></p>
              <a style="padding: 8px" class="mu-read-more-btn" href="<?= site_url('Bioluxoptical/serviceReadMore/'.$generic_service['id_reason']) ?>"><i class="fa fa-plus"></i> Détails</a>
            </div>

          <?php endforeach; ?>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->