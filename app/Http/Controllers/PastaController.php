<?php

namespace App\Http\Controllers;

use App\Pasta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::paginate(5);
        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // salvo dentro $data tutti i name dei campi del form inviati nella request
        $data = $request->all();

        $new_pasta = new Pasta();
        // modalità di inserimento senza $fillable
       /* $new_pasta->title = $data['title'];
        $new_pasta->description = $data['description'];
        $new_pasta->type = $data['type'];
        $new_pasta->image = $data['image'];
        $new_pasta->coocking_time = $data['coocking_time'];
        $new_pasta->slug = Str::slug($new_pasta->title,'-');*/

        $data['slug'] = $this->createSlug($data['title']);
        // inserisco solo i valori presenti nella proprietà $fillable che ho creato dentro il Model
        $new_pasta->fill($data);
        $new_pasta->save();

        // una volta salvato il dato nel DB si atterra alla pagina di derscitione
        return redirect()->route('pastas.show', $new_pasta);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasta = Pasta::find($id);
        if($pasta){
            return view('pastas.show', compact('pasta'));
        }
        abort(404, 'Prodotto non presente nel database');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasta = Pasta::find($id);
        if($pasta){
            return view('pastas.edit', compact('pasta'));
        }
        abort(404, 'Prodotto non presente nel database');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasta $pasta)
    {
        $data = $request->all();

        $data['slug'] = $this->createSlug($data['title']);
        $pasta->update($data);

        return redirect()->route('pastas.show', $pasta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        $pasta->delete();

        return redirect()->route('pastas.index');
    }

    private function createSlug($string){
        return  Str::slug($string,'-');
    }
}
