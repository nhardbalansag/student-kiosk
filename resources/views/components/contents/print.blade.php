@extends('welcome')
@section('content-pages')
    <div>
        <div class="row col-12 col-md-12">
            <div class="col-12 col-md-6">
                <div>
                    <div>
                        <h3>List of subjects to comply:</h3>
                    </div>
                    <div>
                        <ul>
                            @if($comply->count() > 0)
                                @forelse($comply as $key => $value)
                                    <li class="text-capitalize">{{ $value->subject_title }}</li>
                                @empty
                                @endforelse
                            @endif
                        </ul>
                    </div>
                </div>
                <div>
                    <div>
                        <h3>List of subjects to retake:</h3>
                    </div>
                    <div>
                        <ul>
                            @if($retake->count() > 0)
                                @forelse($retake as $key => $value)
                                    <li class="text-capitalize">{{ $value->subject_title }}</li>
                                @empty
                                @endforelse
                            @endif
                        </ul>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <p class="text-primary">Total Subject Passed: {{ $passed->passedCount }}</p>
                        </div>
                        <div>
                            <p class="text-danger">Total Subject Failed: {{ $comply->count() + $retake->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div>
                    <h3>List  of available subjects to take for the next semester</h3>
                </div>
                <div>
                    <ul>
                        @forelse($next_subject as $key => $value)
                            <li class="text-capitalize">{{ $value->subject_title }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <script>
        window.addEventListener("load", window.print());
    </script>
@endsection
