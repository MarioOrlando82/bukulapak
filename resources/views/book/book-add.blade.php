<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="addBook" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="ISBN">ISBN</label>
            <input type="text" name="ISBN">
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author">
        </div>
        <div>
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price">
        </div>

        <div>
            <button type="submit">Add Book to DB</button>
        </div>
    </form>
</div>