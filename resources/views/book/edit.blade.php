@extends('layout.master')

@section('title', 'Books')

@section('mainContent')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Update Book Info
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Publishing House</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <span>
                            <td>
                                <form method="POST" action="{{ route('book.update', $book->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input class="form-control" type="text" name='name'
                                        value="{{ old('name', $book->name) }}">
                                    @error('name')
                                        <p class="text-500 text-danger mt1">{{ $message }}</p>
                                    @enderror
                            </td>
                        </span>
                        <span>
                            <td><input class="form-control" type="text" name='publishing_house'
                                    value="{{ old('publishing_house', $book->publishing_house) }}">
                                @error('publishing_house')
                                    <p class="text-green-500 text-danger mt1">{{ $message }}</p>
                                @enderror
                            </td>
                        </span>
                        <span>
                            <td><input class="form-control" type="date" name='release_date'
                                    value="{{ old('release_date', $book->release_date) }}">
                                @error('release_date')
                                    <p class="text-green-500 text-danger mt1">{{ $message }}</p>
                                @enderror
                            </td>
                        </span>
                        <span>
                            <td>
                                <select class="form-control" class="select2" name="author_id" id="author_id">
                                    <option selected>select Author</option>
                                    @foreach ($allAuthors as $author)
                                        <option value="{{ $author->id }}"
                                            @if ($book->authors->first() && $author->id === $book->authors->first()->id) selected @endif>{{ $author->authors_name ?? 'No author' }}
                                        </option>
                                    @endforeach
                                    <option value="" class="create_new_author"
                                        data-href="{{ route('author.create') }}"> Create Author
                                    </option>
                                </select>
                                <!-- JavaScript -->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('.select2').select2();
                                        $('#author_id').on('change', function() {
                                            var selectedOption = $(this).find(':selected');
                                            var url = selectedOption.data('href');
                                            if (url) {
                                                window.location.href = url;
                                            }
                                        });
                                    });
                                </script>
                                @if ($errors->has('author_id'))
                                    <p class="text-green-500 text-danger mt1">{{ $errors->first('author_id') }}</p>
                                @endif
                            </td>
                        </span>
                        <span>
                            <td><input type="submit" value="Update" class="btn btn-primary form-control"></td>
                        </span>
                    </tr>
                </tbody>
                </form>
            </table>
        </div>
    </div>
@endsection
