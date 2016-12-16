<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Staff;
use Session;
use Image;
use Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffs = Staff::paginate(10);
             
        return view('Staff/index')->with('staffs',$staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Staff/create');
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
            'nip' => 'required',
            'email' => 'required | unique:staffs',
            'password' => 'required | min:6',
            'alamat' => 'required | min:10',
            'nomor_hp' => 'required | min:12',
            'foto' => 'sometimes | image'

            ));

        //store to database
        $staff = new Staff;

        $staff->nama                   = $request->nama;
        $staff->nip                    = $request->nip;
        $staff->password               = $request->password;
        $staff->tempat_lahir           = $request->tempat_lahir;
        $staff->tanggal_lahir          = $request->tanggal_lahir;
        $staff->alamat                 = $request->alamat;
        $staff->email                  = $request->email;
        $staff->nomor_hp               = $request->nomor_hp;
    

        //save foto
        if ($request->hasFile('foto')){
            $image = $request->file('foto');
            $filename = time().'- '.$request->nama . '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(80,120)->save($location);

            $staff->foto = $filename;
        }
        $staff->save();
        $request->session()->flash('success', 'The data was succesfully saved');

        //redirect to another page
        return redirect()->route('staff.index');
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
        $staff = Staff::find($id);

        //return view
        return view('staff.show')->with('staff',$staff);
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
        $staff = Staff::find($id);

        // return view
        return view('staff.edit')->with('staff',$staff);
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
            'nip' => 'required',
            'password' => 'required | min:6',
            'alamat' => 'required | min:10',
            'nomor_hp' => 'required | min:12',
            /*'foto' => 'image',*/

            ));

        //save data to the database
        $staff = Staff::find($id);

        $staff->nama                  = $request->input('nama');
         $staff->nip                  = $request->input('nip');
        $staff->password              = $request->input('password');
        $staff->tempat_lahir          = $request->input('tempat_lahir');
        $staff->tanggal_lahir         = $request->input('tanggal_lahir');
        $staff->alamat                = $request->input('alamat');
        $staff->email                 = $request->input('email');
        $staff->nomor_hp              = $request->input('nomor_hp');
      

        //
        if ($request->hasFile('foto')){

            $image = $request->file('foto');
            $filename = time().' - '.$request->nama . '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(80,120)->save($location);

            $oldFileImage = $staff->foto;

             //delete
            Storage::delete($oldFileImage);

            //updates
            $staff->foto = $filename;

        }


        $staff->save();
        $request->session()->flash('success', 'The data was succesfully updated');

        //redirect to another page
        return redirect()->route('staff.index');
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
        $staff = Staff::find($id);
        Storage::delete($staff->foto);

        $staff->delete();
        Session::flash('success', 'The data was succesfully deleted');

         //redirect to another page
        return redirect()->route('staff.index');
    }
}
