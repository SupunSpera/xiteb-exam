<div class="dropend no-arrow mb-1">
    <a class="btn btn-sm btn-icon-only " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fa fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton" x-placement="bottom-start">

        <a class="dropdown-item"
            onclick="acceptQuotation({{ $id }},'Do You Want To Accept This Quotation','Yes , Accept','Quotation Accepted Successfully') "
            href="javascript:void(0);" class="btn btn-warning" title="">
            <i class="fa fa-check"></i>&nbsp;Accept
        </a>
        <a class="dropdown-item"
            onclick="rejectQuotation({{ $id }},'Do You Want To Reject This Quotation','Yes , Reject','Quotation Rejected Successfully') "
            href="javascript:void(0);" class="btn btn-warning" title="">
            <i class="fa fa-trash"></i>&nbsp;Reject
        </a>
    </div>
</div>
