<?php

namespace Modules\Danhmuc\Repositories\Cache;

use Modules\Danhmuc\Repositories\DanhmucphongbanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDanhmucphongbanDecorator extends BaseCacheDecorator implements DanhmucphongbanRepository
{
    public function __construct(DanhmucphongbanRepository $danhmucphongban)
    {
        parent::__construct();
        $this->entityName = 'danhmuc.danhmucphongbans';
        $this->repository = $danhmucphongban;
    }
}
