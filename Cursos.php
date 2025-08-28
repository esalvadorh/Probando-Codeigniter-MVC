<?php namespace App\Controllers;

use App\Models\CursoModel;

class Cursos extends BaseController
{
    public function index()
    {
        $cursoModel = new CursoModel();
        $data['cursos'] = $cursoModel->orderBy('id','DESC')->findAll();
        return view('cursos/index', $data);
    }

    public function create()
    {
        return view('cursos/create');
    }

    public function store()
    {
        $cursoModel = new CursoModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'activo' => $this->request->getPost('activo') ? 1 : 0,
        ];
        if(!$cursoModel->save($data)){
            return redirect()->back()->with('errors', $cursoModel->errors())->withInput();
        }
        return redirect()->to('/cursos')->with('msg','Curso creado');
    }

    public function edit($id)
    {
        $cursoModel = new CursoModel();
        $curso = $cursoModel->find($id);
        if(!$curso) return redirect()->to('/cursos')->with('errors','No existe');
        return view('cursos/edit', ['curso'=>$curso]);
    }

    public function update($id)
    {
        $cursoModel = new CursoModel();
        $data = [
            'id' => $id,
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'activo' => $this->request->getPost('activo') ? 1 : 0,
        ];
        if(!$cursoModel->save($data)){
            return redirect()->back()->with('errors', $cursoModel->errors())->withInput();
        }
        return redirect()->to('/cursos')->with('msg','Curso actualizado');
    }

    public function delete($id)
    {
        $cursoModel = new CursoModel();
        $cursoModel->delete($id);
        return redirect()->to('/cursos')->with('msg','Curso eliminado');
    }
}
