<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>

<body>
    <select id="book">
        <option value="">-- Select a book --</option>
        @foreach($customers['data'] as $book)
            <option value="{{ $book['id'] }}" 
            data-title="{{ $book['title'] }}" 
            data-author="{{ $book['author'] }}"
            data-genre="{{ $book['genre'] }}" 
            data-description="{{ $book['description'] }}">
                {{ $book['title'] }}
            </option>
        @endforeach
    </select>
    <div id="book-details" style="display: none;">
        <h1 id="book-title"></h1>
        <p id="book-author"></p>
        <p><strong>Genre:</strong> <span id="book-genre"></span></p>
        <p id="book-description"></p>
    </div>

    <script>
        document.getElementById("book").addEventListener("change", function () {
            let selectedOption = this.options[this.selectedIndex];

            if (selectedOption.value) {
                // Get book details from data attributes
                document.getElementById("book-title").textContent = selectedOption.getAttribute("data-title");
                document.getElementById("book-author").textContent = "Author: " + selectedOption.getAttribute("data-author");
                document.getElementById("book-genre").textContent = selectedOption.getAttribute("data-genre");
                document.getElementById("book-description").textContent = selectedOption.getAttribute("data-description");

                // Show the details section
                document.getElementById("book-details").style.display = "block";
            } else {
                document.getElementById("book-details").style.display = "none";
            }
        });
    </script>
</body>

</html>