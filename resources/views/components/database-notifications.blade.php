<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter">3+</span>
</a>
<!-- Dropdown - Alerts -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
     aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
        Notificações
    </h6>
    @foreach(Auth::user()->unreadNotifications as $notification)
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
            <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
            </div>
        </div>
        <div>
            <div class="small text-gray-500">{{ date('d/m/Y', strtotime($notification->created_at)) }}</div>
            <span class="font-weight-bold">{{ $notification->data['menssage'] }}</span>
        </div>
    </a>
    @endforeach
    <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar mais</a>
</div>
