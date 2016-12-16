<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Prediksi;
use App\Pasien;
use Session;

error_reporting(E_ALL);
define('NUM_FEATURES', 21);

class PrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prediksis = Prediksi::all();
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
        $prediksi->stage =  $request->stage;
        $prediksi->er=  $request->er;
        $prediksi->pr =  $request->pr;
        $prediksi->her_2 =  $request->her_2;
        $prediksi->is_surgery = $request->is_surgery;
        $prediksi->is_radioteraphy =  $request->is_radioteraphy;
        $prediksi->is_cemoteraphy  =  $request->is_cemoteraphy;
        $prediksi->is_otherteraphy =  $request->is_otherteraphy;
        $prediksi->behavior =  $request->behavior;
        $prediksi->basic_diagnosis =  $request->basic_diagnosis;
        $prediksi->distant_metastases1 =  $request->distant_metastases1;
        $prediksi->distant_metastases2 =  $request->distant_metastases2;
        $prediksi->grade =  $request->grade;
        $prediksi->clinical_extent =  $request->clinical_extent;
        $prediksi->laterality =  $request->laterality;
        $prediksi->angio_invasion =  $request->angio_invasion;
        $prediksi->status_hormonal =  $request->status_hormonal;
        $prediksi->difference_diagnosis =  $request->difference_diagnosis;
        $prediksi->class =  $request->input('class');
        $prediksi->nilai =  $request->input('nilai');


        
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
        $prediksi->stage =  $request->input('stage');
        $prediksi->er =  $request->input('er');
        $prediksi->pr =  $request->input('pr');
        $prediksi->her_2 =  $request->input('her_2');
        $prediksi->is_surgery =  $request->input('is_surgery');
        $prediksi->is_radioteraphy =  $request->input('is_radioteraphy');
        $prediksi->is_cemoteraphy =  $request->input('is_cemoteraphy');
        $prediksi->is_otherteraphy =  $request->input('is_otherteraphy');
        $prediksi->behavior =  $request->input('behavior');
        $prediksi->basic_diagnosis =  $request->input('basic_diagnosis');
        $prediksi->distant_metastases1 =  $request->input('distant_metastases1');
        $prediksi->distant_metastases2 =  $request->input('distant_metastases2');
        $prediksi->grade =  $request->input('grade');
        $prediksi->clinical_extent =  $request->input('clinical_extent');
        $prediksi->laterality =  $request->input('laterality');
        $prediksi->angio_invasion =  $request->input('angio_invasion');
        $prediksi->status_hormonal =  $request->input('status_hormonal');
        $prediksi->difference_diagnosis =  $request->input('difference_diagnosis');
        $prediksi->class =  $request->input('class');
        $prediksi->nilai =  $request->input('nilai');



       

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
    public function getData(Request $request){

        // start time
        $start = microtime(true);

        //get Inputan

        $gender =  $request->input('gender');
        $marital =  $request->input('marital_status');
        $age =  $request->input('age');
        $stage =  $request->input('stage');
        $er =  $request->input('er');
        $pr =  $request->input('pr');
        $her_2 =  $request->input('her_2');
        $is_surgery =  $request->input('is_surgery');
        $is_radioteraphy =  $request->input('is_radioteraphy');
        $is_cemoteraphy =  $request->input('is_cemoteraphy');
        $is_otherteraphy =  $request->input('is_otherteraphy');
        $behavior =  $request->input('behavior');
        $basic_diagnosis =  $request->input('basic_diagnosis');
        $distantmetastases1 =  $request->input('distant_metastases1');
        $distantmetastases2 =  $request->input('distant_metastases2');
        $grade =  $request->input('grade');
        $clinical_extent =  $request->input('clinical_extent');
        $laterality =  $request->input('laterality');
        $angio_invasion =  $request->input('angio_invasion');
        $status_hormonal =  $request->input('status_hormonal');
        $difference_diagnosis =  $request->input('difference_diagnosis');

        //var_dump($is_surgery); die();

        $param = array();
        $param = array($gender,$marital,$age,$stage,$er,$pr,$her_2,
                        $is_surgery,$is_radioteraphy,$is_cemoteraphy,$is_otherteraphy,$behavior,$basic_diagnosis,$distantmetastases1,
                        $distantmetastases2, $grade, $clinical_extent,$laterality,
                        $angio_invasion,$status_hormonal,$difference_diagnosis);
     
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
    function retrieveData() 
    {
        $file = fopen('training.csv', 'r');
        $dataTrain = array();

        while ($entries = fgetcsv($file)) {
            $dataTrain[] = $entries;
        }
        fclose($file);
        return $dataTrain;
    }
    public function calculateRegresi($dataTest)
    {

        //$train = retrieveData();

        $training = array(
            array(1,1,50,1,1,1,0,1,0,0,1,0,1,0,0,0,0,0,1,0,10),
            array(1,1,55,2,1,0,1,0,1,0,1,1,1,2,0,1,2,3,2,0,1030),
            array(0,3,60,2,2,1,1,1,1,1,0,2,3,0,2,1,3,0,1,3,900),
            array(0,0,60,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,600),
            array(1,1,30,2,1,2,1,0,1,1,1,1,1,2,0,1,2,3,2,1,200),
            
            
        );
        $labels = array(
            0.,
            1.,
            1.,
            0.,
            1
          
            
        );
        $NUM_SAMPLES = sizeof($training);
        // Initialize the weights array to random starting ues.
        // There are always 1+NUM_FEATURES weights, because the first weight
        // does not correspond to a feature ue, since:
        //   weights * features = weight0 + weight1 * feature1 + weight2 * feature2 + ...
        $weights = array();
        for ($j=0; $j < NUM_FEATURES+1; $j++)
            $weights[$j] = mt_rand()/mt_getrandmax()*5.0;
        // Calculate the data we need for feature scaling (mean/variance)
        $scaling = $this->calc_feature_scaling($training);
        $learning_rate = 0.05;
        $steps = 2000; // number of steps to take for gradient descent
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
}
