<?php

namespace App\DataTables;

use App\Models\institute;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class instituteDatatable extends DataTable
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
                $btn = ' <a href="'.route('admin.institute.edit',$item->id).'" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>';
                $btn .= '<form  action="'. route('admin.institute.destroy',$item->id).'" method="POST" class="d-inline" >
                '.csrf_field().' '.method_field("DELETE").' <button type="submit"  class="btn btn-xs btn-danger" 
                onclick="return confirm(\'Do you need to delete this Category\');"> 
                <i class="fa fa-trash-alt"></i></button>  
                </form>';

                return$btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\instituteDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(institute $model)
    {
        return $model->newQuery()->where('active','=','1');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('institutedatatable-table')
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
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderColumn(true),
            Column::make('name'),
            Column::make('address'),
            Column::make('phone'),
            Column::make('phone1'), 
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
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
        return 'institute_' . date('YmdHis');
    }
}
