<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait TraitController
{
    protected $data;

    /**
     * TraitController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $this->data['model']->orderBy('created_at', 'desc')->paginate(5);
        $nome = $request->get('nome');

        if ($nome) {
            $data = $this->data['model']->where('nome', 'like', "%$nome%")->orderBy('created_at', 'desc')->paginate(5);
        }
        return view($this->data['view_index'], compact('nome', 'data'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view($this->data['view_create']);
    }

    public function store(Request $request)
    {
        $this->data['model']->create($request->all());

        \Session::flash('flash_message', 'Registro inserido com sucesso!');

        return redirect($this->data['redirect_to']);
    }

    public function edit($id)
    {
        $data = $this->data['model']->findOrFail($id);

        return view($this->data['view_edit'], compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->data['model']->findOrFail($id)->update($request->all());

        \Session::flash('flash_message', 'Registro atualizado com sucesso!');

        return redirect($this->data['redirect_to']);
    }

    public function destroy($id)
    {
        $this->data['model']->findOrFail($id)->delete();

        \Session::flash('flash_message','Registro excluido com sucesso!');

        return redirect('turmas');
    }
}
