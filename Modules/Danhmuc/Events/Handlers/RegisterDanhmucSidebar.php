<?php

namespace Modules\Danhmuc\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterDanhmucSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Danh Mục'), function (Item $item) {
                $item->icon('fa fa-database');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Danh Mục Loại Tài Sản'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.danhmuc.danhmucloaitaisan.create');
                    $item->route('admin.danhmuc.danhmucloaitaisan.index');
                    $item->authorize(
                        $this->auth->hasAccess('danhmuc.danhmucloaitaisans.index')
                    );
                });
                $item->item(trans('Danh Mục Phòng Ban'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.danhmuc.danhmucphongban.create');
                    $item->route('admin.danhmuc.danhmucphongban.index');
                    $item->authorize(
                        $this->auth->hasAccess('danhmuc.danhmucphongbans.index')
                    );
                });
                $item->item(trans('Danh Mục Nhân Viên'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.danhmuc.danhmucnhanvien.create');
                    $item->route('admin.danhmuc.danhmucnhanvien.index');
                    $item->authorize(
                        $this->auth->hasAccess('danhmuc.danhmucnhanviens.index')
                    );
                });
                $item->item(trans('Danh Mục Nhà Cung Cấp'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.danhmuc.danhmucnhacungcap.create');
                    $item->route('admin.danhmuc.danhmucnhacungcap.index');
                    $item->authorize(
                        $this->auth->hasAccess('danhmuc.danhmucnhacungcaps.index')
                    );
                });

// append




            });
        });

        return $menu;
    }
}
