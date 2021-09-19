<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users List
        </h2>
    </x-slot>
    <div class="container">
        <h1 class="text-center">Product Page</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @can('user_access')
            <div class="card-footer">
                <a href="create" class="btn btn-alert btn-block">Tambah</a>
            </div>
        @endcan
        <div class="row">
            <div class="card-deck">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="card">
                            <img
                                src="{{$product->image}}"
                                alt="{{$product->name}}"
                                class="card-img-top"
                                height="400"
                            >
                            <div class="card-header">
                                {{$product->name}}
                                <span class="float-right">{{$product->amount_with_currency}}</span>
                            </div>
                            <div class="card-body">
                                <p>{!! $product->description !!}</p>
                            </div>
                            @can('user_access')
                                <div class="card-footer">
                                    <a href="create" class="btn btn-success btn-block">Edit(maintenance)</a>
                                </div>
                            @endcan
                            @can('task_access')
                                <div class="card-footer">
                                    <a
                                    href="{{route('add-cart', [$product->id])}}"
                                    class="btn btn-success btn-block"
                                    >Add To Cart</a>
                                </div>
                            @endcan
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
