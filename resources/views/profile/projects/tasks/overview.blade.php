@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang("Project") #{{ $task->project_id }} : {{ $task->title }}</div>
            <div class="card-body">
                {{ $task->description }}
                @if($task->file)
                    <hr>
                    <a href="{{ route('get-file', $task->file->id) }}">
                        <i class="fa fa-download"></i>
                        @lang("Download file")
                    </a>
                @endif
                <hr>
                <div class="text-right">
                    @if($task->status_id == $task::STATUS_DONE)
                        <div class="text-success">
                            <i class="fas fa-dot-circle"></i>
                            @lang("Project task status 1")
                        </div>
                    @elseif($task->status_id == $task::STATUS_IN_PROCESS)
                        <div class="text-warning">
                            <i class="fa fa-spinner"></i>
                            @lang("Project task status 2")
                        </div>
                    @elseif($task->status_id == $task::STATUS_NEW)
                        <div class="text-info">
                            <i class="far fa-dot-circle"></i>
                            @lang("Project task status 3")
                        </div>
                    @endif
                </div>
            </div>
            @if($task->me_author)
                <div class="card-footer text-right">
                    <a href="{{ route('project-task-edit', $task->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('project-task-delete', $task->id) }}" class="btn btn-danger btn-sm"
                       data-confirm="{{ __('Are you sure?') }}">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
