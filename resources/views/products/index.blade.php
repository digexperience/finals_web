@extends('products.layout')
 
@section('content')

    <section>
            <h1>Data Table</h1>
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>
            <div class="tbl-header">
            @if ($message = Session::get('success'))
                    <div class="row">
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
            @endif
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
            </table>
            </div>
            <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
        @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
        
                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
            
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    </section>
@endsection