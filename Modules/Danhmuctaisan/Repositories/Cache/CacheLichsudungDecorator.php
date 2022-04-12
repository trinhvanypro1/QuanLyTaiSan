<?php

namespace Modules\Danhmuctaisan\Repositories\Cache;

use Modules\Danhmuctaisan\Repositories\LichsudungRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLichsudungDecorator extends BaseCacheDecorator implements LichsudungRepository
{
    public function __construct(LichsudungRepository $lichsudung)
    {
        parent::__construct();
        $this->entityName = 'danhmuctaisan.lichsudungs';
        $this->repository = $lichsudung;
    }
}
