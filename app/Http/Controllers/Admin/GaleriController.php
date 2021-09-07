<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        
        $search = $request->search;

        if($search) {
            $data = Galeri::where('judul', 'like', '%'.$search.'%')->orderBy('judul', 'asc')->paginate(10);
        } else {
            $data = Galeri::latest()->paginate(10);
        }

        return view('admin.galeri.index', compact('data'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create');
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
            'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,gif', 'max:4096']
        ]);
        
        DB::transaction(function () use($request) {
            $data = $request->all();
            $data['gambar'] = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path().'/'.('galeri'), $data['gambar']);
            Galeri::create($data);
        });

        return redirect()->route('galeri.index')->withSuccess('Galeri Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        if($request->has('gambar')) {
            $this->validate($request, [
                'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,gif', 'max:4096']
            ]);

            DB::transaction(function () use($request, $galeri) {
                $gambar = public_path('/galeri/').$galeri->gambar;
                if(file_exists($gambar))
                {
                    @unlink($gambar);
                }
                
                $data = $request->all();
                $data['gambar'] = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
                $request->file('gambar')->move(public_path().'/'.('galeri'), $data['gambar']);
                $galeri->update($data);
            });
        } else {
            $galeri->update($request->all());
        }

        return redirect()->route('galeri.index')->withSuccess('Galeri Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        $gambar = public_path('/galeri/').$galeri->gambar;
        if(file_exists($gambar))
        {
            @unlink($gambar);
        }
        $galeri->delete();

        return redirect()->route('galeri.index')->withSuccess('Galeri Berhasil Dihapus!');
    }
}
