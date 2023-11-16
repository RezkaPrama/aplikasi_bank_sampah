<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JenisSampahController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $jenis = JenisSampah::latest()->when(request()->q, function ($jenis) {
            $jenis = $jenis->where('nama', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.jenisSampah.index', compact('jenis'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('admin.jenisSampah.create');
    }

    public function edit($id)
    {
        $jenis = JenisSampah::where('id', $id)->get();

        return view('admin.jenisSampah.edit', compact('jenis'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto'  => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'nama'  => 'required'
        ]);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/jenisSampah', $image->hashName());

        //save to DB
        $jenis = JenisSampah::create([
            'foto'           => $image->hashName(),
            'nama'           => $request->nama,
            'deskripsi'      => $request->deskripsi,
            'harga_per_kg'   => $request->harga_per_kg
        ]);

        if ($jenis) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.jenis-sampah.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.jenis-sampah.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $category
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'  => 'required'
        ]);

          //update data tanpa image
          $jenis = JenisSampah::findOrFail($id);
          $jenis->update([
              'nama'           => $request->nama,
              'deskripsi'      => $request->deskripsi,
              'harga_per_kg'   => $request->harga_per_kg
          ]);

        if ($jenis) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.jenis-sampah.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.jenis-sampah.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $jenis = JenisSampah::findOrFail($id);
        $image = Storage::disk('local')->delete('public/jenisSampah/' . basename($jenis->image));
        $jenis->delete();

        if ($jenis) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
