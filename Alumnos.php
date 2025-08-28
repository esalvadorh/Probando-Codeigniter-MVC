<?php namespace App\Controllers;

use App\Models\AlumnoModel;
use App\Models\CursoModel;
use App\Models\AlumnoCursoModel;

class Alumnos extends BaseController
{
    public function index()
    {
        $alumnoModel = new AlumnoModel();
        $detalle = new AlumnoCursoModel();
        $alumnos = $alumnoModel->orderBy('id','DESC')->findAll();
        foreach($alumnos as &$a){
            $a['tiene_cursos'] = $detalle->tieneCursos($a['id']);
        }
        return view('alumnos/index', ['alumnos'=>$alumnos]);
    }

    public function asignar($alumnoId)
    {
        $cursoModel = new CursoModel();
        $detalle = new AlumnoCursoModel();
        $cursos = $cursoModel->where('activo',1)->orderBy('nombre','ASC')->findAll();
        $asignados = array_column($detalle->where('alumno_id',$alumnoId)->findAll(),'curso_id');
        return $this->response->setJSON([ 'ok'=>true, 'cursos'=>$cursos, 'asignados'=>$asignados ]);
    }

    public function guardarAsignacion($alumnoId)
    {
        $detalle = new AlumnoCursoModel();
        $ids = $this->request->getPost('curso_ids') ?? [];
        $db = \Config\Database::connect();
        $db->transStart();
        $detalle->where('alumno_id',$alumnoId)->delete();
        foreach($ids as $cursoId){
            $detalle->insert(['alumno_id'=>$alumnoId,'curso_id'=>$cursoId]);
        }
        $db->transComplete();
        return $this->response->setJSON(['ok'=> $db->transStatus()]);
    }

    public function verCursos($alumnoId)
    {
        $detalle = new AlumnoCursoModel();
        $lista = $detalle->cursosDeAlumno($alumnoId);
        return $this->response->setJSON(['ok'=>true,'cursos'=>$lista]);
    }
}
