<?php

namespace Modules\Baocao\Repositories\Cache;

use Modules\Baocao\Repositories\BaocaokhacRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBaocaokhacDecorator extends BaseCacheDecorator implements BaocaokhacRepository
{
    public function __construct(BaocaokhacRepository $baocaokhac)
    {
        parent::__construct();
        $this->entityName = 'baocao.baocaokhacs';
        $this->repository = $baocaokhac;
    }
}
