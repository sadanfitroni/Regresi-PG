<?php $this->load->view('includes/header') ?>

<div class="content-wrapper">
  <section class="content">
    <div class="panel panel-default">
      <!-- <div class="panel-heading">
      </div> -->
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#saintek">Saintek</a></li>
            <li><a data-toggle="tab" href="#soshum">Soshum</a></li>
          </ul>
          <div class="tab-content">
            <div id ="saintek" class="tab-pane fade in active">
              <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th>Kode Prodi</th>
                          <th>Nama Prodi</th>
                          <th>Hasil Prediksi</th>
                          <?php if($this->session->userdata('id_privilage') == 1): ?>
                          <th>Detail Prediksi</th>
                          <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // echo $kode_ptn;
                        $query = $this->db->query("SELECT * FROM prodi_fakultas WHERE kode_ptn = $kode_ptn AND jenis = 'Saintek' ORDER BY kode_prodi")->result();
                        if(count($query)>0){
                        foreach($query as $row){ ?>
                        <tr>
                          <td><?php echo $row->kode_prodi; ?></td>
                          <td><?php echo $row->nama_prodi; ?></td>
                          <td>
                            <?php  
                            $hasil_prediksi = $this->db->get_where('hasil_prediksi', array('kode_ptn' => $row->kode_ptn, 'kode_prodi' => $row->kode_prodi))->row();
                            if(!empty($hasil_prediksi)){
                              echo $hasil_prediksi->nilai_prediksi;
                            }
                            ?>
                          </td>
                          <?php if($this->session->userdata('id_privilage') == 1): ?>
                          <td><a href="<?php echo site_url('ptn_controller/detail_prediksi/'.$row->kode_ptn.'/'.$row->kode_prodi) ?>" class="btn btn-info btn-sm">Detail</a></td>
                          <?php endif ?>
                        </tr>
                        <?php } }else{ ?>
                        <!-- <tr><td colspan="4">No member(s)</td></tr> -->
                        <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
            <div id ="soshum" class="tab-pane fade">
              <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th>Kode Prodi</th>
                          <th>Nama Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $this->db->query("SELECT * FROM prodi_fakultas WHERE kode_ptn = $kode_ptn AND jenis = 'Soshum' ORDER BY kode_prodi")->result();
                        if(count($query)>0){
                        foreach($query as $row){ ?>
                        <tr>
                          <td><?php echo $row->kode_prodi; ?></td>
                          <td><?php echo $row->nama_prodi; ?></td>
                        </tr>
                        <?php } }else{ ?>
                        <tr><td colspan="4">Tidak ada data</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
  </section>
</div>
<?php $this->load->view('includes/footer') ?>
