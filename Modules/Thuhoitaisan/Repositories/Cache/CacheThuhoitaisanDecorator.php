<?php

namespace Modules\Thuhoitaisan\Repositories\Cache;

use Modules\Thuhoitaisan\Repositories\ThuhoitaisanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheThuhoitaisanDecorator extends BaseCacheDecorator implements ThuhoitaisanRepository
{
    public function __construct(ThuhoitaisanRepository $thuhoitaisan)
    {
        parent::__construct();
        $this->entityName = 'thuhoitaisan.thuhoitaisans';
        $this->repository = $thuhoitaisan;
    }
}
