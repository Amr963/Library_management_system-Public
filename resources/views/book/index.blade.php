@extends('layout.master')
@section('title', 'Books')
@section('mainContent')
    <x-flash-message />
    <div class="card mb-4">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <i class="fas fa-table me-1 "></i>
                    Books
                </div>
                <div class="col-6 text-end">
                    <a href="/book/create" class="btn btn-primary">Add Book</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="align-middle">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Publishing House</th>
                        <th scope="col">Release Date</th>
                        <th>Author Name</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Publishing House</th>
                        <th>Release Date</th>
                        <th>Author Name</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="align-middle">
                            <td scope="row">{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->publishing_house }}</td>
                            <td>{{ $book->release_date }}</td>
                            <td>{{ optional($book->authors->first())->authors_name ?? 'No author' }}</td>
                            <td>
                                <a href="/book/{{ $book->id }}/edit" class="text-decoration-none">
                                    <i class="fa-solid fa-pencil "></i>
                                    Edit
                                </a>
                                <form method="POST" action="/book/{{ $book->id }}">
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
            <li class="page-item {{ $books->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $books->previousPageUrl() }}">Previous</a>
            </li>

            @for ($i = 1; $i <= $books->lastPage(); $i++)
                <li class="page-item {{ $i == $books->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <li class="page-item {{ $books->nextPageUrl() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $books->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </div>
@endsection
