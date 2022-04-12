<?php

namespace Modules\Baocao\Repositories\Cache;

use Modules\Baocao\Repositories\BaocaonhaptaisanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBaocaonhaptaisanDecorator extends BaseCacheDecorator implements BaocaonhaptaisanRepository
{
    public function __construct(BaocaonhaptaisanRepository $baocaonhaptaisan)
    {
        parent::__construct();
        $this->entityName = 'baocao.baocaonhaptaisans';
        $this->repository = $baocaonhaptaisan;
    }
}
