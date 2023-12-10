
            <div class="border-head">
              <h3 style="">Visites : utilisateurs et internautes</h3>
            </div>

            <!--CUSTOM CHART START -->

            <div class="custom-bar-chart" style="margin-left: 8%; margin-top: 5%">
              <ul class="y-axis" style="margin-top: -11.11%">


             <?php $i=56; foreach ($maXcurrentVisites->result_array() as $maXcurrentVisite): ?>

                <li style=""><span><?= $i-=7; ?></span></li>

              <?php endforeach; ?>

                <li><span><?= 0; ?></span></li>
              </ul>

              <?php foreach ($visites->result_array() as $visite): ?>
                
                <div class="bar">
                  <div class="title"><?= date('d/m/Y', strtotime($visite['date'])); ?></div>
                  <div class="value tooltips" data-original-title="<?= $visite['visites']; ?>" data-toggle="tooltip" data-placement="top"><?= $visite['visites']*5.8; ?></div>
                </div>

              <?php endforeach; ?>

              
            </div>
  