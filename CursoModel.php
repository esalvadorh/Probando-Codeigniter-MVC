<?php namespace App\Models;

use CodeIgniter\Model;

class CursoModel extends Model
{
    protected $table            = 'cursos';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nombre', 'descripcion', 'activo'];
    protected $useTimestamps    = false;
    protected $returnType       = 'array';
    protected $validationRules  = [
        'nombre' => 'required|min_length[3]|max_length[120]',
    ];
}
