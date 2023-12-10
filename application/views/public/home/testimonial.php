
  <!-- Start testimonial -->

    <?php
      $index_com_testimony = $this->M_Header->comTestimony();
    ?>
  <div class="mu-title " style="background-color: white; text-decoration-style: wavy;">
    <br>
    <h2 id="testimonies">TEMOIGNAGES</h2>

    <p><?= $index_com_testimony->descrip; ?></p> 
  </div>
  <section id="mu-testimonial" style="color: white; background-image: url('<?= base_url('assets/img/breadcrumb/bgr12.png'); ?>'); background-size: 100%; display: inline; background-repeat: no-repeat; float: left; width: 100%">
    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">

              <?php foreach ($testimonials->result_array() as $testimonial): ?>
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <span style="color: gray; font-size: 13px">Le <?= date("d/m/Y à H:i:s", strtotime( $testimonial['date_issue'])); ?>.</span>
                  <span style="color: lightblue; font-size: 13px; float: right;">
                  	<?= strlen($testimonial['profession']) > 5 ? '<span>Profession : '.$testimonial['profession'] .' </span><br>': ''; ?>
                  </span>
                  <blockquote style="color: white"><i class="fa fa-quote-right" style="float: right;"></i>
                    <p><?= $testimonial['content']; ?></p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img class="img-thumbnail" src="<?= base_url('assets/img/customers/').$testimonial['profile_img']; ?>" alt="profile" style="width: 40%; height: 202px">
                </div>
                <div class="mu-testimonial-info">
                  <h4><?= ($testimonial['genre'] == 1) ? 'M. ' : 'Mme ' ?><?= $testimonial['fname_cost'].' '.$testimonial['sname_cost']?></h4>
                  <span>Compte créé le <?= date("d/m/Y", strtotime( $testimonial['reg_date_cost'])); ?>.</span>
                </div>
              </div>

              <?php endforeach; ?>

            </div>
            <a href="<?= base_url('Bioluxoptical/contact/TEMOIGNAGE') ?>" style="border-radius: 0px; float: right; font-size: 17px" type="button" class="btn btn-primary"><i class="fa fa-quote-left"> </i> <span class="fa fa-comment-o"></span> Témoigner <i class="fa fa-quote-right"> </i> </a>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->

  