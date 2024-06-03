@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            <p>Create item</p>
            <form method="POST" action="{{ route('item.create') }}">
                @csrf
                <div class="control-group">
                    <div class="form-floating controls mb-3"><input class="form-control" type="text" name="item[title]" required placeholder="Название"><label class="form-label">Title</label><small class="form-text text-danger help-block"></small></div>
                </div>
                <div class="control-group">
                    <div class="form-floating controls mb-3">
                        <input class="form-control"  type="number" id="tentacles" name="item[price]" min="10" max="100" required placeholder="price" />
                        <label class="form-label">Content</label><small class="form-text text-danger help-block"></small></div>
                </div>
                <div class="mb-3"><button class="btn btn-primary" id="sendMessageButton" type="submit">Create</button></div>
            </form>
        </div>
    </div>
</div>

@if($errors -> any())
    <h3>Возникла ошибка при создании поста</h3>
    <ul>
    @foreach ($errors -> all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

@include('includes.footer')
