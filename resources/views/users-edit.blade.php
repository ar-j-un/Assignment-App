<!doctype html>
<html lang="en">
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $user->name) }}">
                           @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $user->email) }}">
                           @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text"
                           name="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           value="{{ old('phone_number', $user->phone_number) }}">
                           @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="mb-3">
                    <label>Age</label>
                    <input type="number"
                           name="age"
                           class="form-control @error('age') is-invalid @enderror"
                           value="{{ old('age', $user->age) }}">
                           @error('age')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="mb-3">
                    <label>Department</label>
                    <input type="text"
                           name="department"
                           class="form-control @error('department') is-invalid @enderror"
                           value="{{ old('department', $user->department) }}">
                           @error('department')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="mb-3">
                    <label>Designation</label>
                    <input type="text"
                           name="designation"
                           class="form-control @error('designation') is-invalid @enderror"
                           value="{{ old('designation', $user->designation) }}">
                           @error('designation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <button type="submit"
                        class="btn btn-primary">
                    Update User
                </button>
                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</div>
</body>
</html>