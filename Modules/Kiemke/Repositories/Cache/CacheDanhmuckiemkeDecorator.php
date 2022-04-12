<?php

namespace Modules\Kiemke\Repositories\Cache;

use Modules\Kiemke\Repositories\DanhmuckiemkeRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDanhmuckiemkeDecorator extends BaseCacheDecorator implements DanhmuckiemkeRepository
{
    public function __construct(DanhmuckiemkeRepository $danhmuckiemke)
    {
        parent::__construct();
        $this->entityName = 'kiemke.danhmuckiemkes';
        $this->repository = $danhmuckiemke;
    }
}
