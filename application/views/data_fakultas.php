<?php $this->load->view('includes/header') ?>

<div class="content-wrapper">
  <section class="content">
    <div class="panel panel-default">
      <div class="panel-heading">
        </div>
         <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                   <!--  <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i>Add New</a> -->
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>Kode Fakultas</th>
                      <th>Nama Fakultas</th>
                      <th>Hasil Prediksi</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $this->db->query("SELECT * FROM prodi_fakultas WHERE kode_ptn = $kode_ptn and kode_fakultas != '' and kode_prodi = '' ORDER BY kode_ptn")->result();
                    if(count($query)>0){
                    foreach($query as $row){ ?>
                    <tr>
                      <td><?php echo $row->kode_fakultas; ?></td>
                      <td><?php echo $row->nama_fakultas; ?></td>
                      <td></td>
                      <td>
                        <a href="<?php echo site_url('ptn_controller/prodi_fakultas/'.$row->kode_ptn.'/'.$row->kode_fakultas) ?>" class="btn btn-info btn-sm">Lihat Prodi</a>
                        <?php if($this->session->userdata('id_privilage') == 1): ?>
                        <a href="<?php echo site_url('ptn_controller/detail_prediksi/'.$row->kode_ptn) ?>" class="btn btn-info btn-sm">Detail</a>
                        <?php endif ?>
                      </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="4">No data</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
  </section>
</div>

<?php $this->load->view('includes/footer') ?>
