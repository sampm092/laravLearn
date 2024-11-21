@extends('layout.html')
@section('content')

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="update" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Pertanyaan</label>
                                <textarea class="form-control @error('q') is-invalid @enderror" name="questionText"
                                    placeholder="Masukkan soal">{{ old('questionText', $question->question_text) }}</textarea>

                                <!-- error message untuk title -->
                                @error('q')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jawaban</label>
                                @foreach($question->options()->get() as $option)
                                    <div class="d-flex">
                                        <textarea class="form-control @error('answ') is-invalid @enderror" name="option"
                                            placeholder="Masukkan jawaban">{{ old('option', $option->option_text) }}</textarea>
                                        <input type="checkbox" class="form-control" name="isTrue">
                                    </div>

                                    <!-- error message untuk content -->
                                    @error('answ')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UBAH</button>
                            <button type="reset" class="btn btn-md btn-warning">ULANG</button>
                            <a href="{{ route('addView') }}" class="btn btn-md btn-secondary">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection