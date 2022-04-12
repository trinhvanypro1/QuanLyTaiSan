<?php

namespace Modules\Danhmuc\Repositories\Cache;

use Modules\Danhmuc\Repositories\DanhmucloaitaisanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDanhmucloaitaisanDecorator extends BaseCacheDecorator implements DanhmucloaitaisanRepository
{
    public function __construct(DanhmucloaitaisanRepository $danhmucloaitaisan)
    {
        parent::__construct();
        $this->entityName = 'danhmuc.danhmucloaitaisans';
        $this->repository = $danhmucloaitaisan;
    }
}
