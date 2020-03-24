@extends('layouts.app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Новая задача
        </div>
        <div class="panel-body">
        @include('common.errors')
            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Задача</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Добавить задачу
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущая задача
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST" style="text-align: right">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
