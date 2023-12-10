
  <!-- Start Slider -->
  <section id="mu-slider" class="" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0))">

    <?php foreach ($slides->result_array() as $slide): ?>


    <!-- Start single slider item -->
    <div class="mu-slider-single" style="text-align: center;">
      <div class="mu-slider-img">
        <figure>
          <img src="<?= base_url('assets/img/slider').'/'.$slide['img_slide']; ?>" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content" style="padding: 1px;">
        <h3><?= $slide['title0']; ?></h3>
        <span></span>
        <h2 style="font-size: 22px"><?= $slide['title']; ?></h2>
        <p><?=  mb_strimwidth($slide['description'], 0, 71).'...' ; ?></p>
        <a href="<?= base_url('Bioluxoptical/readMore/').$slide['id_slide'].'/slide'; ?>" class="mu-read-more-btn">En savoir <i class="fa fa-plus"></i></a>
      </div>
    </div>
    <!-- Start single slider item -->

    <?php endforeach ?>
        
  </section>
  <!-- End Slider -->