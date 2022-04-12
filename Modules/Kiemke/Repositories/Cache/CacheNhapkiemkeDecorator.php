<?php

namespace Modules\Kiemke\Repositories\Cache;

use Modules\Kiemke\Repositories\NhapkiemkeRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheNhapkiemkeDecorator extends BaseCacheDecorator implements NhapkiemkeRepository
{
    public function __construct(NhapkiemkeRepository $nhapkiemke)
    {
        parent::__construct();
        $this->entityName = 'kiemke.nhapkiemkes';
        $this->repository = $nhapkiemke;
    }
}
