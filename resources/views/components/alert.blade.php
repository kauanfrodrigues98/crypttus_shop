@if(Session::has('status'))
    <div class="row justify-content-center my-5">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card mb-4 py-3 border-left-{{ Session::get('status') }}">
                <div class="card-body">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    </div>
@endif
