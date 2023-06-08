<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminMitigasiRequest;
use App\Models\MitigasiBencana;
use App\Http\Requests\StoreMitigasiBencanaRequest;
use App\Http\Requests\UpdateMitigasiBencanaRequest;
use App\Http\Resources\MitigasiBencanasResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MitigasiBencanaController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MitigasiBencanasResource::collection(
            MitigasiBencana::all()
        );
    }

    public function indexAdmin()
    {
       $mitigasiBencana = MitigasiBencana::latest()->paginate(10);

        return view('admin.mitigasi_bencana.index', compact('mitigasiBencana'));
    }
    // public function indexAdmin()
    // {
    //     $mitigasiBencana = MitigasiBencana::whereDate('created_at', '>', Carbon::now()->subDays(2))->paginate(10);

    //     return view('admin.mitigasi_bencana.index', compact('mitigasiBencana'));
    // }

    public function indexPublic()
    {
       $mitigasiBencanaPDF = MitigasiBencana::where('jenis_konten', 'pdf')->latest()->paginate(4);
       $mitigasiBencanaVideo = MitigasiBencana::where('jenis_konten', 'video')->latest()->paginate(4);

        return view('public.mitigasi_bencana.index', compact('mitigasiBencanaPDF', 'mitigasiBencanaVideo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMitigasiBencanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMitigasiBencanaRequest $request)
    {
        $request->validated($request->all());

        $mimeType = $request->file('file')->getMimeType();

        $jenis_konten = explode('/', $mimeType)[0] == 'video' ? 'video' : 'pdf';

        $file = $request->file('file');

        $nama_file = time()."_".$file->getClientOriginalName();

        $file->move("mitigasi", $nama_file);

        $mitigasiBencana = MitigasiBencana::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'jenis_konten' => $jenis_konten,
            'file' => $nama_file,
            'user_id' => Auth::user()->id
        ]);

        return new MitigasiBencanasResource($mitigasiBencana);
    }

    public function addAdmin(StoreAdminMitigasiRequest $request)
    {
        $request->validated($request->all());

        $mimeType = $request->file('file')->getMimeType();

        $jenis_konten = explode('/', $mimeType)[0] == 'video' ? 'video' : 'pdf';

        $file = $request->file('file');

        $nama_file = time()."_".$file->getClientOriginalName();

        $file->move("mitigasi", $nama_file);

        $mitigasiBencana = MitigasiBencana::create([
            'title' => $request->title_add,
            'deskripsi' => $request->deskripsi_add,
            'jenis_konten' => $jenis_konten,
            'file' => $nama_file,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('sukses', 'Data mitigasi bencana berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mitigasiBencana = MitigasiBencana::find($id);

        if(!$mitigasiBencana) {
            return $this->error('', 'Data Mitigasi Bencana tidak ditemukan', 404);
        }

        return new MitigasiBencanasResource($mitigasiBencana);
    }

    public function showPublic($id)
    {
        $mitigasiBencana = MitigasiBencana::find($id);

        if(!$mitigasiBencana) {
            return back()->with('gagal', 'Data Mitigasi Bencana tidak ditemukan');
        }

        return view('public.mitigasi_bencana.detail', compact('mitigasiBencana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function edit(MitigasiBencana $mitigasiBencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMitigasiBencanaRequest  $request
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMitigasiBencanaRequest $request, $id)
    {
        $mitigasiBencana = MitigasiBencana::find($id);

        if(!$mitigasiBencana) {
            return $this->error('', 'Data Mitigasi Bencana tidak ditemukan', 404);
        }

        $request->validated($request->all());

        $mitigasiBencana->update($request->all());

        return new MitigasiBencanasResource($mitigasiBencana);
    }

    public function updateAdmin(UpdateMitigasiBencanaRequest $request)
    {
        $mitigasiBencana = MitigasiBencana::find($request->mitigasi_id);

        if(!$mitigasiBencana) {
            return back('gagal', 'Data mitigasi bencana tidak ditemukan');
        }

        $request->validated($request->all());

        if($request->hasFile('file')) {

            $file_path = public_path() . '/mitigasi/' . $mitigasiBencana->file;

                if(file_exists($file_path)) {
                    unlink($file_path);
                }

            $mimeType = $request->file('file')->getMimeType();

            $jenis_konten = explode('/', $mimeType)[0] == 'video' ? 'video' : 'pdf';

            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

            $file->move("mitigasi", $nama_file);

            $mitigasiBencana->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'jenis_konten' => $jenis_konten,
                'file' => $nama_file,
                'user_id' => Auth::user()->id
            ]);

            return back()->with('sukses', 'Data mitigasi bencana berhasil diubah');
        }

        $mitigasiBencana->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('sukses', 'Data mitigasi bencana berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MitigasiBencana  $mitigasiBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitigasiBencana = MitigasiBencana::find($id);

        if(!$mitigasiBencana) {
            return $this->error('', 'Data Mitigasi Bencana tidak ditemukan', 404);
        }

        $mitigasiBencana->delete();

        return $this->success('', 'Data Mitigasi Bencana Berhasil Dihapus', 200);

    }

    public function deleteAdmin($id)
    {
        $mitigasiBencana = MitigasiBencana::find($id);

        if(!$mitigasiBencana) {
            return back()->with('gagal', 'Data mitigasi bencana tidak ditemukan');
        }

        $mitigasiBencana->delete();

        return back()->with('sukses', 'Data mitigasi bencana berhasil dihapus');

    }
}
