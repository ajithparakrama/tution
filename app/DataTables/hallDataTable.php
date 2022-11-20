<?php

namespace App\DataTables;

use App\Models\hall;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class hallDataTable extends DataTable
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
                if($user->can('halls-edit')){
                $btn = ' <a href="'.route('hall.edit',$item->id).'" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>';
                }
                // $btn .= '<form  action="'. route('hall.destroy',$item->id).'" method="POST" class="d-inline" >
                // '.csrf_field().' '.method_field("DELETE").' <button type="submit"  class="btn btn-xs btn-danger" 
                // onclick="return confirm(\'Do you need to delete this Category\');"> 
                // <i class="fa fa-trash-alt"></i></button>  
                // </form>';

                return$btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\hall $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(hall $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('hall-table')
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
            Column::make('capacity'), 
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
        return 'hall_' . date('YmdHis');
    }
}
