<?php

namespace App\Traits;

use App\Models\Subscription;
use App\Models\SubscriptionItem;

trait SubscriptionHelper
{

    /**
     * Get Subscription  Status
     *
     * @param  mixed $status
     * @return html
     */
    public function getStatus($status)
    {
        switch ($status) {
            case Subscription::STATUS['PENDING']:
                return "<span class=' badge bg-warning'>Pending</span>";
                break;
            case Subscription::STATUS['SUCCESS']:
                return "<span class='badge bg-primary'>Success</span> ";
                break;
        }
    }
    /**
     * Get Subscription  Status
     *
     * @param  mixed $status
     * @return html
     */
    public function itemStatus($status)
    {
        switch ($status) {
            case SubscriptionItem::STATUS['DRAFT']:
                return "<span class=' badge bg-warning'>DRAFT</span>";
                break;
            case SubscriptionItem::STATUS['ACTIVE']:
                return "<span class='badge bg-primary'>Active</span> ";
                break;
        }
    }
    /**
     * Subscription Status
     *
     * @param  mixed $status
     * @return void
     */
    public function subscriptionStatus($status)
    {
        return Subscription::STATUS[$status];
    }
}
