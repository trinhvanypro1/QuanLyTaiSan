<?php

namespace Modules\Kiemke\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterKiemkeSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('Kiểm Kê'), function (Item $item) {
                $item->icon('fa fa-key');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Kiểm Kê'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.kiemke.nhapkiemke.create');
                    $item->route('admin.kiemke.nhapkiemke.index');
                    $item->authorize(
                        $this->auth->hasAccess('kiemke.nhapkiemkes.index')
                    );
                });
                $item->item(trans('Danh Mục Kiểm Kê'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.kiemke.danhmuckiemke.create');
                    $item->route('admin.kiemke.danhmuckiemke.index');
                    $item->authorize(
                        $this->auth->hasAccess('kiemke.danhmuckiemkes.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
