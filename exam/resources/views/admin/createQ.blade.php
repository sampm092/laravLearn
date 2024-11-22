@extends('layout.html')
@section('content')

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Pertanyaan</label>
                                <textarea class="form-control @error('q') is-invalid @enderror"
                                    name="question_text" placeholder="Masukkan soal"></textarea>

                                <!-- error message untuk title -->
                                @error('q')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jawaban</label>
                                <div class="d-flex">
                                    <textarea class="form-control @error('answ') is-invalid @enderror"
                                        name="option1" placeholder="Masukkan jawaban"></textarea>
                                    <input type="checkbox" class="form-control" name="isTrue">
                                </div>
                                <div class="d-flex">
                                    <textarea class="form-control @error('answ') is-invalid @enderror"
                                        name="option2" placeholder="Masukkan jawaban"></textarea>
                                    <input type="checkbox" class="form-control" name="isTrue">
                                </div>
                                <div class="d-flex">
                                    <textarea class="form-control @error('answ') is-invalid @enderror"
                                        name="option3" placeholder="Masukkan jawaban"></textarea>
                                    <input type="checkbox" class="form-control" name="isTrue">
                                </div>
                                <div class="d-flex">
                                    <textarea class="form-control @error('answ') is-invalid @enderror"
                                        name="option4" placeholder="Masukkan jawaban"></textarea>
                                    <input type="checkbox" class="form-control" name="isTrue">
                                </div>
                                <div class="d-flex">
                                    <textarea class="form-control @error('answ') is-invalid @enderror"
                                        name="option5" placeholder="Masukkan jawaban"></textarea>
                                    <input type="checkbox" class="form-control" name="isTrue">
                                </div>

                                <!-- error message untuk content -->
                                @error('answ')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-md btn-primary">TAMBAH</button>
                            <button type="reset" class="btn btn-md btn-warning">ULANG</button>
                            <a href="{{ route('index') }}" class="btn btn-md btn-secondary">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection