<?php

namespace domain\Services\Notifications;

use App\Models\Notification;
use domain\Facades\Notifications\CustomerNotificationFacade;
use domain\Facades\Users\UserFacade;
use Illuminate\Database\Eloquent\Collection;

/**
 * Notification Service
 *
 * php version 8
 *
 * @category Service
 **/
class NotificationService
{

    protected $notification;

    public function __construct()
    {
        $this->notification = new Notification();
    }

    /**
     * Get notification using ID
     *
     * @param  int $id
     * @return Notification
     */
    public function get(int $id): ?Notification
    {
        return $this->notification->find($id);
    }
    /**
     * Create notification object
     *
     * @param array $d
     *
     * @return Notification
     */
    public function make(array $data): Notification
    {
        //Save object
        return $this->create($data);
    }

    /**
     * Save object to DB
     *
     * @param array $notification
     *
     * @return Notification
     */
    public function create(array $notification): Notification
    {
        return $this->notification->create($notification);
    }

    /**
     * Find notification  by id
     *
     * @param  int $id
     *
     * @return Notification
     */
    public function find($id): Notification
    {
        return $this->notification->find($id);
    }
    /**
     * Find notification by id
     *
     * @param int $notification
     *
     * @return Notification
     */
    public function getById(int $notification_id): Notification
    {
        //Find notification data
        return $this->notification->getById($notification_id);
    }

    /**
     * Get all notification
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all notification
        return $this->notification->all();
    }

    /**
     * Update Notification
     *
     * @param Notification $notification
     * @param array $data
     *
     * @return void
     */
    public function update(Notification $notification, array $data)
    {
        //Update Notification object with given data
        $this->notification->update($this->edit($notification, $data));
    }

    /**
     * Edit notification
     *
     * @param Notification $notification
     * @param array $data
     *
     * @return array
     */
    protected function edit(Notification $notification, array $data)
    {
        return array_merge($notification->toArray(), $data);
    }
}
