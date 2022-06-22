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
    <dl class="row pt-5 text-center">
        <dt class="col-sm-3">User Id</dt>
        <dd class="col-sm-9">{{ $comment->user_id }}</dd>

        <dt class="col-sm-3">Description</dt>
        <dd class="col-sm-9">{{ $comment->description }}</dd>

        <dt class="col-sm-3">reply</dt>
        <dd class="col-sm-9">{{ $comment->reply }}</dd>
    </dl>

</body>

</html>