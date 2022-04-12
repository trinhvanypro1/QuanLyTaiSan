<?php

namespace Modules\Danhmuctaisan\Repositories\Cache;

use Modules\Danhmuctaisan\Repositories\SuachuaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSuachuaDecorator extends BaseCacheDecorator implements SuachuaRepository
{
    public function __construct(SuachuaRepository $suachua)
    {
        parent::__construct();
        $this->entityName = 'danhmuctaisan.suachuas';
        $this->repository = $suachua;
    }
}
