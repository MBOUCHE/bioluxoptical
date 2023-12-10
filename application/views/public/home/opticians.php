  <!-- Start our teacher -->
  <section id="mu-our-teacher">
    <div class="container-fluid" style="width: 94%">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2 id="opticians">Nos opticiens </h2>
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher-content">

              <div class="mu-title">
                <h3 style="float: left;">Dans nos locaux </h3>
              </div>
              <div class="row" style="margin-top: -4%">

                <?php foreach ($opticians->result_array() as $optician): ?>

                <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img img-thumbnail" style="width: 100%">
                      <img src="<?= base_url('assets/img/personnals/').$optician['profile_img'];?>" alt="img opticien" class="img-thumbnail" style="width: 100%; height: 152px">
                      <div class="mu-our-teacher-social">
                        <a href="tel:+237 675 776 125"><span class="fa fa-phone"></span></a>
                        <a href="https://m.facebook.com/www.bioluxoptical.cm/" target="_blank"><span class="fa fa-facebook"></span></a>
                        <a href="https://m.linkedin.com/www.bioluxoptical.cm/" target="_blank"><span class="fa fa-linkedin"></span></a>
                        <a href="mailto:<?= $optician['email'];?>" ><span class="fa fa-google-plus"></span></a>
                      </div>
                    </figure>                    
                    <div class="mu-ourteacher-single-content">
                      <h4><?= $optician['first_name'].' '.$optician['second_name'];?></h4>
                      <span> <?= $optician['years_exp'].' années d`\'expériqnces';?></span>
                      <p>
                        <?= ($optician['genre'] == 0) ? 'OPTICIENNE' : $optician['function'];?>
                        <?php
                            
                            $is_id_Role = $this->db->select('id_role')->where('id_user', $optician['id_user'] )->get('users_role')->result_array();
                            if (sizeof($is_id_Role) != 0) {
                              $is_Role = $this->db->select('name_role')->where('id_role', $is_id_Role[0]['id_role'])->get('role')->result_array();
                              echo $is_Role[0]['name_role'];
                            }
                          ?> 
                      </p>
                    </div>
                  </div>
                </div>           

            <?php endforeach; ?>
            <!-- end title -->
            

              </div> 
            <!-- End our teacher content -->   
            <!-- begain our teacher content -->

              <div class="mu-title">
                <h3 style="float: left;">En tant que prescripteurs </h3>
              </div>
              <div class="row" style="margin-top: -4%">

                <?php foreach ($consultants->result_array() as $consultant): ?>

                <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img img-thumbnail">
                      <img src="<?= base_url('assets/img/personnals/');?><?= $consultant['profile_img']?>" 
                            alt="img prescripteur" class="img-thumbnail" style="width: 100%; height: 152px">
                      <div class="mu-our-teacher-social">
                        <a href="tel:+237<?= $consultant['phone'];?>"><span class="fa fa-phone"></span></a>
                        <a href="https://m.facebook.com/www.bioluxoptical.cm/" target="_blank"><span class="fa fa-facebook"></span></a>
                        <a href="https://m.linkedin.com/www.bioluxoptical.cm/" target="_blank"><span class="fa fa-linkedin"></span></a>
                        <a href="mailto:<?= $consultant['email'];?>" ><span class="fa fa-google-plus"></span></a>
                      </div>
                    </figure>                    
                    <div class="mu-ourteacher-single-content">
                      <h4><?=$consultant['first_name'].' '.$consultant['second_name'];?></h4>
                      <span> <?= $consultant['years_exp'].' années d`\'expériqnces';?></span>
                      <p>
                        <?= ($consultant['genre'] == 0) ? 'OPTICIENNE' : $consultant['function'];?>
                        <br>
                        
                      <?php
                        
                        $is_id_Role = $this->db->select('id_role')->where('id_user', $consultant['id_user'] )->get('users_role')->result_array();
                        if (sizeof($is_id_Role) != 0) {
                          $is_Role = $this->db->select('name_role')->where('id_role', $is_id_Role[0]['id_role'])->get('role')->result_array();
                          echo $is_Role[0]['name_role'];
                        }
                      ?> 
                      
                      </p>
                    </div>
                  </div>
                </div>           

                <?php endforeach; ?>        
              </div>

            </div>

          </div>             
        
        </div> 
      </section>
      <!-- End our teacher -->