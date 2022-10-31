<?php

namespace App\DataTables;

use App\Models\student;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable; 

class teacherStudentsDatatable extends DataTable
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
            // ->addColumn('phone',function($student){
            //     return $student->phone.' / '.$student->phone1;
            // })
            // ->addColumn('parent_contact',function($student){
            //     return $student->parent_contact.' / '.$student->parent_contact1;
            // })
            ->addColumn('action', function($student){
                $btn  = '<a class="btn btn-xs btn-success" href="'.route('students.show',$student->id).'"><i class="fa fa-eye"></i></a> ';
                $btn  .= '<a class="btn btn-xs btn-info" href="'.route('students.edit',$student->id).'"><i class="fa fa-pencil-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['gender','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(student $model)
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
                    ->setTableId('teacherstudentsdatatable-table')
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
            Column::make('DT_RowIndex')->title('#')->searchable(false),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'), 
            Column::make('name'),
            Column::make('gender'),
            Column::make('address'),
            Column::make('dob'),
            Column::make('nic')->visible(false),
            Column::make('phone')->visible(false),
            Column::make('phone1')->visible(false),
            Column::make('parent_name'),
            Column::make('parent_contact')->visible(false),
            Column::make('parent_contact1')->visible(false),
           
            // 
            // Column::make('phone'),
            // Column::make('phone'),
            // Column::make('phone'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'teacherStudents_' . date('YmdHis');
    }
}
