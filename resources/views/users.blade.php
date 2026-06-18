<!doctype html>
<html lang="en">
    <head>
        <title>Datatable of all Users</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css" />
    </head>
    <body>
        <div class="container py-5">
            <div class="card-header">
                <h5 class="card-title">Datatable Users</h5>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>SL.</th> 
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Age</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->department }}</td>
                                    <td>{{ $user->designation }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                
                            @empty
                                <tr>
                                    <td colspan="7"> No Data Found </td>
                                </tr>
                            @endforelse
                        </tbody> --}}
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            $('.datatable'). DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route("users.index") }}'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable: false },
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email'},
                    { data: 'phone_number', name: 'phone_number'},
                    { data: 'age', name: 'age'},
                    { data: 'department', name: 'department'},
                    { data: 'designation', name: 'designation'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action', orderable:false, searchable: false }

                ]
            });
            });
        </script>
    </body>
</html>