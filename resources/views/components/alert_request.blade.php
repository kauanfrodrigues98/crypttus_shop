@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="row justify-content-center my-1">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card mb-4 border-left-danger">
                    <div class="card-body">
                        {{ $error }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
