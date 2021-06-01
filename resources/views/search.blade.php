@extends('master')
@section('content')
<div class="container-fluid">
    <table class="table">
        <h2>Có {{ $count }} kết quả tìm kiếm của: {{$text_search}}</h2>
        <thead style="text-align: center">
            <tr>
                <th scope="col"></th>
                <th scope="col">{{ __('trans.title') }}</th>
                <th scope="col">{{ __('trans.status') }}</th>
                <th scope="col">{{ __('trans.operation') }}</th>
            </tr>
        </thead>
        <tbody id="accordion" style="text-align: center">
            @foreach ($todos as $todo)
                <tr>
                    <th scope="row">+</th>
                    <td style="width: 700px">
                        <div class="card" >
                            <div class="card-header" id="headingOne{{$todo->id}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$todo->id}}" aria-expanded="true" aria-controls="collapseOne{{$todo->id}}">
                                        <span>{{ $todo->title }}</span>
                                    </button>
                                </h5>
                                <small>{{$todo->created_at}}</small>
                            </div>
                        
                            <div id="collapseOne{{$todo->id}}" class="collapse hidden" aria-labelledby="headingOne{{$todo->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    {{ $todo->content }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ __("trans.$todo->status") }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('todos.edit', $todo->id) }}" title="edit" ><i class="fas fa-edit"></i></a> 
                            </div>  
                            <div class="col-sm-6">
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure about that!')" style="border:none;background:none;color:red"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="custom-pagination">
        {!! $todos->links() !!}
    </div>
</div>
@endsection
