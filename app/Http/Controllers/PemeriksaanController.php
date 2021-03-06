<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use Image;
use DB;
use App\Pemeriksaan;
use App\Pasien;
use App\Dokter;
use App\Staff;
use App\Kategori;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pemeriksaans = Pemeriksaan::paginate(10);
        //return "lla";
        return view('pemeriksaan/index')->with('pemeriksaans',$pemeriksaans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listpasien = Pasien::pluck('nama', 'id');
        $listdokter = Dokter::pluck('nama','id');
        $liststaff = Staff::pluck('nama','id');
        $listkat = Kategori::pluck('nama','id');
        return view('pemeriksaan/create', compact('listpasien','listdokter','liststaff','listkat'));//->with('listpasien',$listpasien);
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
            'dokter_id' => 'required',
            'kategori_id'  => 'required',
            'foto' => 'sometimes | image'
            ));

        //store to database
        $pemeriksaan = new Pemeriksaan;

        $pemeriksaan->pasien_id = $request->pasien_id;
        $pemeriksaan->dokter_id =  $request->dokter_id;
        $pemeriksaan->petugas_id =  $request->petugas_id ;
        $pemeriksaan->tanggal =  $request->tanggal;
        $pemeriksaan->kategori_id =  $request->kategori_id;
        $pemeriksaan->tensi=  $request->tensi;
        $pemeriksaan->obat =  $request->obat;
        $pemeriksaan->treatment_lanjut =  $request->treatment_lanjut;
        $pemeriksaan->hasil = $request->hasil;



        if ($request->hasFile('foto')){

            $image = $request->file('foto');
            $filename = time().'-'.$request->kategori_id.'.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(300,600)->save($location);

            //$oldFileImage = $article->foto;

            $pemeriksaan->foto = $filename;

        }
        $pemeriksaan->save();
        $request->session()->flash('success', 'The data was succesfully saved');

        //redirect to another page
        return redirect()->route('pemeriksaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find id
        $pemeriksaan = Pemeriksaan::find($id);

        //return view
        return view('pemeriksaan.show')->with('pemeriksaan',$pemeriksaan);
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
        $pemeriksaan = Pemeriksaan::find($id);

        // return view
        $listpasien = Pasien::pluck('nama', 'id');
        $listdokter = Dokter::pluck('nama','id');
        $liststaff = Staff::pluck('nama','id');
        $listkat = Kategori::pluck('nama','id');

        return view('pemeriksaan.edit', compact('pemeriksaan','listpasien','listdokter','liststaff','listkat'));
        //return view('pemeriksaan.edit')->with('pemeriksaan',$pemeriksaan);
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
        //save data to the database
        $pemeriksaan = Pemeriksaan::find($id);

        $pemeriksaan->pasien_id = $request->input('pasien_id');
        $pemeriksaan->dokter_id =  $request->input('dokter_id');
        $pemeriksaan->petugas_id =  $request->input('petugas_id');
        $pemeriksaan->tanggal =  $request->input('tanggal');
        $pemeriksaan->kategori_id =  $request->input('kategori_id');
        $pemeriksaan->tensi=  $request->input('tensi');
        $pemeriksaan->obat =  $request->input('obat');
        $pemeriksaan->treatment_lanjut =  $request->input('treatment_lanjut');
        $pemeriksaan->hasil = $request->input('hasil');

        //
        if ($request->hasFile('foto')){

            $image = $request->file('foto');
            $filename = time().''.$request->input('kategori_id'). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(300,600)->save($location);

            $oldFileImage = $pemeriksaan->foto;

             //delete
            Storage::delete($oldFileImage);

            //updates
            $pemeriksaan->foto = $filename;

        }


        $pemeriksaan->save();
         Session::flash('success', 'The data was succesfully updated');

         //redirect to another page
        return redirect()->route('pemeriksaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $pemeriksaan = Pemeriksaan::find($id);
        Storage::delete($pemeriksaan->foto);

        $pemeriksaan->delete();
        Session::flash('success', 'The data was succesfully deleted');

         //redirect to another page
        return redirect()->route('pemeriksaan.index');
    }

    public function getDataRecord($uid){
        $id = DB::table('pemeriksaans')->orderBy('tanggal','desc')->where('pasien_id', $uid)->pluck('id');
        
        //$row = array();

        $j =0;
      
        foreach ($id as $i) {

            $pem = Pemeriksaan::find($i);
        
            $kat = $pem->kategori->nama;
            $tanggal = $pem->tanggal;
            $dokter = $pem->dokter->nama;
            //echo $i."</br>";
            $datas[$j] = array('kategori_id' => $kat, 'tanggal' => $tanggal,'dokter_id'=>$dokter,'record_id' => $i);
            //json_decode($datass);
            $j++;
            
        }
       
        $datass = json_encode(array('data_record'=>$datas));
        //$datass = json_encode(array('data_jadwal'=>$row));
        return $datass;
    }
    public function getDetailRecord($id){
                  
        $record = Pemeriksaan::find($id);

        //echo "record".$record;

        $dokter = $record->dokter->nama;
        $pasien = $record->pasien->nama;
        $petugas =  $record->petugas->nama;  
        $kategori = $record->kategori->nama;
        $tanggal = $record->tanggal;
        $hasil = $record->hasil;
        $obat = $record->obat;
        $treatment_lanjut = $record->treatment_lanjut;
        $foto = $record->foto;


        $data[0] = array('dokter'=>$dokter, 'pasien'  => $pasien, 'petugas' => $petugas,'kategori' => $kategori,'tanggal'=>$tanggal,'hasil'=>$hasil,'obat' => $obat, 'treatment_lanjut'=>$treatment_lanjut,'foto'=>$foto);
    
        $datas = json_encode(array('detail_record'=>$data[0]));

        return $datas;
     
    }
}
