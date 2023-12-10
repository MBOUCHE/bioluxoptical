
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style=" background-image: url(<?= base_url('assets/img/breadcrumb/background_body.jpg');?>)">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?= $sub_title; ?>  <span style="float: right;"><?= $presentation; ?></span> </h4>
                        <?= (!empty($this->session->flashdata('flsh_mess'))) ? '<br><span style="color: green">'.$this->session->flashdata('flsh_mess').'</span>' : ''; ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                <input type="hidden" name="samepage" value="samepage">
                <div class="row"> 
                    <?php $this->load->view('public/tables_paid'); ?>

                    <?php $this->load->view('customer/old_payment'); ?>
                </div>
                 <!-- /. ROW  -->
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

