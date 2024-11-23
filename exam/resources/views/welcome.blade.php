@extends('layout.html')
@section('content')

<body>
    <h1>Selamat datang di bank soal</h1>
    <div class="container">
        @foreach($question as $questions)
            <div class="card-body" style="border-bottom: 1px dotted black">
                <p>{{$loop->iteration}}. {{$questions->question_text}}</p>
                @foreach($questions->options()->get() as $option)
                    <p>
                        <input type="radio" name="answer"> {{ $option->option_text }}</input>
                    </p>

                @endforeach
            </div>
        @endforeach
    </div>

</body>

@endsection