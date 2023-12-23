@extends('layout.master')
@section('title', 'Authors')
@section('mainContent')
    <x-flash-message />
    <div class="card mb-4">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <i class="fas fa-table me-1 "></i>
                    Authors
                </div>
                <div class="col-6 text-end">
                    <a href="/author/create" class="btn btn-primary">Add Author</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="align-middle">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Option</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($authors as $author)
                        <tr class="align-middle">
                            <td scope="row">{{ $author->id }}</td>
                            <td>{{ $author->authors_name }}</td>
                            <td>
                                @if ($author->gender == 0)
                                    male
                                @else
                                    female
                                @endif
                            </td>
                            <td>{{ $author->birth_date }}</td>
                            <td>
                                <a href="/author/{{ $author->id }}/edit" class="text-decoration-none">
                                    <i class="fa-solid fa-pencil "></i>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('author.destroy',$author->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger border-0 p-0">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination justify-content-center">
        <ul class="pagination">
            <li class="page-item {{ $authors->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $authors->previousPageUrl() }}">Previous</a>
            </li>
            @for ($i = 1; $i <= $authors->lastPage(); $i++)
                <li class="page-item {{ $i == $authors->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $authors->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $authors->nextPageUrl() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $authors->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </div>
@endsection
