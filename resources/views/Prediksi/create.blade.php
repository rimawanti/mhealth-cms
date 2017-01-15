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
  top: 80%;
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
  left: 40%;
  top: 87%;
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
						 	<!-- 1 -->
						 	<div class="form-group">
							 	{{ Form::label ('marital_status_label','Marital Status',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('marital_status',['Lajang'=>'Lajang','Menikah'=>'Menikah','janda'=>'Janda/Duda'],'Lajang',array('class' => 'form-control','id' => 'marital_status')) }}
							 	</div>
						 	</div>
						   <!-- 2 -->
						 	<div class="form-group">
							 	{{ Form::label ('age_label','Masukkan Umur',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::number('age',null,array('class' => 'form-control','placeholder'=>'Place your Age here','id'=>'age')) }}
							 	</div>
						 	</div>
						 	<!-- 3 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_kontrasepsi_umum_label','Apakah pernah kontrasepsi pil/suntik/IUD',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_kontrasepsi_umum','no',true,array('id' => 'is_kontrasepsi_umum')) }} No
							 		{{ Form::radio('is_kontrasepsi_umum','yes',false,array('id' => 'is_kontrasepsi_umum')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 4 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_kontrasepsi_lain_label','Apakah pernah kontrasepsi lain?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_kontrasepsi_lain','no',true,array('id' => 'is_kontrasepsi_lain')) }} No
							 		{{ Form::radio('is_kontrasepsi_lain','yes',false,array('id' => 'is_kontrasepsi_lain')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 5 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_now_kontrasepsi_umum_label','Apakah sekarang kontrasepsi pil/suntik/IUD',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_now_kontrasepsi_umum','no',true,array('id' => 'is_now_kontrasepsi_umum')) }} Yes
							 		{{ Form::radio('is_now_kontrasepsi_umum','yes',false,array('id' => 'is_now_kontrasepsi_umum')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 6 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_now_kontrasepsi_lain_label','Apakah sekarang kontrasepsi lain?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_now_kontrasepsi_lain','no',true,array('id' => 'is_now_kontrasepsi_lain')) }} No
							 		{{ Form::radio('is_now_kontrasepsi_lain','yes',false,array('id' => 'is_now_kontrasepsi_lain')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 7 -->
						 	<div class="form-group">
							 	{{ Form::label ('status_hormonal_label','Status hormonal',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 	{{ Form::select('status_hormonal',['pre'=>'Pre Menopause','post'=>'Post Menopause','unknown'=>'Unknown'],'pre',array('class' => 'form-control','id'=>'status_hormonal')) }}
							 	</div>
						 	</div>
						 	<!-- 8 -->
						 	<div class="form-group">
							 	{{ Form::label ('age_of_mens_label','Umur Menstruasi pertama kali',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::number('age_of_mens',null,array('class' => 'form-control','placeholder'=>'Place the number  here','id'=>'age_of_mens')) }}
							 	</div>
						 	</div>
						 	<!-- 9 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_lamentation_nipple_label','Apakah puting payudara tertarik ke dalam?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_lamentation_nipple','no',true,array('id' => 'is_lamentation_nipple')) }} No
							 		{{ Form::radio('is_lamentation_nipple','yes',false,array('id' => 'is_lamentation_nipple')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 10 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_lamentation_liquid_label','Apakah keluar cairan pada payudara?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_lamentation_liquid','no',true,array('id' => 'is_lamentation_liquid')) }} No
							 		{{ Form::radio('is_lamentation_liquid','yes',false,array('id' => 'is_lamentation_liquid')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 11 -->
					 	 	<div class="form-group">
							 	{{ Form::label ('is_lamentation_skinchange_label','Apakah ada perubahan pada kulit payudara?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_lamentation_skinchange','no',true,array('id' => 'is_lamentation_skinchange')) }} No
							 		{{ Form::radio('is_lamentation_skinchange','yes',false,array('id' => 'is_lamentation_skinchange')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 12 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_lamentation_lump_label','Apakah ada benjolan di payudara?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_lamentation_lump','yes',true,array('id' => 'is_lamentation_lump')) }} Yes
							 		{{ Form::radio('is_lamentation_lump','no',false,array('id' => 'is_lamentation_lump')) }} No
							 	</div>
						 	</div>
						 	<!-- 13 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_lamentation_other_label','Apakah ada keluhan lain di payudara?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_lamentation_other','no',true,array('id' => 'is_lamentation_other')) }} No
							 		{{ Form::radio('is_lamentation_other','yes',false,array('id' => 'is_lamentation_other')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 14 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_hist_fam_of_label','Memiliki keluarga dengan riwayat kanker?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_hist_fam_of_cancer','no',true,array('id' => 'is_hist_fam_of_cancer')) }} No
							 		{{ Form::radio('is_hist_fam_of_cancer','yes',false,array('id' => 'is_hist_fam_of_cancer')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 15 -->
						 	<div class="form-group">
							 	{{ Form::label ('is_diabetes_label','Penderita diabetes?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('is_diabetes','no',true,array('id' => 'is_diabetes')) }} No
							 		{{ Form::radio('is_diabetes','yes',false,array('id' => 'is_diabetes')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 16 -->
						 	<div class="form-group">
							 	{{ Form::label ('duration_of_lamentation_label','Lama keluhan yang dirasakan',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 	{{ Form::select('duration_of_lamentation',['9-12 bulan'=>'9-12 bulan','lebih dari 1 tahun'=>'Lebih dari 1 tahun','1-4 bulan'=>'1-4 bulan','unknown'=>'Tidak diketahui/None','kurang dari 1 bulan'=>'Kurang dari 1 bulan','5-8 bulan'=>'5-8 bulan'],'kurang dari 1 bulan',array('class' => 'form-control','id'=>'duration_of_lamentation')) }}
							 	</div>
						 	</div>
						 	<!-- 17 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_USG_LABEL','Menjalani pemeriksaan USG?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_USG','yes',true,array('id' => 'IS_USG')) }} Yes
							 		{{ Form::radio('IS_USG','no',false,array('id' => 'IS_USG')) }} No
							 	</div>
						 	</div>
						 	<!-- 18 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_MAMMOGRAPHY_LABEL','Menjalani pemeriksaan mamografi?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_MAMMOGRAPHY','no',true,array('id' => 'IS_MAMMOGRAPHY')) }} No
							 		{{ Form::radio('IS_MAMMOGRAPHY','yes',false,array('id' => 'IS_MAMMOGRAPHY')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 19 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_VC_LABEL','Menjalani pemeriksaan frozen section / Vries Coupe ?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_VC','yes',true,array('id' => 'IS_VC')) }} Yes
							 		{{ Form::radio('IS_VC','no',false,array('id' => 'IS_VC')) }} No
							 	</div>
						 	</div>
						 	<!-- 20 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_HPA_LABEL','Menjalani pemeriksaan HPA ?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_HPA','no',true,array('id' => 'IS_HPA')) }} No
							 		{{ Form::radio('IS_HPA','yes',false,array('id' => 'IS_HPA')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 21 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_IHC_LABEL','Menjalani pemeriksaan IHC Test ?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_IHC','no',true,array('id' => 'IS_IHC')) }} No
							 		{{ Form::radio('IS_IHC','yes',false,array('id' => 'IS_IHC')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 22 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_IOC_LABEL','Menjalani pemeriksaan IOC ?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_IOC','no',true,array('id' => 'IS_IOC')) }} No
							 		{{ Form::radio('IS_IOC','yes',false,array('id' => 'IS_IOC')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 23 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_SITOLOGI_LABEL','Menjalani pemeriksaan Cytologi ?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_SITOLOGI','no',true,array('id' => 'IS_HPA')) }} No
							 		{{ Form::radio('IS_SITOLOGI','yes',false,array('id' => 'IS_SITOLOGI')) }} Yes
							 	</div>
						 	</div>
						 	<!-- 24 -->
						 	<div class="form-group">
							 	{{ Form::label ('IS_FNA_LABEL','Menjalani pemeriksaan FNA ?',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::radio('IS_FNA','no',true,array('id' => 'IS_FNA')) }} No
							 		{{ Form::radio('IS_FNA','yes',false,array('id' => 'IS_FNA')) }} Yes
							 	</div>
						 	</div>
						 	<!-- CLASS -->
						 	<div class="form-group" id="class_div">
							 	{{ Form::label ('class_label','Class',array('class' => 'col-md-2 control-label','id'=>'class_label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('class','It will shows yes or nah',array('class' => 'form-control','disable'=>'disable','id'=>'class')) }}
							 	</div>
						 	</div>
						 	<div class="form-group" id="nilai_div">
							 	{{ Form::label ('nilai_label','Nilai Prediksi',array('class' => 'col-md-2 control-label','id' => 'nilai_label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('nilai',null,array('id'=>'nilai','class' => 'form-control','placeholder'=>'Nilai prediksi...')) }}
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

       	if($('#age').val() == '' || $('#age_of_mens').val() == ''){
       		alert("Kolom umur dan usia awal menstruasi harus diisi !");
       	}
       	else if ($('#age_of_mens').val() <= 0 || $('#age_of_mens').val() >= 150 || $('#age').val() <= 0 || $('#age').val() >= 150 ){
			alert("Ada nilai yang tidak sesuai !");
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
	                	"is_kontrasepsi_umum" : getIndex("is_kontrasepsi_umum"),
	                	"is_kontrasepsi_lain"	: getIndex("is_kontrasepsi_lain"),
	                	"is_now_kontrasepsi_umum"	: getIndex("is_now_kontrasepsi_umum"),
	                	"is_now_kontrasepsi_lain"	: getIndex("is_now_kontrasepsi_lain"),
	                	"status_hormonal"	: getIndex("status_hormonal"),
	                	"age_of_mens" : $('#age_of_mens').val(),
	                	"is_lamentation_nipple"	: getIndexRadio('is_lamentation_nipple'),
	                	"is_lamentation_liquid"	: getIndexRadio('is_lamentation_liquid'),
	                	"is_lamentation_skinchange"	: getIndexRadio('is_lamentation_skinchange'),
	                	"is_lamentation_lump"	: getIndexRadio('is_lamentation_lump'),
	                	"is_lamentation_other"	: getIndex("is_lamentation_other"),
	                	"is_hist_fam_of_cancer"	: getIndex("is_hist_fam_of_cancer"),
	                	"is_diabetes"	: getIndex("is_diabetes"),
	                	"duration_of_lamentation"	: getIndex("duration_of_lamentation"),
	                	"IS_USG"	: getIndex("IS_USG"),
	                	"IS_MAMMOGRAPHY"	: getIndex("IS_MAMMOGRAPHY"),
	                	"IS_VC"	: getIndex("IS_VC"),
	                	"IS_HPA"	: getIndex("IS_HPA"),
	                	"IS_IHC"	: getIndex("IS_IHC"),
	                	"IS_IOC"	: getIndex("IS_IOC"),
	                	"IS_SITOLOGI"	: getIndex("IS_SITOLOGI"),
	                	"IS_FNA"	: getIndex("IS_FNA"),
	          
	                },
	                success: function(data)
	                {
	                    var data= $.parseJSON(data)
	                    document.getElementById("loader-no-spin").style.display = "none";
	                    document.getElementById("loader").style.display = "none"; 
	                 	$('#simpan').show();
	                    //alert(data.nilai)

	                    $('#nilai').val(data.nilai)
	                    $('#query_time').text("Calculating tooks "+data.time+" seconds")
	                    $('#nilai_div').attr('class','form-group has-success')

	                    if(data.class == 0){
	                    	//alert("NO")
	                    	var str = 'Normal/Jinak'
	                    	$('#class_div').attr('class','form-group has-success')
	                     	$('#class').val(str)
	                    } else {
	                    	var str1 = "Ganas"
	                    	$('#class_div').attr('class','form-group has-success')
	                     	$('#class').val(str1)
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

