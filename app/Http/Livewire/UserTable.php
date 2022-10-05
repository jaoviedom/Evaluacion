<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
                ->setTableRowUrl(function($row) {
                    return route('usuarios.show', ['id' => $row->id]);
                });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            ButtonGroupColumn::make('')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                        ->title(fn($row) => 'Ver')
                        ->location(fn($row) => route('usuarios.show', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-info',
                            ];
                        }),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('usuarios.edit', $row))
                        ->attributes(function($row) {
                            return [
                                // 'target' => '_blank',
                                'class' => 'btn btn-warning',
                            ];
                        }),
                ]),
        ];
    }
    // public function builder(): Builder
    // {
    //     return User::query()
    //         ->join('rol_user', 'users.id', 'rol_user.user_id') // Join some tables
    //         ->select('users.*', 'rol_user.rol_id as rol'); // Select some things
    // }
}
