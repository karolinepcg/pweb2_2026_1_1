<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor',

    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
    public function alunos(){
            return $this->belongsToMany(Aluno::class, 'matriculas', 'curso_id', 'aluno_id');
            ->withPivot('turma_id', 'data_matricula');
            ->withTimestamps(); //1M
        }
         public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    }
