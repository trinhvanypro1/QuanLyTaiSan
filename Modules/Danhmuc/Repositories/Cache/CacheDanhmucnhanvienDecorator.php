<?php

namespace Modules\Danhmuc\Repositories\Cache;

use Modules\Danhmuc\Repositories\DanhmucnhanvienRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDanhmucnhanvienDecorator extends BaseCacheDecorator implements DanhmucnhanvienRepository
{
    public function __construct(DanhmucnhanvienRepository $danhmucnhanvien)
    {
        parent::__construct();
        $this->entityName = 'danhmuc.danhmucnhanviens';
        $this->repository = $danhmucnhanvien;
    }
}
