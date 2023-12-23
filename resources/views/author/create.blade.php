@extends('layout.master')

@section('title', 'Authors')

@section('mainContent')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Authors
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Authors Name</th>
                        <th scope="col">gender</th>
                        <th scope="col">birth_date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <span>
                            <td >
                                <form method="POST" action="{{ route('author.store') }}">
                                    @csrf
                                    <input type="text" class="form-control" name='authors_name' value="{{ old('authors_name') }}">
                                    @error('authors_name')
                                        <p class="text-500 text-danger mt1">{{ $message }}</p>
                                    @enderror
                            </td>
                        </span>
                        <span>
                            <td>
                                <select class="form-control" name="gender">
                                    <option selected>gender</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                                @error('gender')
                                    <p class="text-green-500 text-danger mt1">{{ $message }}</p>
                                @enderror
                            </td>
                        </span>
                        <span>
                            <td><input type="date" class="form-control" name='birth_date' value="{{ old('birth_date') }}">
                                @error('birth_date')
                                    <p class="text-green-500 text-danger mt1">{{ $message }}</p>
                                @enderror
                            </td>
                        </span>
                        <span>
                            <td><input type="submit" value="Save" class="btn btn-primary form-control"></td>
                        </span>
                    </tr>
                </tbody>
                </form>
            </table>
        </div>
    </div>
@endsection
