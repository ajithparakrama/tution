<?php

namespace App\DataTables;

use App\Models\paymentMonth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class tutionMonthPaymentsDatatable extends DataTable
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
            ->addColumn('date', function($item){
                return date('d-m-Y h:i', strtotime($item->created_at));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\tutionMonthPaymentsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(paymentMonth $model)
    {
        return $this->payment_month->student();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('tutionmonthpaymentsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                  //      Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                   //     Button::make('reset'),
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
            Column::make('amount'),
            Column::make('date'),
       //     Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tutionMonthPayments_' . date('YmdHis');
    }
}
