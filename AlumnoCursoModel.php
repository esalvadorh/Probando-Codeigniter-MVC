<?php namespace App\Models;

use CodeIgniter\Model;

class AlumnoCursoModel extends Model
{
    protected $table         = 'detalle_alumno_curso';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['alumno_id','curso_id'];
    protected $useTimestamps = false;
    protected $returnType    = 'array';

    public function cursosDeAlumno($alumnoId){
        return $this->select('detalle_alumno_curso.id as id_detalle, cursos.*')
            ->join('cursos', 'cursos.id = detalle_alumno_curso.curso_id')
            ->where('alumno_id', $alumnoId)
            ->orderBy('cursos.nombre','ASC')
            ->findAll();
    }

    public function tieneCursos($alumnoId): bool {
        return (bool)$this->where('alumno_id', $alumnoId)->countAllResults();
    }
}
