@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('project-task-save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}">
            <input type="hidden" name="project_id" value="{{ $project_id }}">

            <div class="form-group row align-items-end">
                <div class="col-lg">
                    <label for="title">@lang("Title")</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
                </div>
                <div class="col-lg">
                    <label for="status_id">@lang("Status")</label>
                    <select name="status_id" id="status_id" class="form-control">
                        <option
                            {{ $task->status_id == $task::STATUS_DONE ? 'selected'  : '' }} value="{{ $task::STATUS_DONE }}">@lang("Project task status 1")</option>
                        <option
                            {{ $task->status_id == $task::STATUS_IN_PROCESS ? 'selected'  : '' }} value="{{ $task::STATUS_IN_PROCESS }}">@lang("Project task status 2")</option>
                        <option
                            {{ $task->status_id == $task::STATUS_NEW ? 'selected'  : '' }} value="{{ $task::STATUS_NEW }}">@lang("Project task status 3")</option>
                    </select>
                </div>
                <div class="col-lg">
                    <div class="custom-file">
                        <label for="file" class="custom-file-label">@lang("File")</label>
                        <input type="file" name="file" id="file">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">@lang("Description")</label>
                <textarea name="description" id="description" rows="10"
                          class="form-control">{{ $task->description }}</textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-save"></i>
                    @lang("Save")
                </button>
            </div>
        </form>
    </div>
@endsection
