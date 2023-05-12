    
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/loginuser/') ?>jquery.min.js"></script>
	<script src="<?= base_url('assets/loginuser/') ?>jquery.validate.min.js"></script>
    <script src="<?= base_url('assets/tema/') ?>plugins/notifications/js/lobibox.min.js"></script>
	<script src="<?= base_url('assets/tema/') ?>plugins/notifications/js/notifications.min.js"></script>
    <script>var base_url = '<?php echo base_url() ?>';</script>
	<script src="<?= base_url('assets/js/') ?>auth.js"></script>
    <script>
    <?php if($this->session->flashdata('failed')){ ?>
        Lobibox.notify('warning', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            icon: 'bx bx-error',
                            msg: '<?php echo $this->session->flashdata('failed'); ?>',
                            sound: false,
                        });
        
    <?php } ?>
    </script>



    <script src="<?= base_url() ?>assets/pjax/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/pjax/js/jquery.pjax.js"></script>
    <script src="<?= base_url() ?>assets/pjax/js/scripts.js"></script>

</div>
</body>

</html>