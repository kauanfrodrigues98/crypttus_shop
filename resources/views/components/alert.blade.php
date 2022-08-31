@if(Session::has('status'))
    <div class="row justify-content-center my-1">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card mb-4 border-left-{{ Session::get('status') }}">
                <div class="card-body">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    </div>
@endif
