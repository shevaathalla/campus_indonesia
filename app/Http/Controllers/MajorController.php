<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin'])->except([
            'index'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::orderBy('created_at', 'ASC')->get();
        return view('major.index',compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('major.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     $request->name => ['required','string','unique:majors'],
        //     $request->description => ['required','string'],
        // ]);

        $major = Major::create([
            'name' => $request->name,
            'description' => $request->description,
            'faculty_id' => $request->faculty,
            'website' => $request->website,
        ]);

        return redirect(route('major.index'))->with('status','Major berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        $faculties = Faculty::all();
        return view('major.edit',compact(['major','faculties']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        // $validated = $request->validate([
        //     $request->name => ['required','string'],
        //     $request->description => ['required','string'],
        // ]);
        
        Major::where('id',$major->id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect(route('major.index'))->with('status','Major berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        Major::destroy($major->id);
        return redirect(route('major.index'))->with('status','Major berhasil dihapus');
    }
}
