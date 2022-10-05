<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Idea;

class IdeaTable extends DataTableComponent
{
    protected $model = Idea::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('ideas.show', ['idea' => $row->id]);
            });
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            // Column::make("Código", "codigo")
            //     ->sortable()
            //     ->searchable(),
            Column::make("Titulo", "titulo")
                ->sortable()
                ->searchable(),
            // Column::make("Talento", "talento")
            //     ->sortable()
            //     ->searchable(),
            Column::make('Estado')
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => $this->verificar($value)
                )
                ->html(),
            ButtonGroupColumn::make('')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                        ->title(fn($row) => 'Ver')
                        ->location(fn($row) => route('ideas.show', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-info',
                            ];
                        }),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('ideas.edit', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-warning',
                            ];
                        }),
                    LinkColumn::make('Gestor')
                        ->title(fn($row) => 'Gestor')
                        ->location(fn($row) => route('ideas.asignar-gestor', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-success',
                            ];
                        }),
                    LinkColumn::make('Evaluadores')
                        ->title(fn($row) => 'Evaluadores')
                        ->location(fn($row) => route('ideas.asignar-evaluadores', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-danger',
                            ];
                        }),
                    LinkColumn::make('Evaluación')
                        ->title(fn($row) => 'Evaluación')
                        ->location(fn($row) => route('ideas.estado-evaluacion', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-dark',
                            ];
                        }),
                    LinkColumn::make('Resultados')
                        ->title(fn($row) => 'Resultados')
                        ->location(fn($row) => route('ideas.resultadosEvaluacion', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-orange',
                            ];
                        }),
                ]),
        ];
    }

    public function verificar($valor) 
    {
        if($valor == "Convocado")
            return "<span class='badge text-bg-info'>$valor</span>";
        elseif ($valor == "Asignado")
            return "<span class='badge text-bg-warning'>$valor</span>";
        elseif ($valor == "Viable")
            return "<span class='badge text-bg-success'>$valor</span>";
        elseif ($valor == "No viable")
            return "<span class='badge text-bg-danger'>$valor</span>";
    }
}
