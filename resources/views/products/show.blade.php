@extends('layouts.app')

@section('content')
    <div class="card" style="margin-bottom: 20px">
        <div class="card-header">
            {{ $model->name }}
        </div>
        <div class="card-body">
            <div style="padding: 20px; text-align: center">
                <img src="{{ $model->feature_image }}">
            </div>
            <hr>
            <h5 class="card-title">{{ $model->name }}</h5>
            <p class="card-text">{{ $model->content }}</p>
            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus"></i> Add to card</a>
        </div>
        <div class="card-footer text-muted">
            {{ $model->created_at}}
        </div>
    </div>

    <div class="card" style="margin-bottom: 20px">
        <div class="card-header">
            {{ __('Comments') }}
        </div>
        <div class="card-body">
            @guest
                <h5>Please, login to comment for this product</h5>
            @else
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $model->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-10">
                                <input name="noi_dung" class="form-control" placeholder="Your comment content ...">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" style="width: 100%">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endguest
            <?php
            $comments = \App\Models\Comment::where('product_id', $model->id)->paginate(5);
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@thienhungho</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    $products = \App\Models\Product::limit(2)->inRandomOrder()->get();
    ?>
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-6">
                <div class="card" style="margin-bottom: 20px">
                    <img class="card-img-top" src="{{ $product->feature_image }}"
                         alt="{{ $product->name }}" style="padding: 20px;">
                    <div class="card-body">
                        <h5 class="card-title"><a
                                href="{{ route('products.show', ['id' => $product->id]) }}"
                                class="text-dark">{{ $product->name }}</a></h5>
                        <p class="card-text">{{ substr($product->content, 0, 200) }}</p>
                        <a href="{{ route('products.show', ['id' => $product->id]) }}"
                           class="btn btn-primary"><i class="far fa-eye"></i> View</a>
                        <a href="#" class="btn btn-success"><i class="fas fa-cart-plus"></i> Add to card</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection