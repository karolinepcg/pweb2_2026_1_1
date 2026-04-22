<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class QtdAlunoCurso
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        /*
        SELECT c.nome, COUNT(1) AS qtd_alunos FROM matriculas m
            INNER JOIN cursos c ON c.id = m.curso_id
            GROUP BY c.nome
        */

        $alunoPorCurso = DB::table('matriculas')
            ->join('cursos', 'cursos.id', '=', 'matriculas.curso_id')
            ->select('cursos.nome', DB::raw('count(1) as qtd_alunos'))
            ->groupBy('cursos.nome')
            ->orderBy('qtd_alunos', 'desc')
            ->get();

        $qtdAlunos = [];
        $nomeCursos = [];

        foreach ($alunoPorCurso as $item) {
            $qtdAlunos []= $item->qtd_alunos;
            $nomeCursos [] = $item->nome_cursos;//extrair dados significativos e intersctar

        }

        return $this->chart->pieChart()
            ->setTitle('QTD Alunos por Curso')
            ->setSubtitle('Season 2021.')
            ->addData('qtd_alunos')
            ->setLabels('nome_cursos');
    }
}
