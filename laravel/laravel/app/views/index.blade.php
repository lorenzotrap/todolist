@extends('layout');
@section('content')
	<div class="head">
	    <h1>Simple To Do List</h1>
	    <span>Laravel</span>
	    <br>
	    <a href="{{ URL::to('tasks/create') }}" class="btn btn-default btn-xs">
	    <i class="fa fa-plus"></i>
	    New Task
	    </a>
	</div>
	<div class="body">
@if(Session::has('save')) <p style="color:green">{{ Session::get('save') }}</p> 
@endif
@if(Session::has('edit')) <p style="color:yellow">{{ Session::get('edit') }}</p> 
@endif
@if(Session::has('delete')) <p style="color:red">{{ Session::get('delete') }}</p> 
@endif
	<ul>
	@foreach($tasks as $task)
	    <li @if($task->state == 1) {{ 'class="done"' }} @endif>
	    {{ $task->task_name }}
	    <span>
	    @if($task->state == 0)
	    <a href="{{ URL::to('tasks/'.$task->id.'/done') }}"  class="fa fa-check" title="done"></a>
	    @endif
	    <a href="{{ URL::to('tasks/'.$task->id.'/edit')}}"  class="fa fa-pencil-square-o" title="edit"></a>
	    {{ Form::open(array('route'=>array('tasks.destroy',$task->id),'style'=>'display:inline','method'=>'delete'))}}
	    <button style="border:none; background-color:#fff" class="fa fa-trash" title="delete"></button>
	    {{ Form::close()}}
	    </span>
	    </li>
	@endforeach
	</ul>
	</div>
@endsection