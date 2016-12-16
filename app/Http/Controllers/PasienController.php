<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pasien;
use Session;
use Image;
use Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasiens = Pasien::paginate(10);
             
        return view('Pasien/index')->with('pasiens',$pasiens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Pasien/create');
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
            'nama' => 'required',
            'email' => 'required | unique:pasiens',
            'password' => 'required | min:6',
            'alamat' => 'required | min:10',
            'nomor_hp' => 'required | min:12',
            'foto' => 'sometimes | image'

            ));

        //store to database
        $pasien = new Pasien;

        $pasien->nama                   = $request->nama;
        $pasien->password               = $request->password;
        $pasien->tempat_lahir           = $request->tempat_lahir;
        $pasien->tanggal_lahir          = $request->tanggal_lahir;
        $pasien->alamat                 = $request->alamat;
        $pasien->email                  = $request->email;
        $pasien->nomor_hp               = $request->nomor_hp;

        //save foto
        if ($request->hasFile('foto')){
            $image = $request->file('foto');
            $filename = time().'- '.$request->nama . '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(80,120)->save($location);

            $pasien->foto = $filename;
        }
        $pasien->save();
        $request->session()->flash('success', 'The data was succesfully saved');

        //redirect to another page
        return redirect()->route('pasien.index');

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
        $pasien = Pasien::find($id);

        //return view
        return view('pasien.show')->with('pasien',$pasien);
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
        $pasien = Pasien::find($id);

        // return view
        return view('pasien.edit')->with('pasien',$pasien);

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
        //validate data
        $this->validate($request, array(
            'nama' => 'required',
            'password' => 'required | min:6',
            'alamat' => 'required | min:10',
            'nomor_hp' => 'required | min:12',
            /*'foto' => 'image',*/

            ));

        //save data to the database
        $pasien = Pasien::find($id);

        $pasien->nama                  = $request->input('nama');
        $pasien->password              = $request->input('password');
        $pasien->tempat_lahir          = $request->input('tempat_lahir');
        $pasien->tanggal_lahir         = $request->input('tanggal_lahir');
        $pasien->alamat                = $request->input('alamat');
        $pasien->email                 = $request->input('email');
        $pasien->nomor_hp              = $request->input('nomor_hp');

        //
        if ($request->hasFile('foto')){

            $image = $request->file('foto');
            $filename = time().' - '.$request->nama . '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(80,120)->save($location);

            $oldFileImage = $pasien->foto;

             //delete
            Storage::delete($oldFileImage);

            //updates
            $pasien->foto = $filename;

        }


        $pasien->save();
        $request->session()->flash('success', 'The data was succesfully updated');

        //redirect to another page
        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $pasien = Pasien::find($id);
        Storage::delete($pasien->foto);

        $pasien->delete();
        Session::flash('success', 'The data was succesfully deleted');

         //redirect to another page
        return redirect()->route('pasien.index');
    }
}
