<?php

namespace Modules\Bangiaotaisan\Repositories\Cache;

use Modules\Bangiaotaisan\Repositories\thuhoitaisanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachethuhoitaisanDecorator extends BaseCacheDecorator implements thuhoitaisanRepository
{
    public function __construct(thuhoitaisanRepository $thuhoitaisan)
    {
        parent::__construct();
        $this->entityName = 'bangiaotaisan.thuhoitaisans';
        $this->repository = $thuhoitaisan;
    }
}
