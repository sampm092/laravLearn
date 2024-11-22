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
                    <div class="card shadow-sm mb-2 d-flex" style="flex-direction: row">
                        <p style="width:90%">
                            {{ $option->option_text }}
                            @if ($option->is_correct == 1)
                                <b> (T)</b>
                            @endif
                        </p>
                        <form action="{{route('trueAnswer', $option->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type=" submit" class="btn btn-primary"
                                style="width:fit-content;min-width: 80px;">True</button>
                        </form>

                    </div>

                @endforeach
                <div>
                    <a href="{{ route('editView', $questions->id) }}" class="btn btn-warning">
                        Ubah soal
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</body>
@endsection