<?php

namespace App\DataTables;

use App\Models\subject;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class subjectsDatatable extends DataTable
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
            ->addColumn('action', function($item){
                $btn = '';
                $user = Auth()->user(); 
                if($user->can('subject-edit')){
                $btn .= ' <a href="'.route('subjects.edit',$item->id).'" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>';
                }
                if($user->can('subject-delete')){
                $btn .= '<form  action="'. route('subjects.destroy',$item->id).'" method="POST" class="d-inline" >
                '.csrf_field().' '.method_field("DELETE").' <button type="submit"  class="btn btn-xs btn-danger" 
                onclick="return confirm(\'Do you need to delete this Category\');"> 
                <i class="fa fa-trash-alt"></i></button>  
                </form>';
                }
                return$btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\subjectsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(subject $model)
    {
        return $model->newQuery()->where('active','=',1);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('subjectsdatatable-table')
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

            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderColumn(false),
            Column::make('name'), 
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(120)
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
        return 'subjects_' . date('YmdHis');
    }
}
