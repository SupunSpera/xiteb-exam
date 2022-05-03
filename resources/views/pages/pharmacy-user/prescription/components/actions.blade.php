<div class="dropend no-arrow mb-1">
    <a class="btn btn-sm btn-icon-only " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fa fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton" x-placement="bottom-start">
        <a class="dropdown-item" href="{{ route('prescription.view',$id) }}" class="btn btn-warning" title="">
            <i class="fa fa-eye"></i>&nbsp;View
        </a>
        @if(Auth::user()->user_role==1)
        <a class="dropdown-item" href="{{ route('quotation.create',$id) }}" class="btn btn-warning" title="">
            <i class="fa fa-eye"></i>&nbsp;Create Quotation
        </a>
        @endif
    </div>
</div>
