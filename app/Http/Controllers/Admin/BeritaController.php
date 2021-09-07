<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaRequest;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BeritaController extends Controller
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
            $data = Berita::where('judul', 'like', '%'.$search.'%')->orderBy('judul', 'asc')->paginate(10);
        } else {
            $data = Berita::latest()->paginate(10);
        }

        return view('admin.berita.index', compact('data'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeritaRequest $request)
    {
        $this->validate($request, [
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,gif', 'max:4096']
        ]);

        DB::transaction(function () use($request) {
            $data = $request->all();
            $data['slug'] = Str::slug($request->judul);
            $data['thumbnail'] = time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path().'/'.('berita'), $data['thumbnail']);
            Berita::create($data);
        });

        return redirect()->route('berita.index')->withSuccess('Berita Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $beritum)
    {
        return view('admin.berita.edit', ['berita' => $beritum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $beritum)
    {
        if($request->has('thumbnail')) {
            $this->validate($request, [
                'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,gif', 'max:4096']
            ]);

            DB::transaction(function () use($request, $beritum) {
                $thumb = public_path('/berita/').$beritum->thumbnail;
                if(file_exists($thumb))
                {
                    @unlink($thumb);
                }

                $data = $request->all();
                $data['slug'] = Str::slug($request->judul);
                $data['thumbnail'] = time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
                $request->file('thumbnail')->move(public_path().'/'.('berita'), $data['thumbnail']);
                $beritum->update($data);
            });
        } else {
            $data2 = $request->all();
            $data2['slug'] = Str::slug($request->judul);
            $beritum->update($data2);
        }

        return redirect()->route('berita.index')->withSuccess('Berita Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        $thumb = public_path('/berita/').$beritum->thumbnail;
        if(file_exists($thumb))
        {
            @unlink($thumb);
        }
        $beritum->delete();

        return redirect()->route('berita.index')->withSuccess('Berita Berhasil Dihapus!');
    }
}
