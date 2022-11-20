<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class userDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('roles',function($item){
                $res = '';
                foreach($item->getRoleNames() as $v){ 
                        $res .= '<label class="badge badge-success">'.$v.' </label>';
                        };
                        return $res;
            })
            ->addColumn('action', function($item){
                $btn = '';
                $user = Auth()->user(); 
                if($user->can('user-edit')){                    
                $btn .=  '<a href="'.route('users.edit',$item->id).'" class="btn btn-xs btn-info"><i class="fa fa-pen"></i></a>';
                }
                if($user->can('user-list')){       
                $btn .=  '<a href="'.route('users.show',$item->id).'" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>';
                }
                if($user->can('user-delete')){       
                $btn .= '<form  action="'. route('users.destroy',$item->id).'" method="POST" class="d-inline" >
                '.csrf_field().' '.method_field("DELETE").' <button type="submit"  class="btn btn-xs btn-danger" 
                onclick="return confirm(\'Do you need to delete this Location\');"> 
                <i class="fa fa-trash-alt"></i></button>  
                </form>';
                }
                return $btn; 
            })
            ->rawColumns(['roles','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('Roles');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('userdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderable(false),
            Column::make('name'), 
            Column::make('user_name'), 
            Column::make('email'), 
            Column::make('roles'), 
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(160)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_' . date('YmdHis');
    }
}
