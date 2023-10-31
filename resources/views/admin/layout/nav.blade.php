<div class="">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="list-outline"></ion-icon>
        </div>
        
        
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 <h4>{{Auth::guard('admin')->name}}</h4>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
               
            </ul>
        </div>
    </div>
    <hr>
</div>