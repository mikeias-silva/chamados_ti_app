@if($errors->has('error')|| $errors->any())
    <div class="my-2">
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            <ul class="">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if (\Session::has('success'))
    <div class="my-2">
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            <ul class="m-0 px-0">
                <li style="list-style: none;">{{ \Session::get('success') }}</li>
            </ul>
        </div>
    </div>
@endif
@if (\Session::has('warning'))
    <div class="my-2">
        <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            <ul class="m-0 px-0">
                <li style="list-style: none;">{{ \Session::get('warning') }}</li>
            </ul>
        </div>
    </div>
@endif
