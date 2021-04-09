<?php

namespace Modules\Customer\Services;

use App\Services\BaseService;

class NotificationService extends BaseService
{
    public function getListNotification($params){
        $data = $this->requestApi('customer/notification', $params);

        return $data;
    }

    public function getNotification($notification_id){
        $data = $this->requestApi('customer/notification/'.$notification_id);

        return $data;
    }

    public function updateReadNotification($notification_id){
        $data = $this->requestApi('customer/notification/'.$notification_id, null, 'POST');

        return $data;
    }

    public function deleteNotification($notification_id){
        $data = $this->requestApi('customer/notification/'.$notification_id, null, 'delete');

        return $data;
    }

    public function counterNotification(){
        $data = $this->requestApi('customer/notification/counter');

        return $data;
    }

    public function resetCounterNotification(){
        $data = $this->requestApi('customer/notification/counter', null, 'post');

        return $data;
    }
}
