@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">@lang("Project") #{{ $project->id }}</div>
            <div class="card-body">
                <p class="mb-2">@lang("Author"): {{ $project->user->name }}</p>
                <p class="mb-0">@lang("Created"): {{ $project->created_at->format('d.m.Y H:i') }}</p>
                <hr>
                {{ $project->description }}
                <hr>
                <strong>@lang("Tasks"):</strong>
                <ul class="list-unstyled">
                    @foreach($project->tasks as $task)
                        <li>
                            <a href="{{ route('project-task-overview', $task->id) }}">{{ $task->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if($project->me_author)
                <div class="card-footer text-right">
                    <a href="{{ route('project-task-create', $project->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                    <a href="{{ route('project-edit', $project->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('project-delete', $project->id) }}" class="btn btn-danger btn-sm"
                       data-confirm="{{ __('Are you sure?') }}">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
