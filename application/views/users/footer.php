<footer class="main-footer">
        <div class="footer-left">
       
          <?php echo date("Y");?> &copy; <div class="bullet"></div> UPT-PTIK UMRAH
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/assets/js/bootstrap.min.js"></script>
  <script src="assets/assets/js/nicescroll.min.js"></script>
  <script src="assets/assets/js/moment.min.js"></script>

  <script src="assets/assets/js/stisla.js"></script>
  <script> 
  var getnama = "<?php echo $this->session->userdata('name') ?>";
   </script>
  <script> 
    window.intergramId = "-517658562";
    window.intergramCustomizations = {
        titleClosed: 'Chat Petugas',
        titleOpen: 'Chat Petugas',
        introMessage: 'Selamat datang di SIPEMANIS. sebelum mengirimkan pesan silahkan masukkan NIM/NIK/NIP dan Pesan anda',
        autoResponse: 'Terima Kasih telah mengirim pesan ke Admin, tunggu sebentar. Admin akan membalas pesan anda segera',
        autoNoResponse: 'Apakah ada yang ingin disampaikan lagi? ',
        mainColor: "#2863a6", // Can be any css supported color 'red', 'rgb(255,87,34)', etc
        alwaysUseFloatingButton: false, // Use the mobile floating button also on large screens,\
        placeholderText: 'Masukkan Pesan Anda...'

        
    };
    window.intergramOnOpen = {}; window.intergramOnOpen.visitorName=getnama;
</script>
<script id="intergram" type="text/javascript" src="assets/assets/js/widget.js"></script>

  <!-- JS Libraies -->
  <script src="assets/assets/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="assets/assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/assets/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

  <!-- Template JS File -->
  <script src="assets/assets/js/scripts.js"></script>
  <script src="assets/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/assets/js/page/modules-datatables3.js"></script>

  <script>
    notif();
function notif()
{
  var audio = new Audio('assets/sound/notif.mp3');
  $.get("<?php echo base_url()?>web/notif_bell/pesan_baru", function(data){
    if (data==1) {
      audio.play();
    }else if (data==11) {
      window.location.href="<?php echo base_url(); ?>web/logout";
    }
  },"json");

  jml_data2 = "<?php echo base_url()?>web/notif_bell/jml";
  $("#jml_notif_bell").load(jml_data2);

  data2 = "<?php echo base_url()?>web/notif_bell";
  $("#notif_bell").load(data2);
}
setInterval(notif, 2000); //2 detik
</script>
</body>
</html>


</body>
</html>