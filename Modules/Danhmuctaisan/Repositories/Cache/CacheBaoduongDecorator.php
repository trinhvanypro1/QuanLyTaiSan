<?php

namespace Modules\Danhmuctaisan\Repositories\Cache;

use Modules\Danhmuctaisan\Repositories\BaoduongRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBaoduongDecorator extends BaseCacheDecorator implements BaoduongRepository
{
    public function __construct(BaoduongRepository $baoduong)
    {
        parent::__construct();
        $this->entityName = 'danhmuctaisan.baoduongs';
        $this->repository = $baoduong;
    }
}
