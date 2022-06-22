<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <title>List</title>
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header" style="padding: 5px; background-color: #7386D5;">
                            <h5 class="text-light" style="margin: 5px 15px 5px 15px;">User Information List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Picture</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Division,District,City</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($user_informations) > 0)
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($user_informations as $user_information)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $user_information->f_name }} {{ $user_information->l_name }}</td>
                                                <td>{{ $user_information->phone }}</td>
                                                <td>{{ $user_information->email }}</td>
                                                <td>
                                                    <a href="{{ asset('/storage/user_information-images/'.$user_information->picture) }}">
                                                        <img src="{{ asset('/storage/user_information-images/'.$user_information->picture) }}" height="50px" width= "70px"  alt="">
                                                    </a>
                                                </td>
                                                <td>{{ $user_information->address }}</td>
                                                <td>{{ $user_information->division }} ,{{ $user_information->district }} ,{{ $user_information->city }}</td>
                                                <td style="display: flex">
                                                    <a class="btn btn-outline-primary btn-sm mr-1"
                                                        href="{{ route('user-informations.edit', $user_information->id) }}"><i
                                                            class="fas fa-edit"></i></a>

                                                    <form action="{{ route('user-informations.destroy', $user_information->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-outline-danger btn-sm" type="submit"
                                                            onclick="return confirm('Are you sure you want to delete?')"><i
                                                                class="fas fa-trash"></i></button>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="8"><strong>No user information is available. <a
                                                        href="{{ route('user-informations.create') }}">Click here to add
                                                        one</a></strong></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a class="btn btn-outline-secondary btn-sm mr-1" href="{{ route('user-informations.create') }}"><i
                                    class="fas fa-plus"></i></a>
                            <a class="btn btn-outline-info btn-sm mr-1" href="{{ route('user-informations.trashed') }}"><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>
