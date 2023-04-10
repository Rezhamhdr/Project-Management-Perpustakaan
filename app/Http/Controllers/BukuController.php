<?php

namespace App\Http\Controllers;

use App\Models\Buku;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->paginate(5);
      
        return view('bukus.index',compact('bukus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('bukus.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_buku' => 'required',
        ]);
      
        Buku::create($request->all());
       
        return redirect()->route('bukus.index')
                        ->with('success','buku created successfully.');
    }
  
    public function show(Buku $buku)
    {
        return view('bukus.show',compact('buku'));
    }
  
    public function edit(Buku $buku)
    {
        return view('bukus.edit',compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_buku' => 'required',
        ]);
      
        $buku->update($request->all());
      
        return redirect()->route('bukus.index')
                        ->with('success','buku updated successfully');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
       
        return redirect()->route('bukus.index')
                        ->with('success','buku deleted successfully');
    }
}