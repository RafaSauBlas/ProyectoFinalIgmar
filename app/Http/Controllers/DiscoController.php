<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Http\Request;

/**
 * Class DiscoController
 * @package App\Http\Controllers
 */
class DiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discos = Disco::withTrashed()->get();
        $discos = Disco::paginate();

        return view('disco.index', compact('discos'))
            ->with('i', (request()->input('page', 1) - 1) * $discos->perPage());
    }

    /**
     * Show the form for creating a new resour
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disco = new Disco();
        return view('disco.create', compact('disco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Disco::$rules);
        $disco = Disco::create($request->all());
        return redirect()->route('discos.index')
            ->with('success', 'Nuevo disco registrado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disco = Disco::find($id);
        $discos = Disco::withTrashed()->get();
        return view('disco.show', compact('disco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disco = Disco::find($id);

        return view('disco.edit', compact('disco'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Disco $disco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // request()->validate(Disco::$rules);
        
        $disco = Disco::findOrFail($id);
        $disco->nombre = $request->nombre;
        $disco->cantante = $request->cantante;
        $disco->categoria = $request->categoria;
        $disco->precio = $request->precio;
        if ($request->hasFile('archivo')) {
        $file = $request->file('archivo');
        $path = $file->store('your/desired/path', 'public');
        $disco->archivo = $path;
        }else{
            $disco->archivo = $disco->archivo;
        }
        
        $disco->save();

        return redirect()->route('discos.index')
            ->with('success', 'El disco se actualizó correctamente.');
    }

    public function EditarDisco(Request $request)
    {
        Disco::where('id', $id)->update(['aprobada' => 1,'fechaaprueba' => Carbon::now(), 'usuario_autoriza' => Auth::user()->id]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $disco = Disco::find($id);
        return view('disco.delete', compact('disco'));
    }

    public function eliminarDisco($id){
        $disco = Disco::findOrFail($id);
        $disco->delete();

        return redirect()->route('discos.index')
            ->with('success', 'El disco se eliminó correctamente.');
    }
}