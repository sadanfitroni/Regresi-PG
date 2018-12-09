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
                      <th>Kode PTN</th>
                      <th>Wilayah</th>
                      <th>Nama PTN</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $this->db->query("SELECT * FROM perguruan_tinggi ORDER BY kode_ptn")->result();
                    if(count($query)>0){
                    foreach($query as $row){ ?>
                    <tr>
                      <td><?php echo $row->kode_ptn; ?></td>
                      <td><?php echo $row->wilayah; ?></td>
                      <td><?php echo $row->nama_ptn; ?></td>
                      <?php
                      $fakultas = $this->db->query("SELECT * FROM prodi_fakultas WHERE kode_ptn = $row->kode_ptn AND kode_fakultas != '' ")->result();
                      if(empty($fakultas)){
                      ?>
                        <td><a href="<?php echo site_url('ptn_controller/prodi/'.$row->kode_ptn) ?>" class="btn btn-info btn-sm">Lihat Prodi</a></td>
                      <?php
                      }else{
                      ?>
                        <td><a href="<?php echo site_url('ptn_controller/fakultas/'.$row->kode_ptn) ?>" class="btn btn-info btn-sm">Lihat Fakultas</a></td>
                      <?php } ?>
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
