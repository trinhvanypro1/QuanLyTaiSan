<?php

namespace Modules\Danhmuc\Repositories\Cache;

use Modules\Danhmuc\Repositories\DanhmucnhacungcapRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDanhmucnhacungcapDecorator extends BaseCacheDecorator implements DanhmucnhacungcapRepository
{
    public function __construct(DanhmucnhacungcapRepository $danhmucnhacungcap)
    {
        parent::__construct();
        $this->entityName = 'danhmuc.danhmucnhacungcaps';
        $this->repository = $danhmucnhacungcap;
    }
}
