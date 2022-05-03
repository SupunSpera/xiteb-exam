<div class="dropend no-arrow mb-1">
    <a class="btn btn-sm btn-icon-only " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fa fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton" x-placement="bottom-start">
        <a class="dropdown-item" href="{{ route('notifications.edit',$id) }}" class="btn btn-warning" title="">
            <i class="fa fa-edit"></i>&nbsp;View/Edit
        </a>
        <a class="dropdown-item"
            onclick="changeStatusNotification({{ $id }},'PUBLISHED','Do You Want To Publish This Notification','Yes , Publish','Notification Published Successfully') "
            href="javascript:void(0);" class="btn btn-warning" title="">
            <i class="fa fa-cog"></i>&nbsp;Publish
        </a>
        <a class="dropdown-item"
            onclick="changeStatusNotification({{ $id }},'CANCELLED','Do You Want To Cancel This Notification','Yes , Cancel','Notification Cancelled Successfully') "
            href="javascript:void(0);" class="btn btn-warning" title="">
            <i class="fa fa-times"></i>&nbsp;&nbsp;Cancel
        </a>
        <i class="fa-solid fa-triangle-exclamation"></i>
        <a class="dropdown-item"
            onclick="delconfLivewire('{{ $id }}','Do You Want To Delete This Payout','Yes , Delete','Payout Deleted Successfully') "
            href="javascript:void(0);" class="btn btn-warning" title="">
            <i class="fa fa-trash"></i>&nbsp;Delete
        </a>
    </div>
</div>
