<?php

namespace Modules\Customer\Services;

use App\Services\BaseService;

class CustomerService extends BaseService
{
    public function getGift($params) {
        $data = $this->requestApi('customer/gift', $params);

        return $data;
    }

    public function info() {
        $data = $this->requestApi('auth/detail-info');

        return $data;
    }
}
