@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled">
                    @foreach($projects as $project)
                        <li>
                            <a href="{{ route('project-overview', $project->id) }}">
                                @lang("Project") #{{ $project->id }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{ $projects->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
