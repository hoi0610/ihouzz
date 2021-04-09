<?php

namespace Modules\Customer\Services;

use App\Services\BaseService;

class FeedbackService extends BaseService
{
    public function store($params){
        $data = $this->requestApi('feedback',$params,'post');
        return $data;
    }
}
