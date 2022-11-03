<?php

namespace App\DataTables;

use App\Models\TutionClass;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class classStudentsDatatable extends DataTable
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
            ->addColumn('gender',function($student){
                return ($student->gender==1)?'<label class="badge bg-primary disabled">Male</label>':'<label class="badge bg-pink dissable">Female</label>';
            })
            ->addColumn('action', function($item){
                $btn='<a class="btn btn-xs btn-danger" href="" ><i class="fa fa-trash"></i></a>';
                return $btn;
            })->rawColumns(['gender','action']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\classStudentsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TutionClass $model)
    {
      //  dd($this->tution->student);
        return $this->tution->student();
     //   return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('classstudentsdatatable-table')
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'), 
            Column::make('name'),
            Column::make('email'),
            Column::make('gender'),
            Column::make('address'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'classStudents_' . date('YmdHis');
    }
}
