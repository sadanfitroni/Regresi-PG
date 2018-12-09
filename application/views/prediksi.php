<?php $this->load->view('includes/header') ?>

<div class="content-wrapper">
  <section class="content">
    <div class="panel panel-default">
      <div class="panel-heading">
        Prediksi Kelulusan
        </div>
        <div class="panel-body">
          <table style="width:60%;">
            <tr>
              <td>NIS : </td>
              <td><?php echo $siswa->nis_siswa ?></td>
            </tr>
            <tr>
              <td>Nama Siswa :</td>
              <td style="width:50%"><?php echo $siswa->nama_siswa?></td>
            </tr>
            <tr>
              <td>Asal Sekolah : </td>
              <td><?php echo $siswa->asal_sekolah ?></td>
            </tr>
          </table>
          <br>
          <table style="width:60%;">
            <tr>
              <?php
              $lulus = false;
              foreach($pilihan as $row):
                $hasil_prediksi = $this->db->order_by("thn", "desc")->get_where('hasil_prediksi', array('kode_ptn' => $row->kode_ptn, 'kode_prodi' => $row->kode_prodi))->row();
                if(!empty($hasil_prediksi)):
                  if($row->nilai_to >= $hasil_prediksi->nilai_prediksi):
                    $lulus = true;
                    break;
                  endif;
                endif;
              endforeach;
              ?>
              <td><?php echo ($lulus?'Selamat, anda diprediksi Lulus di : ':'Mohon maaf, berdasarkan hasil prediksi anda dinyatakan belum "Lulus".') ?></td>
            </tr>
          </table>
          <br>
          <table style="width:60%;">
            <?php
            foreach($pilihan as $row):
              $hasil_prediksi = $this->db->order_by("thn", "desc")->get_where('hasil_prediksi', array('kode_ptn' => $row->kode_ptn, 'kode_prodi' => $row->kode_prodi))->row();
              if(!empty($hasil_prediksi)):
                if($row->nilai_to >= $hasil_prediksi->nilai_prediksi):
            ?>
            <tr>
              <td>Perguruan Tinggi Negeri</td>
              <td style="width:50%"><?php echo $row->nama_ptn ?></td>
            </tr>
            <tr>
              <td>Program Studi</td>
              <td><?php echo $row->nama_prodi ?></td>
            </tr>
            <tr>
              <td>Pilihan Ke</td>
              <td><?php echo $row->pilihan_ke ?></td>
            </tr>
            <?php
                endif;
              endif;
            endforeach;
            ?>
          </table>
        </div>
    </div>
  </section>
</div>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.22.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>

<?php $this->load->view('includes/footer') ?>
