@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            @foreach ($items as $item)
            <div class="item-preview">
                <a href="{{ url('item', ['id' => $item->id]) }}">
                    <h2 class="item-title">{{ $item->title }}</h2>
                    <p>
                        <i class="fa fa-heart"></i>  {{ $item->status }}
                        <i class="fa fa-comment"></i>  {{ $item->quantity }}
                    </p>
                </a>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>


@include('includes.footer')