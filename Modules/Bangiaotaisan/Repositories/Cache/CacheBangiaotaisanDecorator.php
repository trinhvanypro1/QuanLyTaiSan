<?php

namespace Modules\Bangiaotaisan\Repositories\Cache;

use Modules\Bangiaotaisan\Repositories\BangiaotaisanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBangiaotaisanDecorator extends BaseCacheDecorator implements BangiaotaisanRepository
{
    public function __construct(BangiaotaisanRepository $bangiaotaisan)
    {
        parent::__construct();
        $this->entityName = 'bangiaotaisan.bangiaotaisans';
        $this->repository = $bangiaotaisan;
    }
}
