<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.1.1/ckeditor5-premium-features.css" />
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action=" {{ route('store') }}" method="POST" enctype="multipart/form-data">
                            
                                @csrf

                                <div class="form-group">
                                    <label class="font-weight-bold">Book Cover</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="cover">

                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Book Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Input Book title">
                                
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Author</label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" placeholder="Input Authors name">
                                    
                                     <!-- error message untuk content -->
                                     @error('desc')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror                                   
                                    
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Description</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" rows="5" placeholder="Masukkan Konten Blog">{{ old('content') }}</textarea>
                                
                                    <!-- error message untuk content -->
                                    @error('desc')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                <a href="{{ route('profile') }}" class="btn btn-md btn-secondary">BACK</a>

                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
    
</body>
</html>