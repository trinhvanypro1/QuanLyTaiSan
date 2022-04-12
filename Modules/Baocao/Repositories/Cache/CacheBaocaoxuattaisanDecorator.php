<?php

namespace Modules\Baocao\Repositories\Cache;

use Modules\Baocao\Repositories\BaocaoxuattaisanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBaocaoxuattaisanDecorator extends BaseCacheDecorator implements BaocaoxuattaisanRepository
{
    public function __construct(BaocaoxuattaisanRepository $baocaoxuattaisan)
    {
        parent::__construct();
        $this->entityName = 'baocao.baocaoxuattaisans';
        $this->repository = $baocaoxuattaisan;
    }
}
