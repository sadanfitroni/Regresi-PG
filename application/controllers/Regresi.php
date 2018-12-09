<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Regresi
 * @author : Sadan Fitroni
 * @version : 1.0
 * @since : 20 Juni 2016
 */
    /**
     * This is default constructor of the class
     */
class Regresi extends CI_Controller
{
    var $ptn = [[]];
    var $prodi = [[]];
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ptn_model');
        $this->load->model('Dataset_model');
        $this->load->model('Prodi_model');
    }
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        //$this->Regresi();
        $this->load->view('data_test'); 
    }

    public function get_ptn(){
        $query = $this->Ptn_model->getAllPtn();
        $i = 0;
        foreach ($query as $row) {
            $this->ptn[$i][0] = $row->kode_ptn;
            $this->ptn[$i][1] = $row->nama_ptn;
            $i++;
        }
    }

    public function Regresi(){

        $this->get_ptn();
        $slope_b1 = 0;              // variabel koefisien regresi b1
        $slope_b2 = 0;              // variabel koefisien regresi b2
        $coeficient_a = 0;          // intercept alfa
        foreach ($this->ptn as $ptn){
            $data_prodi = $this->Prodi_model->getProdiFakultas($ptn[0]);
            foreach ($data_prodi as $prodi) {
                //echo 'Kode_Prodi - '.$prodi->kode_prodi.'<br>';
                $data_set = $this->Dataset_model->getDataset($ptn[0], $prodi->kode_prodi);

                $ResultX1Y = 0;     // menampung hasil akhir X1Y
                $ResultX2Y = 0;     // menampung hasil akhir X2Y
                $ResultX1X2 = 0;    // menampung hasil akhir X1X2
                $ResultX1X1 = 0;    // menampung hasil akhir X1^2
                $ResultX2X2 = 0;    // menampung hasil akhir X2^2
                $ResultYY = 0;      // menampung hasil akhir Y^2
                $avrX1 = 0;         // Rata-rata X1
                $avrX2 = 0;         // Rata-rata X2
                $avrY = 0;          // Rata-rata Y
                $TotalX1 = 0;       // Total X1
                $TotalX2 = 0;       // Total X2
                $TotalY = 0;        // Total Y
                if(!empty($data_set)){
                    $count = 0;
                    foreach ($data_set as $nilai) {
                        $X1Y = $nilai->daya_tampung * $nilai->pg;
                        $X2Y = $nilai->jumlah_peminat * $nilai->pg;
                        $X1X2 = $nilai->daya_tampung * $nilai->jumlah_peminat;
                        $X1X1 = $nilai->daya_tampung * $nilai->daya_tampung;
                        $X2X2 = $nilai->jumlah_peminat * $nilai->jumlah_peminat;
                        $YY = $nilai->pg * $nilai->pg;
                        $X1 = $nilai->daya_tampung;
                        $X2 = $nilai->jumlah_peminat;
                        $xy = $nilai->pg;
                        $ResultX1Y = $X1Y + $ResultX1Y;
                        $ResultX2Y = $X2Y + $ResultX2Y;
                        $ResultX1X2 = $X1X2 + $ResultX1X2;
                        $ResultX1X1 = $X1X1 + $ResultX1X1;
                        $ResultX2X2 = $X2X2 + $ResultX2X2;
                        $ResultYY = $YY + $ResultYY;
                        $TotalX1 = $nilai->daya_tampung + $TotalX1;
                        $TotalX2 = $nilai->jumlah_peminat + $TotalX2;
                        $TotalY = $nilai->pg + $TotalY;
                        $avrX1 = $nilai->daya_tampung + $avrX1;
                        $avrX2 = $nilai->jumlah_peminat + $avrX2;
                        $avrY = $nilai->pg + $avrY;
                        $count++;
                    }

                    // echo "<br>=============================";
                    // echo "<br>TotalX1 : $TotalX1";
                    // echo "<br>TotalX2 : $TotalX2";
                    //echo "<br>TotalY : $TotalY";
                    // echo "<br>=============================";
                    $avrX1 = $avrX1/$count;
                    $avrX2 = $avrX2/$count;
                    $avrY = $avrY/$count;

                    // echo "<br>Rata-rata X1 : $avrX1";
                    // echo "<br>Rata-rata X2 : $avrX2";
                    // echo "<br>Rata-rata Y  : $avrY";
                    // echo "<br>=============================";
                    // echo "<br>ResultX1Y : $ResultX1Y";
                    // echo "<br>ResultX2Y : $ResultX2Y";
                    // echo "<br>ResultX1X2  : $ResultX1X2";
                    // echo "<br>ResultX1X1 : $ResultX1X1";
                    // echo "<br>ResultX2X2 : $ResultX2X2";
                    // echo "<br>ResultYY  : $ResultYY";
                    // echo "<br>=============================";

                    $sigmaYsquare = $ResultYY - ($count* pow($avrY,2));         //∑y^2
                    $sigmax1square = $ResultX1X1 - ($count * pow($avrX1,2));    //∑x1^2
                    $sigmax2square = $ResultX2X2 - ($count * pow($avrX2, 2));   //∑x2^2
                    $sigmax1y = $ResultX1Y - ($count*$avrX1*$avrY);             //∑x1y
                    $sigmax2y = $ResultX2Y - ($count*$avrX2*$avrY);             //∑x2y
                    $sigmax1x2 = $ResultX1X2 - ($count*$avrX1*$avrX2);          //∑x1x2

                    // echo "<br>sigmaYsquare : $sigmaYsquare";
                    // echo "<br>sigmax1square  : $sigmax1square";
                    // echo "<br>sigmax2square : $sigmax2square";
                    // echo "<br>sigmax1y : $sigmax1y";
                    // echo "<br>sigmax2y  : $sigmax2y";
                    // echo "<br>sigmax1x2  : $sigmax1x2";
                    // echo "<br>=============================";

                    $slope_b1 = (($sigmax2square*$sigmax1y) - $sigmax1x2*$sigmax2y)/($sigmax1square*$sigmax2square - pow($sigmax1x2, 2)); //
                    $slope_b2 = (($sigmax1square*$sigmax2y) - $sigmax1x2*$sigmax1y)/($sigmax1square*$sigmax2square - pow($sigmax1x2, 2)); //
                    $coeficient_a = $avrY - ($slope_b1*$avrX1) - ($slope_b2*$avrX2);
                    echo "<br>Koeficient_b1  : ".number_format($slope_b1,9);
                    echo "<br>Koeficient_b2  : ".number_format($slope_b2,9);
                    echo "<br>Intercept a    : ".number_format($coeficient_a,2);
                    echo '<br>==============================';
                    $this->statistik_regresi($sigmaYsquare,$slope_b1, $slope_b2, $sigmax1y, $sigmax2y);
                    $this->ukuran_prediksi($TotalY, $slope_b1, $slope_b2, $coeficient_a);
                }
            }
        }
    }

    public function ukuran_prediksi($TotalY,$slope_b1, $slope_b2, $coeficient_a)
    {
        $this->get_ptn();
        foreach ($this->ptn as $ptn) {
            $data_prodi = $this->Prodi_model->getProdiFakultas($ptn[0]);
            foreach ($data_prodi as $prodi) {
              $data_set = $this->Dataset_model->getDataset($ptn[0], $prodi->kode_prodi);

              $sigmaResidual = 0;           // Menampung jumlah akhir residual
              $sum_nilai_aktual = 0;        // Menampung jumlah akhir nilai aktual
              $sigmaResidualSquare = 0;     // Menampung jumlah residual kuadrat

              if(!empty($data_set)) {
                $i = 0;
                foreach ($data_set as $nilai){

                    $prediksi = $coeficient_a + ($slope_b1*$nilai->daya_tampung) + ($slope_b2*$nilai->jumlah_peminat);
                    $residual = $prediksi - $nilai->pg;
                    $residual = abs($residual);
                    $nilai_aktual = $nilai->pg;
                    $sum_nilai_aktual = $nilai->pg + $sum_nilai_aktual;
                    $sigmaResidual = $residual + $sigmaResidual;
                    $sigmaResidualSquare = pow($residual, 2) + $sigmaResidualSquare;
                    $i++;
                }
                $cekPrediksi = $this->db->get_where('hasil_prediksi', array('thn' => $nilai->tahun, 'kode_ptn' => $ptn[0], 'kode_prodi' => $prodi->kode_prodi))->row();
                
                if(empty($cekPrediksi)){
                  $data = array(
                    'id_hasil' => '',
                    'kode_prodi' => $prodi->kode_prodi,
                    'kode_ptn' => $ptn[0],
                    'thn' => $nilai->tahun,
                    'd_tampung' => $nilai->daya_tampung,
                    'jum_peminat' => $nilai->jumlah_peminat,
                    'nilai_prediksi' => $prediksi,
                    'error' => $residual
                  );
                  $this->db->insert('hasil_prediksi', $data);
                }

                // echo "<br>sigmaResidualSquare:".number_format($sigmaResidualSquare,3);
                //echo "<br>SigmaResidual :".number_format($sigmaResidual,2);
                // echo "<br>Total Y : $TotalY";
                // echo "<br> Prediksi :".number_format($prediksi,2);
                //echo "<br> Residual :".number_format($residual,2);
                $mad = $sigmaResidual/$i;
                $mse = $sigmaResidualSquare/$i;
                $mape = (($sigmaResidual/$TotalY) * 100)/5;
                // echo "<br>TotalY : $TotalY";
                echo "<br>==============================" ;
                echo "<br> Nilai MAD :".number_format($mad,2);
                echo "<br> Nilai MSE :".number_format($mse,2);
                echo "<br> Nilai MAPE :".number_format($mape,2); echo "%";
                echo "<br>==============================" ;
                $cekUkuranPrediksi = $this->db->get_where('ukuran_prediksi', array('kode_ptn' => $ptn[0], 'kode_prodi' => $prodi->kode_prodi))->row();

                if(empty($cekUkuranPrediksi)){
                  $data = array(
                    'kode_prodi' => $prodi->kode_prodi,
                    'kode_ptn' => $ptn[0],
                    'mad' => $mad,
                    'mse' => $mse,
                    'mape' => $mape,
                  );
                  $this->db->insert('ukuran_prediksi', $data);
                }
                else{
                    $data = array(
                      'mad' => $mad,
                      'mse' => $mse,
                      'mape' => $mape,
                    );
                    $this->db->where('kode_ptn', $ptn[0]);
                    $this->db->where('kode_prodi', $prodi->kode_prodi);
                    $this->db->update('ukuran_prediksi', $data);
                }
              }
            }
        }
    }
        /*
            Fungsi untuk menghitung nilai statistik regresi
        */
    function statistik_regresi($sigmaYsquare,$slope_b1, $slope_b2, $sigmax1y, $sigmax2y)
    {
        $this->get_ptn();
        foreach ($this->ptn as $ptn) {
            $data_prodi = $this->Prodi_model->getProdiFakultas($ptn[0]);
            if (!empty($data_prodi)) {
                 $count = 0;
                    foreach ($data_prodi as $prodi) {
                      $data_set = $this->Dataset_model->getDataset($ptn[0], $prodi->kode_prodi);
                      if(!empty($data_set)) {
                        foreach ($data_set as $nilai){
                          $Se = sqrt(($sigmaYsquare-(($slope_b1*$sigmax1y)+$slope_b2*($sigmax2y)))/2);
                          $multipleR = sqrt(($slope_b1*$sigmax1y+$slope_b2*$sigmax2y)/$sigmaYsquare);
                          $Rsquare =($slope_b1*$sigmax1y+$slope_b2*$sigmax2y)/$sigmaYsquare;
                          $adjustedRsquare =(1-(1-$Rsquare)*(5-1)/(5-2-1));
                          $count++;
                        }

                        echo "<br>=============================";
                        echo "<br>MultipleR: ".number_format($multipleR,9);
                        echo "<br>Rsquare: ".number_format($Rsquare,9);
                        echo "<br>adjustedRsquare: ".number_format($adjustedRsquare,9);
                        echo "<br>Standar Error: ".number_format($Se,9);
                        echo "<br>==============================";

                        $cekStatistikPrediksi = $this->db->get_where('statistik_regresi', array('kode_ptn' => $ptn[0], 'kode_prodi' => $prodi->kode_prodi))->row();

                        if(empty($cekStatistikPrediksi)){
                          $data = array(
                            'kode_prodi' => $prodi->kode_prodi,
                            'kode_ptn' => $ptn[0],
                            'r' => $multipleR,
                            'rsquare' => $Rsquare,
                            'adjustedrsquare' => $adjustedRsquare,
                            'standar_error' => $Se
                          );
                          $this->db->insert('statistik_regresi', $data);
                        }
                        else{
                            $data = array(
                              'r' => $multipleR,
                              'rsquare' => $Rsquare,
                              'adjustedrsquare' => $adjustedRsquare,
                              'standar_error' => $Se
                            );
                            $this->db->where('kode_ptn', $ptn[0]);
                            $this->db->where('kode_prodi', $prodi->kode_prodi);
                            $this->db->update('statistik_regresi', $data);
                        }
                    }
                }
            }
        }
    }
}
?>
