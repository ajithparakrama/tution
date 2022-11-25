<?php

namespace App\DataTables;

use App\Models\ctimes;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class studentAttendanceDatatable extends DataTable
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
            ->addColumn('in_time',function($item){
                return date('M-d h:i :sa',strtotime($item->create_at));
            })
            ->addColumn('action', 'studentattendancedatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\studentAttendanceDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ctimes $model)
    {
        return $this->ctime->students();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('studentattendancedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
               //         Button::make('create'),
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
       //     Column::make('id'),
            Column::make('name'),
        //    Column::make('amount'),
            Column::make('in_time'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'studentAttendance_' . date('YmdHis');
    }
}
