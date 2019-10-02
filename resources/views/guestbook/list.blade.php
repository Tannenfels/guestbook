@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Гостевая книга</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="pull-left">
        <a class="btn btn-success" href="{{ route('create') }}"> Create New Entry</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Показать JSON
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <script>
                        window.__payload = JSON.parse("{!!$entries!!}");
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Имя пользователя</th>
            <th>Электронная почта</th>
            <th>URL</th>
            <th>Текст записи</th>
            <th>Дата</th>
        </tr>

        @foreach ($entries as $entry)
            <tr>
                <td>{{ $entry->username }}</td>
                <td>{{ $entry->email }}</td>
                <td>{{ $entry->homepage }}</td>
                <td>{{ $entry->text }}</td>
                <td>{{ $entry->created_at }}</td>
            </tr>
        @endforeach
    </table>

    {!! $entries->links() !!}

@endsection
