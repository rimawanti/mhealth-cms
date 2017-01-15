<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Prediksi;
use App\Pasien;
use App\Training;
use Session;
use DB;
use Storage;

set_time_limit(0);

error_reporting(E_ALL);
define('NUM_FEATURES', 24);

class PrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prediksis = Prediksi::paginate(10);
    
        return view('Prediksi/index')->with('prediksis',$prediksis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listpasien = Pasien::pluck('nama', 'id');
        return view('Prediksi/create')->with('listpasien',$listpasien);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, array(
            'pasien_id' => 'required',
            
            ));

        //store to database
        $prediksi = new Prediksi;

        $prediksi->pasien_id = $request->pasien_id;
        $prediksi->gender =  $request->gender;
        $prediksi->marital_status =  $request->marital_status;
        $prediksi->age =  $request->age;
        $prediksi->is_kontrasepsi_umum =  $request->is_kontrasepsi_umum;
        $prediksi->is_kontrasepsi_lain=  $request->is_kontrasepsi_lain;
        $prediksi->is_now_kontrasepsi_umum =  $request->is_now_kontrasepsi_umum;
        $prediksi->is_now_kontrasepsi_lain =  $request->is_now_kontrasepsi_lain;
        $prediksi->IS_VC = $request->IS_VC;
        $prediksi->age_of_mens =  $request->age_of_mens;
        $prediksi->is_lamentation_nipple  =  $request->is_lamentation_nipple;
        $prediksi->is_lamentation_liquid =  $request->is_lamentation_liquid;
        $prediksi->is_lamentation_skinchange =  $request->is_lamentation_skinchange;
        $prediksi->is_lamentation_lump =  $request->is_lamentation_lump;
        $prediksi->is_lamentation_other =  $request->is_lamentation_other;
        $prediksi->is_hist_fam_of_cancer =  $request->is_hist_fam_of_cancer;
        $prediksi->is_diabetes =  $request->is_diabetes;
        $prediksi->duration_of_lamentation =  $request->duration_of_lamentation;
        $prediksi->IS_USG =  $request->IS_USG;
        $prediksi->IS_MAMMOGRAPHY =  $request->IS_MAMMOGRAPHY;
        $prediksi->IS_VC =  $request->IS_VC;
        $prediksi->IS_HPA =  $request->IS_HPA;
        $prediksi->IS_IHC =  $request->IS_IHC;
        $prediksi->IS_IOC =  $request->IS_IOC;
        $prediksi->IS_SITOLOGI =  $request->IS_SITOLOGI;
        $prediksi->IS_FNA =  $request->IS_FNA;
        $prediksi->class =  $request->class;
        $prediksi->nilai =  $request->nilai;


        
        $prediksi->save();
        $request->session()->flash('success', 'The data was succesfully saved');

        //redirect to another page
        return redirect()->route('prediksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find post
        $prediksi = Prediksi::find($id);

        $listpasien = Pasien::pluck('nama', 'id');

        // return view
        return view('prediksi.edit',compact('prediksi', 'listpasien'));/*)->with('data',$data);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //vaidate data
       
        //save data to the database
        $prediksi = prediksi::find($id);

        $prediksi->$pasien_id =  $request->input('pasien_id');
        $prediksi->$gender =  $request->input('gender');
        $prediksi->$marital_status =  $request->input('marital_status');
        $prediksi->age =  $request->input('age');
        $prediksi->is_kontrasepsi_umum =  $request->input('is_kontrasepsi_umum');
        $prediksi->is_kontrasepsi_lain=  $request->input('is_kontrasepsi_lain');
        $prediksi->is_now_kontrasepsi_umum =  $request->input('is_now_kontrasepsi_umum');
        $prediksi->is_now_kontrasepsi_lain =  $request->input('is_now_kontrasepsi_lain');
        $prediksi->is_hist_fam_of_cancer =  $request->input('is_hist_fam_of_cancer');
        $prediksi->age_of_mens =  $request->input('age_of_mens');
        $prediksi->is_lamentation_nipple =  $request->input('is_lamentation_nipple');
        $prediksi->is_lamentation_liquid =  $request->input('is_lamentation_liquid');
        $prediksi->is_lamentation_skinchange =  $request->input('is_lamentation_skinchange');
        $prediksi->is_lamentation_lump =  $request->input('is_lamentation_lump');
        $prediksi->is_lamentation_other =  $request->input('is_lamentation_other');
        $prediksi->is_hist_fam_of_cancer =  $request->input('is_hist_fam_of_cancer');
        $prediksi->is_diabetes =  $request->input('is_diabetes');
        $prediksi->duration_of_lamentation =  $request->input('duration_of_lamentation');
        $prediksi->IS_USG =  $request->input('IS_USG');
        $prediksi->IS_MAMMOGRAPHY =  $request->input('IS_MAMMOGRAPHY');
        $prediksi->IS_VC =  $request->input('IS_VC');
        $prediksi->IS_HPA =  $request->input('IS_HPA');
        $prediksi->IS_IHC =  $request->input('IS_IHC');
        $prediksi->IS_IOC =  $request->input('IS_IOC');
        $prediksi->IS_SITOLOGI =  $request->input('IS_SITOLOGI');
        $prediksi->IS_FNA =  $request->input('IS_FNA');

        $prediksi->save();
        $request->session()->flash('success', 'The data was succesfully updated');

        //redirect to another page
        return redirect()->route('prediksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prediksi = prediksi::find($id);
        //Storage::delete($prediksi->foto);

        $prediksi->delete();
        Session::flash('success', 'The data was succesfully deleted');

         //redirect to another page
        return redirect()->route('prediksi.index');
    }

    public function lihatAkurasi()
    {
       
        return view('prediksi.akurasi');
    }

    /**
        Mulai perhitungan
    **/
    public function getData(Request $request){

        // start time
        $start = microtime(true);

        //get Inputan

        $marital =  $request->input('marital_status');
        $age =  $request->input('age');
        $is_kontrasepsi_umum =  $request->input('is_kontrasepsi_umum');
        $is_kontrasepsi_lain=  $request->input('is_kontrasepsi_lain');
        $is_now_kontrasepsi_umum =  $request->input('is_now_kontrasepsi_umum');
        $is_now_kontrasepsi_lain =  $request->input('is_now_kontrasepsi_lain');
        $is_hist_fam_of_cancer =  $request->input('is_hist_fam_of_cancer');
        $age_of_mens =  $request->input('age_of_mens');
        $is_lamentation_nipple =  $request->input('is_lamentation_nipple');
        $is_lamentation_liquid =  $request->input('is_lamentation_liquid');
        $is_lamentation_skinchange =  $request->input('is_lamentation_skinchange');
        $is_lamentation_lump =  $request->input('is_lamentation_lump');
        $is_lamentation_other =  $request->input('is_lamentation_other');
        $is_hist_fam_of_cancer =  $request->input('is_hist_fam_of_cancer');
        $is_diabetes =  $request->input('is_diabetes');
        $duration_of_lamentation =  $request->input('duration_of_lamentation');
        $IS_USG =  $request->input('IS_USG');
        $IS_MAMMOGRAPHY =  $request->input('IS_MAMMOGRAPHY');
        $IS_VC =  $request->input('IS_VC');
        $IS_HPA =  $request->input('IS_HPA');
        $IS_IHC =  $request->input('IS_IHC');
        $IS_IOC =  $request->input('IS_IOC');
        $IS_SITOLOGI =  $request->input('IS_SITOLOGI');
        $IS_FNA =  $request->input('IS_FNA');

        //var_dump($is_surgery); die();

        $param = array();
        $param = array($marital,$age,$is_kontrasepsi_umum,$is_kontrasepsi_lain,$is_now_kontrasepsi_umum,$is_now_kontrasepsi_lain, $is_hist_fam_of_cancer,$age_of_mens,$is_lamentation_nipple,$is_lamentation_liquid,$is_lamentation_skinchange,$is_lamentation_lump,$is_lamentation_other, $is_hist_fam_of_cancer, $is_diabetes, $duration_of_lamentation,$IS_USG,$IS_MAMMOGRAPHY,$IS_VC,$IS_HPA);
     
        $prediksiue = array();
        $prediksiue = $this->calculateRegresi($param);
        $class = $prediksiue[0];
        $nilai = $prediksiue[1];

       // var_dump($prediksiue); die();
        $nilai = number_format($nilai, 4, '.', '');

        //calculate query times
        $time_elapsed_secs = microtime(true) - $start;
        $time_elapsed_secs = number_format($time_elapsed_secs, 4, '.', '');

        $datas = json_encode(array('nilai'=>$nilai,'class' => $class,'time'=>$time_elapsed_secs));
        return $datas;
    }

    // PERHITUNGAN DIMULAI !!!! //
    public function retrieveDataT($f) 
    {
        //echo "f ".$f;
        if($f == 1){
            $t = Training::all()->makeHidden('class')->toArray();
            $facts = array_values(array_map('array_values', $t));
            return $facts;
        }

        else if($f == 2) {
            $label = Training::all()->pluck('class')->toArray();
      
            return $label;
        }
       
        
    }
    public function calculateRegresi($dataTest)
    {

        $training = $this->retrieveDataT(1);
        $labels = $this->retrieveDataT(2);
        /*echo "<pre>";
        print_r($labels);*/


        //$labels = $this->retrieveDataT('label.csv');

       /*$training = array(
            array(1,1,50,1,1,1,0,1,0,0,1,0,1,0,0,0,0,0,1,0,10,1,0,1),
            array(1,1,55,2,1,0,1,0,1,0,1,1,1,2,0,1,2,3,2,0,1030,0,1,0),
            array(0,3,60,2,2,1,1,1,1,1,0,2,3,0,2,1,3,0,1,3,900,1,1,1),
            array(0,0,60,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,600,0,0,0),
            array(1,1,30,2,1,2,1,0,1,1,1,1,1,2,0,1,2,3,2,1,200,0,1,0),
            
            
        );
        $labels = array(
            0.,
            1.,
            1.,
            0.,
            1
          
            
        );*/
        $NUM_SAMPLES = sizeof($training);
        // Initialize the weights array to random starting ues.
        // There are always 1+NUM_FEATURES weights, because the first weight
        // does not correspond to a feature ue, since:
        //   weights * features = weight0 + weight1 * feature1 + weight2 * feature2 + ...
        $weights = array();
        for ($j=0; $j < NUM_FEATURES+1; $j++)
            $weights[$j] = mt_rand()/mt_getrandmax();
        // Calculate the data we need for feature scaling (mean/variance)
        $scaling = $this->calc_feature_scaling($training);
        $learning_rate = 0.05;
        $steps = 200; // number of steps to take for gradient descent
        $temp = array(); // temp array to hold updates for weights during the loop
        for ($n = 0; $n < $steps; $n++) {
            // For each weight, perform the gradient descent step and save the result to temp
            for ($j = 0; $j < NUM_FEATURES+1; $j++) {
                $sum_m = 0.0;
                for ($i = 0; $i < $NUM_SAMPLES; $i++) {
                    $scaled_data = $this->scale($training[$i], $scaling);
                    $h = $this->hypothesis($scaled_data, $weights);
                    // The first weight has a dummy 1 "feature" ue
                    $part = ($h - $labels[$i]) * ($j==0 ? 1.0 : $scaled_data[$j-1]);
                    $sum_m = $sum_m + $part;
                }
                $temp[$j] = $weights[$j] - $learning_rate * $sum_m/$NUM_SAMPLES;
            }
            $weights = $temp;
        }
       /* echo "Executed $n steps\n";
        echo "\nWeights: ", $this->vector_to_str($weights), "\n";*/
        

        // Try some predictions
        //print "\nTesting the model\n";
        $test = array();
        $test = $dataTest;
        /*$test = array(-11., 2.6, 1.,0.);*/
        //

        /*for ($i = 0; $i < sizeof($test); $i++) {*/
            $predict = $this->predict($this->scaleOne($test, $scaling), $weights);
            $precentage = $this->showPrecentage($this->scaleOne($test, $scaling), $weights);
            $ue = array($predict,$precentage);
            return $ue;
        /*}*/
    }

    function hypothesis($x, $weights)
    {
        $score = $weights[0]; // free weight
        $k = sizeof($x);
        // Calculate dot product
        for ($i = 0; $i < $k; $i++)
            $score += $weights[$i+1] * $x[$i];
        // Run through the sigmoid (logistic) function
        return 1.0/(1.0 + exp(-$score));
    }

    function predict($input, $weights) 
    {
        $output = $this->hypothesis($input, $weights);
        // Threshold on 0.5
        if ($output >= 0.50)
            $predict = 1;
        else
            $predict = 0;
        return $predict;
    }

    function showPrecentage($input, $weights)
    {
        $output = $this->hypothesis($input, $weights);
        
        return $output*100;
    }

    function scaleOne ($input, $scaling)
    {
        for($i=0;$i<count($input);$i++){
            $input[$i] = ($input[$i] - $scaling['mean'][$i]) /
                        $scaling['variance'][$i];
        }
        return $input;
    }

    function scale($input, $scaling)
    {
        foreach ($input as $f => &$ue) {
            $ue = ($ue - $scaling['mean'][$f]) /
                        $scaling['variance'][$f];
        }
        return $input;
    }

    function calc_feature_scaling($data)
    {
        $mins = array_fill(0, NUM_FEATURES, INF);
        $maxs = array_fill(0, NUM_FEATURES, -INF);
        $sums = array_fill(0, NUM_FEATURES, 0);
        $scaling = array('mean' => array(),
                         'variance' => array());
        $N = sizeof($data);
        foreach ($data as $i => $row) {
            foreach ($row as $f => $ue) {
                if ($ue > $maxs[$f])
                    $maxs[$f] = $ue;
                if ($ue < $mins[$f])
                    $mins[$f] = $ue;
                $sums[$f] += $ue;
            }
        }
        for ($f = 0; $f < NUM_FEATURES; $f++) {
            $scaling['mean'][$f] = $sums[$f] / $N;
            $scaling['variance'][$f] = $maxs[$f] - $mins[$f];
            if ($scaling['variance'][$f] == 0)
                throw new Exception("Feature #$f has the same ue in all the samples, inid data");
        }
        return $scaling;
    }

    function vector_to_str($x)
    {
        return '['.implode(", ", $x).']';
    }

    public function getDataPrediksi($uid){
        $id = DB::table('prediksis')->orderBy('updated_at','desc')->where('pasien_id', $uid)->pluck('id')->first();
        
       
        $j =0;
      
        $pem = Prediksi::find($id);
        
        $datass = json_encode(array('data_prediksi'=>$pem));
        //$datass = json_encode(array('data_jadwal'=>$row));
        return $datass;

    }
}
