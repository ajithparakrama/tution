<?php

namespace App\DataTables;
 
use App\Models\TutionClass;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable; 

class tutionDatatable extends DataTable
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
                if($user->can('classes-edit')){
                $btn =  '<a href="'.route('tution.edit',$item->id).'" class="btn btn-xs btn-info" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil-alt"></i></a> ';
                }
                if($user->can('classes-students-list')){
                $btn .=  '<a href="'.route('tstudents.index',$item->id).'" class="btn btn-xs btn-success" title="Students" data-toggle="tooltip"><i class="fa fa-users"></i></a> ';
                }
                if($user->can('class-time-list')){ 
                $btn .=  '<a href="'.route('ctimes.index',$item->id).'" class="btn btn-xs btn-warning" title="Class dates" data-toggle="tooltip"><i class="fa fa-calendar-alt"></i></a> ';
                }
                if($user->can('class-payments')){ 
                $btn .=  '<a href="'.route('payemnt-months.index',$item->id).'" class="btn btn-xs bg-olive" title="Class dates" data-toggle="tooltip"><i class="fa fa-dollar-sign"></i></a> ';
                }
                if($user->can('classes-staff')){
                $btn .=  '<a href="'.route('tution.staff',$item->id).'" class="btn btn-xs bg-olive" title="Class dates" data-toggle="tooltip"><i class="fa fa-user-tie"></i></a> ';
                }
                if($user->can('classes-delete')){
                if($item->active==1){ 
                $btn .=  '<a href="'.route('tution.deactive',$item->id).'" class="btn btn-xs btn-danger" title="Inactive" data-toggle="tooltip"><i class="fa fa-trash"></i></a>';
                }else{
                    $btn .=  '<a href="'.route('tution.active',$item->id).'" class="btn btn-xs btn-success" title="Activate" data-toggle="tooltip"><i class="fa fa-undo"></i></a>';
                }
            }
                return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \TutionClass $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TutionClass $model)
    {
      //  return $model->newQuery()->with('subject')->with('institute');
      return Auth::user()->tution()->with('subject');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('tutiondatatable-table')
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
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderColumn(true)->width(20),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass('text-center'), 
            Column::make('name'),
            Column::make('subject.name')->title('Subject'),
       #     Column::make('institute.name')->title('Institute'), 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tution_' . date('YmdHis');
    }
}