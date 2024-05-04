<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use PDF;
use DB;

class DatasetController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        //
        // $datas = Dataset::latest()->paginate(20);
        // return view('dataset', compact('datas'));
        return view('user');
    }

    public function create(): View
    {
        $datas = Dataset::all();
        return view('create', compact('datas'));
    }
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nop_sppt'     => 'required',
            'nm_wp_sppt'     => 'required',
            'nilai_sppt'   => 'required',
            'jalan_op' => 'required',
            'jln_wp_sppt'   => 'required',
            'nm_wp_sppt'   => 'required',
            'nm_kelurahan'   => 'required',
            'nm_kecamatan'   => 'required',
            'thn_pajak_sppt'   => 'required',
        ]);

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        Dataset::create([
            'nop_sppt'     => $request->nop_sppt,
            'nm_wp_sppt'     => $request->nm_wp_sppt,
            'jalan_op' => $request->jalan_op,
            'jln_wp_sppt' => $request->jln_wp_sppt,
            'nm_kelurahan' => $request->nm_kelurahan,
            'nm_kecamatan' => $request->nm_kecamatan,
            'thn_pajak_sppt' => $request->thn_pajak_sppt,
            'nilai_sppt'   => $request->nilai_sppt
        ]);
        return redirect()->route('dataset.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id): View
    {
        //get post by ID
        $data = Dataset::findOrFail($id);
        // var_dump($data["id"]);
        // var_dump($id);
        // die();

        //render view with post
        return view('show', compact('data'));
    }
    public function print(Request $request, $id)
    {
        $data = Dataset::findOrFail($id);
        $pdf = PDF::loadView('show', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('result.pdf', array('Attachment' => 0));
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $datas = Dataset::where('nm_wp_sppt', 'like', "%" . $keyword . "%")->paginate(13);
        return view('dataset', compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function searchQuery(Request $request)
    {
        return Dataset::select("nop_sppt")
            ->where("nop_sppt", "LIKE", "%{$request->get('query')}%")
            ->pluck('nop_sppt');

        // return response()->json($data);
    }
    public function coba(Request $request)
    {
        $data = Dataset::where('nop_sppt', '=', $request->coba)->get()->toArray();
        return view('create', compact('data'));
        // dd($data);
        // var_dump($data["id"]);
        // die();
    }
}
