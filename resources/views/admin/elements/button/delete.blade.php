{{ Form::open(['style' => 'display:none', 'method' => 'POST', 'url' => $url.'delete/'.$id, 'onsubmit' => 'return ConfirmDelete()']) }}
{!! method_field('delete') !!}
{{ Form::close() }}
{{Html::link('#', 'Xóa', ['class' => 'btn btn-danger btn-sm'])}}