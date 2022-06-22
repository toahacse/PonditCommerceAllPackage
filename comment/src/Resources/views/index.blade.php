<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <h2>Comments</h2>
    <p class="{{ session('success') ? 'alert alert-success' : '' }}">{{ session('success') && is_string(session('success')) ? session('success') : ''}}</p>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Description</th>
            <th scope="col">Reply</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <th scope="row">{{ ++$loop->index }}</th>
                    <td>{{ $comment->user_id }}</td>
                    <td>{{ $comment->description }}</td>
                    <td>{{ $comment->reply }}</td>
                    <td>
                        <a href="{{ route('comments.show', $comment->id) }}">
                            <input class="btn btn-secondary" type="button" value="Show">
                        </a>
                        <a href="{{ route('comments.edit', $comment->id) }}">
                            <input class="btn btn-secondary" type="button" value="Edit">
                        </a>
                        <form 
                            action="{{ route('comments.destroy', $comment->id) }}" 
                            method="post"
                            style="display: inline">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-warning" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
