<?php

namespace Modules\Danhmuctaisan\Repositories\Cache;

use Modules\Danhmuctaisan\Repositories\NhaptaisanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheNhaptaisanDecorator extends BaseCacheDecorator implements NhaptaisanRepository
{
    public function __construct(NhaptaisanRepository $nhaptaisan)
    {
        parent::__construct();
        $this->entityName = 'danhmuctaisan.nhaptaisans';
        $this->repository = $nhaptaisan;
    }
}
