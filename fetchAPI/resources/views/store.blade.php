<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="font-weight-bold">Cover</label>
            <input type="text" class="form-control" name="cover" value="https://picsum.photos/250/325" placeholder="Input Book title">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Book Title</label>
            <input type="text" class="form-control" name="title" placeholder="Input Book title">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Author</label>
            <input type="text" class="form-control" name="author" placeholder="Input Book author">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Genre</label>
            <input id="F" type="radio" name="genre" value="F">
            <label for="F">F</label><br>
            <input id="NF" type="radio" id="css" name="genre" value="NF">
            <label for="NF">NF</label><br>
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Description</label>
            <textarea class="form-control" name="description" rows="5" placeholder="Masukkan deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</body>

</html>