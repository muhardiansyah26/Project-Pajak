<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use PDF;

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
        $datas = Dataset::latest()->paginate(20);
        return view('dataset', compact('datas'));
    }

    public function create(): View
    {
        return view('dataset.create');
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
}
