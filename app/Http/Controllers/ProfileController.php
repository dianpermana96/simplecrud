<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::orderBy('id', 'ASC')->paginate(5);
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'foto' => 'required'
        ]);
        $uploadedFile = $request->file('foto');
        $path = $uploadedFile->store('public/files');

        $profile = Profile::create([
        'nama' => $request->nama, 'alamat' => $request->alamat, 'email' => $request->email, 'foto' => $path
    ]);

        return redirect()->route('profile.index')->with('message', 'Profile berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', compact('profile'));
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
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'foto' => 'required'
        ]);
        // return $request;
        $uploadedFile = $request->file('foto')->store('public/files');

        $profile = Profile::findOrFail($id)->update([
        'nama' => $request->nama, 'alamat' => $request->alamat, 'email' => $request->email, 'foto' => $uploadedFile
    ]);

        return redirect()->route('profile.index')->with('message', 'Profile berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id)->delete();
        return redirect()->route('profile.index')->with('message', 'Profile berhasil dihapus!');
    }
    public function form(): View
    {
        return view('profile.form');
    }
    public function upload(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'nullable|max:100',
            'file' => 'required|file|max:2000'
        ]);
        $uploadedFile = $request->file('file');        
        $path = $uploadedFile->store('public/files');
        $file = File::create([
            'title' => $request->title ?? $uploadedFile->getClientOriginalName(),
            'filename' => $path
        ]);
        return redirect()
            ->back()
            ->withSuccess(sprintf('File %s has been uploaded.', $file->title));        
    }
}
