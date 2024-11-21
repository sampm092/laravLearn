@extends('layout.html')
@section('content')

<body>
    <a href="{{route('addView')}}" class="btn btn-primary">
        Tambah soal
    </a>

    <div class="container">
        @foreach($question as $questions)
            <div class="card-body" style="border-bottom: 1px dotted black">
                <p>{{$loop->iteration}}. {{$questions->question_text}}</p>
                @foreach($questions->options()->get() as $option)
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <input type="radio" name="answer"> {{ $option->option_text }}</input>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('editView', $questions->id) }}" class="btn btn-warning">
                    Ubah soal
                </a>
            </div>
        @endforeach
    </div>
</body>
@endsection