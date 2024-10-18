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
    
    <form action="/updateBook/{{$bookDetail->id}}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$bookDetail->title}}">
        </div>
        <div>
            <label for="ISBN">ISBN</label>
            <input type="text" name="ISBN" value="{{$bookDetail->ISBN}}">
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" value="{{$bookDetail->author}}">
        </div>
        <div>
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" value="{{$bookDetail->publisher}}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" value="{{$bookDetail->price}}">
        </div>

        <div>
            <button type="submit">Update Book to DB</button>
        </div>
    </form>
</div>