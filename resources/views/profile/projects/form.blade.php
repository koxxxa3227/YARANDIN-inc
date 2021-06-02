@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('project-save') }}" method="post">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">

            <div class="form-group">
                <label for="description">@lang("Description")</label>
                <textarea name="description" id="description" rows="10"
                          class="form-control">{{ $project->description }}</textarea>
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
