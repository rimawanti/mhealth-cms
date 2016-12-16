<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dokter;
use Session;
use Image;
use Storage;

class DokterContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dokterss = Dokter::paginate(10);
             
        return view('Dokter/index')->with('dokters',$dokters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Dokter/create');
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
            'email' => 'required | unique:dokters',
            'password' => 'required | min:6',
            'alamat' => 'required | min:10',
            'nomor_hp' => 'required | min:12',
            'foto' => 'sometimes | image'

            ));

        //store to database
        $dokter = new Dokter;

        $dokter->nama                   = $request->nama;
        $dokter->password               = $request->password;
        $dokter->tempat_lahir           = $request->tempat_lahir;
        $dokter->tanggal_lahir          = $request->tanggal_lahir;
        $dokter->alamat                 = $request->alamat;
        $dokter->email                  = $request->email;
        $dokter->nomor_hp               = $request->nomor_hp;

        //save foto
        if ($request->hasFile('foto')){
            $image = $request->file('foto');
            $filename = time().'- '.$request->nama . '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(80,120)->save($location);

            $dokter->foto = $filename;
        }
        $dokter->save();
        $request->session()->flash('success', 'The data was succesfully saved');

        //redirect to another page
        return redirect()->route('dokter.index');
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
        $dokter = Dokter::find($id);

        //return view
        return view('dokter.show')->with('dokter',$dokter);
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
        $dokter = Dokter::find($id);

        // return view
        return view('dokter.edit')->with('dokter',$dokter);
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
        $dokter = Dokter::find($id);

        $dokter->nama                  = $request->input('nama');
        $dokter->password              = $request->input('password');
        $dokter->tempat_lahir          = $request->input('tempat_lahir');
        $dokter->tanggal_lahir         = $request->input('tanggal_lahir');
        $dokter->alamat                = $request->input('alamat');
        $dokter->email                 = $request->input('email');
        $dokter->nomor_hp              = $request->input('nomor_hp');

        //
        if ($request->hasFile('foto')){

            $image = $request->file('foto');
            $filename = time().' - '.$request->nama . '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(80,120)->save($location);

            $oldFileImage = $dokter->foto;

             //delete
            Storage::delete($oldFileImage);

            //updates
            $dokter->foto = $filename;

        }


        $dokter->save();
        $request->session()->flash('success', 'The data was succesfully updated');

        //redirect to another page
        return redirect()->route('dokter.index');
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
        $dokter = Dokter::find($id);
        Storage::delete($dokter->foto);

        $dokter->delete();
        Session::flash('success', 'The data was succesfully deleted');

         //redirect to another page
        return redirect()->route('dokter.index');
    }
}
