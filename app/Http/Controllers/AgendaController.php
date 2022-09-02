<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
class AgendaController extends Controller
{
    //
 
    public function index()
    {
        
        $agendas=Agenda::orderBy('id','DESC')->paginate(3);
        return view('agenda.index',compact('agendas')); 
    }

    public function create()
    {
        //----------------
        return view('agenda.create');
    }

    public function update(Request $request, $id) 
    {
        //
        $this->validate($request,[ 'id'=>'required','nombre'=>'required','apellido'=>'required', 
        'numero'=>'required', 'direccion'=>'required']);

        Agenda::find($id)->update($request->all());
        return redirect()->route('agenda.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function edit($id)
    {
        //
        $agendas=Agenda::find($id);
        return view('agenda.edit',compact('agendas'));
    }


    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'id'=>'required','nombre'=>'required','apellido'=>'required', 
        'numero'=>'required', 'direccion'=>'required']);
        Agenda::create($request->all());
        return redirect()->route('agenda.index')->with('success','Registro creado satisfactoriamente');
    }

    public function destroy($id)
    {
        //
        Agenda::find($id)->delete();
        return redirect()->route('agenda.index')->with('success','Registro eliminado satisfactoriamente');

    }

}
