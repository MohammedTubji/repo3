@extends('layouts.app')
@section('title','taskList2')

@section('content')
<div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            Task List
        </div>

        <div class="panel-body">
            <!-- Display Validation Errors -->
            <!-- New Task Form -->
            <form action="update/{{$edit->id}}" method="POST" class="form-horizontal">
            @csrf
            <!-- Task Name -->
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ $edit->name}}  ">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>UPDATE Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Tasks -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Task</th>
                <th>&nbsp;</th>
                </thead>
                <tbody> @foreach ($tasks as $task)
                    <tr>
                        <td class="table-text"><div>{{$task->name}}</div></td>

                        <!-- Task Delete Button -->
                        <td>
                            <form action="delete/{{$task->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="edit/{{$task->id}}" method="POST">
                                @csrf
                                    {{-- @method('UPDATE') --}}
                                    <button type="submit" class="btn btn-danger" style="background-color:blue ; border-color:blue">
                                    <i class="fa fa-btn fa-trash"></i>edit
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach



                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection