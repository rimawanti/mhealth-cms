<!DOCTYPE html>
<html>
<head>
	<title>Data Prediksi</title>
</head>
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 70%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
#dimScreen
{
    position:fixed;
    padding:0;
    margin:0;

    top:0;
    left:0;

    width: 100%;
    height: 100%;
    background:rgba(255,255,255,0.5);
}
#loader-no-spin {
  position: absolute;
  left: 45%;
  top: 80%;
  z-index: 1;
  margin: -75px 0 0 -75px;
}


@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
<body>
@extends('partials.layout')


@section('content')
<div class="row">
	<div class="col-lg-12">		<h1 class="page-header"></h1>
			<div class="panel panel-info"> 
				 <div class="panel-heading">Create New Prediction</div>
				 	<div class="panel-body" id="form_all">
				 	<div id="loader-no-spin">
				 	<div id="dimScreen"> </div>
				 		<p> <h3> Calculating .. please wait! </h3></p> 
				 	</div>
				 	<div id="loader"> </div>
		
				 	<!-- panel body -->
				 	{!! Form::open(array('route' => 'prediksi.store','class' => 'form-horizontal','id'=>'predict_form')) !!}
					 	<fieldset>
						 		<div class="form-group">
							 	{{ Form::label ('nama_label','Nama Pasien',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('pasien_id',$listpasien,null,array('class' => 'form-control','placeholder'=>'Your Patient Name here','required'=>'required')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('gender_label','Gender',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 	
							 		{{ Form::radio('gender','Female',true,array('id' => 'gender')) }} Female
							 		{{ Form::radio('gender','Male',false,array('id' => 'gender')) }} Male
							 	
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('marital_status_label','Marital Status',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('marital_status',['Lajang'=>'Lajang','Menikah'=>'Menikah','Janda/Duda'=>'Janda/Duda'],'Lajang',array('class' => 'form-control','id' => 'marital_status')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('age_label','Masukkan Umur',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::number('age',null,array('class' => 'form-control','placeholder'=>'Place your Age here','id'=>'age')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('stage_label','Masukkan Stage',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('stage',['Nol'=>'Nol','1A'=>'1A','1B'=>'1B','2A'=>'2A','3A'=>'3A','3B'=>'3B','3C'=>'3C','4/IV'=>'4/IV','Unknown'=>'Unknown'],'Nol',array('class' => 'form-control','id'=>'stage')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('er_label','Masukkan ER',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('er',['Positive'=>'Positive','Negative'=>'Negative','Unknown'=>'Unknown'],'Positive',array('class' => 'form-control','id'=>'er')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('pr_label','Masukkan PR',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('pr',['Positive'=>'Positive','Negative'=>'Negative','Unknown'=>'Unknown'],'Positive',array('class' => 'form-control','id'=>'pr')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('her_2_label','Masukkan HER_2',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('her_2',['Nol'=>'Nol','Positive 1'=>'Positive 1','Positive 2'=>'Positive 2','Positive 3'=>'Positive 3','Unknown'=>'Unknown'],'Nol',array('class' => 'form-control','id'=>'her_2')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('is_surgery_label','Surgery',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_surgery','Yes',true,array('id' => 'is_surgery')) }} Yes
							 		{{ Form::radio('is_surgery','No',false,array('id' => 'is_surgery')) }} No
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('is_radioteraphy_label','Radioteraphy',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_radioteraphy','Yes',true,array('id' => 'is_radioteraphy')) }} Yes
							 		{{ Form::radio('is_radioteraphy','No',false,array('id' => 'is_radioteraphy')) }} No
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('is_cemoteraphy_label','Cemoteraphy',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_cemoteraphy','Yes',true,array('id' => 'is_cemoteraphy')) }} Yes
							 		{{ Form::radio('is_cemoteraphy','No',false,array('id' => 'is_cemoteraphy')) }} No
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('is_otherteraphy_label','Other teraphy',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_otherteraphy','Yes',true,array('id' => 'is_otherteraphy')) }} Yes
							 		{{ Form::radio('is_otherteraphy','No',false,array('id' => 'is_otherteraphy')) }} No
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('behavior_label','Masukkan Behavior',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('behavior',['Benign'=>'Benign','Uncertain'=>'Uncertain','Carcinoma In Situ' => 'Cancinoma In Situ','Malignant,primary site'=>'Malignant,primary site','Malignant,metastatic site'=>'Malignant,metastatic site','Malignant,uncertain'=>'Malignant,uncertain'],'Benign',array('class' => 'form-control','id'=>'behavior')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('basic_diagnosis_label','Most Valid Basic of Cancer Diagnosis',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('basic_diagnosis',['Clinical Only'=>'Clinical Only','Lab,Xray,Endoscopy,Isotopes,Angiography,EEG'=>'Lab,Xray,Endoscopy,Isotopes,Angiography,EEG','Histology of primary'=>'Histology of primary','Cytologi/Haematology '=>'Cytologi/Haematology','Specific biochemial/immunology tests'=>'Specific biochemial/immunology tests', 'Histology of metastasis' => 'Histology of metastasis','Unknown' => 'Unknown'],'Clinical Only',array('class' => 'form-control','id'=>'basic_diagnosis')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('distant_metastases1_label','Site of Distant Metastases 1',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('distant_metastases1',['None'=>'None','Distant lymph node'=>'Distant lymph node','Bone'=>'Bone','Liver'=>'Liver','Lung and/or Pleura'=>'Lung and/or Pleura','Ovary'=>'Ovary','Skin'=>'Skin','Other'=>'Other','Unknown'=>'Unknown'],'None',array('class' => 'form-control','id'=>'distant_metastases1')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('distant_metastases2_label','Site of Distant Metastases 2',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('distant_metastases2',['None'=>'None','Distant lymph node'=>'Distant lymph node','Bone'=>'Bone','Liver'=>'Liver','Lung and/or Pleura'=>'Lung and/or Pleura','Ovary'=>'Ovary','Skin'=>'Skin','Other'=>'Other','Unknown'=>'Unknown'],'None',array('class' => 'form-control','id'=>'distant_metastases2')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('grade_label','Grade',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('grade',['Well differentiated'=>'Well differentiated','Moderately differentiated'=>'Moderately differentiated','Poorly differentiated'=>'Poorly differentiated','Undifferentiated'=>'Undifferentiated','Not Applicable/unknown'=>'Not Applicable/unknown','Dedifferentiated'=>'Dedifferentiated'],'Well differentiated',array('class' => 'form-control','id'=>'grade')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('clinical_extent_label','Clinical extent of disease before treatment',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('clinical_extent',['Insitu'=>'Insitu','Localized'=>'Localized','Direct Extenson'=>'Direct Extension','Regional Lymph Node Involvement'=>'Regional Lymph Node Involvement','Direct Extension with regional lymph node involvement','Direct Extension with regional lymph node involvement','Distant Mestastases'=>'Distant Mestastases','Not Applicable'=>'Not Applicable','Unknown'=>'Unknown'],'Insitu',array('class' => 'form-control','id'=>'clinical_extent')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('laterality','Laterality',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('laterality_label',['Right'=>'Right','Left'=>'Left','Central'=>'Central','Bilateral'=>'Bilateral','Multiple'=>'Multiple','Not Applicable'=>'Not Applicable','Unknown' => 'Unknown'],'Right',array('class' => 'form-control','id'=>'laterality')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('angio_invasion_label','Angio Invasion',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 	{{ Form::select('angio_invasion',['Positive'=>'Positive','Negative'=>'Negative','Unknown'=>'Unknown'],'Positive',array('class' => 'form-control','id'=>'angio_invasion')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('status_hormonal_label','Status hormonal',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 	{{ Form::select('status_hormonal',['Pre Menopause'=>'Pre Menopause','Post Menopause'=>'Post Menopause','Not Applicable'=>'Not Applicable','Unknown'=>'Unknown'],'Pre Menopause',array('class' => 'form-control','id'=>'status_hormonal')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('difference_diagnosis_label','Difference of diagnosis and last contact date',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::number('difference_diagnosis',null,array('class' => 'form-control','placeholder'=>'Between 0-1232','id'=>'difference_diagnosis')) }}
							 	</div>
						 	</div>
						 	<div class="form-group" id="class_div">
							 	{{ Form::label ('class_label','Class',array('class' => 'col-md-2 control-label','id'=>'class_label')) }}
							 	<div class="col-md-9">
							 		{{ Form::label('class','It will shows yes or nah',array('class' => 'form-control','disable'=>'disable','id'=>'class')) }}
							 	</div>
						 	</div>
						 	<div class="form-group" id="nilai_div">
							 	{{ Form::label ('nilai_label','Nilai Prediksi',array('class' => 'col-md-2 control-label','id' => 'nilai_label')) }}
							 	<div class="col-md-9">
							 		{{ Form::label('nilai',null,array('id'=>'nilai','class' => 'form-control','placeholder'=>'Nilai prediksi...')) }}
							 	</div>
						 	</div>

						 	 <div class="todo-list">
								 <div class="todo-list-item">
							 	<button class="btn btn-primary" id="btn-todo" type="button">Hitung</button>
							 	
							 		{{ Form::submit('Simpan',array('class' => 'btn btn-success','id' => 'simpan'))}}
							 	</div>
							 </div>
						 	{{-- {!! Html::linkRoute('prediksi','Calculate',array(''),array('class'=> 'btn btn-primary pull-left')) !!} 
						 	{{ Form::submit('Simpan',array('class' => 'btn btn-success pull-left '))}} --}}
					 	</fieldset>
				 	{!! Form::close() !!}

				 	{{-- query took -x seconds --}}
				 	</br>
				 	
				 	<div class="form-group" id="query_time_div">
				 		<i>
					 	 {{ Form::label('',null,array('id'=>'query_time','class' => 'alert-bg-warning')) }}
						</i>
					</div>
				 	<!-- end panel body -->
					
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->	
</body>
</html>
@endsection

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">

</script>

<script type="text/javascript" > 

$(window).load(function() {  
	document.getElementById("loader-no-spin").style.display = "none"; 
	document.getElementById("loader").style.display = "none"; 
	$('#simpan').hide();
	
	
});
$(function(){
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       var isEmpty = false;

       $('#btn-todo').on("click",function() {

       	if($('#age').val() == '' || $('#difference_diagnosis').val() == ''){
       		alert("Kolom age dan difference_diagnosis harus diisi !");
       	}
       	else if ($('#difference_diagnosis').val() <= 0 || $('#difference_diagnosis').val() >= 1232 ){
			alert("Nilai pada difference_diagnosis tidak sesuai !");
       	}
    	    	
    	else {
	    	var status = $('#gender').val();
	       	
			document.getElementById("loader-no-spin").style.display = "block";
			document.getElementById("loader").style.display = "block"; 

		        $.ajax({
	                url: 'getData',
	                method: 'POST',
	                data: { 
	                	"_token" : CSRF_TOKEN,
	                	"gender" : getIndexRadio('gender'),
	                	"marital" : getIndex("marital_status"),
	                	"age" : $('#age').val(),
	                	"stage" : getIndex("stage"),
	                	"er"	: getIndex("er"),
	                	"pr"	: getIndex("pr"),
	                	"her_2"	: getIndex("her_2"),
	                	"is_surgery"	: getIndexRadio('is_surgery'),
	                	"is_radioteraphy"	: getIndexRadio('is_radioteraphy'),
	                	"is_cemoteraphy"	: getIndexRadio('is_cemoteraphy'),
	                	"is_otherteraphy"	: getIndexRadio('is_otherteraphy'),
	                	"behavior"	: getIndex("behavior"),
	                	"basic_diagnosis"	: getIndex("basic_diagnosis"),
	                	"distant_metastases1"	: getIndex("distant_metastases1"),
	                	"distant_metastases2"	: getIndex("distant_metastases2"),
	                	"grade"	: getIndex("grade"),
	                	"clinical_extent"	: getIndex("clinical_extent"),
	                	"laterality"	: getIndex("laterality"),
	                	"angio_invasion"	: getIndex("angio_invasion"),
	                	"status_hormonal"	: getIndex("status_hormonal"),
	                	"difference_diagnosis"	: $('#difference_diagnosis').val(),
	                },
	                success: function(data)
	                {
	                    var data= $.parseJSON(data)
	                    document.getElementById("loader-no-spin").style.display = "none";
	                    document.getElementById("loader").style.display = "none"; 
	                 	$('#simpan').show();
	                    //alert(data.nilai)

	                    $('#nilai').text(data.nilai)
	                    $('#query_time').text("Calculating tooks "+data.time+" seconds")
	                    $('#nilai_div').attr('class','form-group has-success')

	                    if(data.class == 0){
	                    	//alert("NO")
	                    	$('#class_div').attr('class','form-group has-success')
	                     	$('#class').text("No Evidence of Cancer")
	                    } else {
	                    	$('#class_div').attr('class','form-group has-success')
	                     	$('#class').text("Evidence of Cancer")
	                    }

	                }
	                /* error: function(xhr, ajaxOptions, thrownError)
	                {
	                	 document.getElementById("loader-no-spin").style.display = "none";
	                    document.getElementById("loader").style.display = "none"; 
	                    $('#query_time').text("Whoops! Something Went Wrong!")
	                }*/
	            });
	        }	
       	
       });

	}); 

	function getIndexRadio($opsi){

		var radioButtons = $("#predict_form input:radio[name='"+$opsi+"']");
		var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
		return selectedIndex;
				
	}  
    function getIndex($opsi) {
	    var x = document.getElementById($opsi).selectedIndex;
	    var y = document.getElementById($opsi).options;
	    //alert("Index: " + y[x].index + " is " + y[x].text);
	    return x;
	} 
	
</script>

