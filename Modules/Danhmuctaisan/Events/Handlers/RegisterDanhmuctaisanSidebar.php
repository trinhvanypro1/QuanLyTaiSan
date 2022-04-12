<?php

namespace Modules\Danhmuctaisan\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterDanhmuctaisanSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Quản Lý Tài Sản'), function (Item $item) {
                $item->icon('fa fa-bank');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Tài Sản'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.danhmuctaisan.nhaptaisan.create');
                    $item->route('admin.danhmuctaisan.nhaptaisan.index');
                    // $item->route('admin.danhmuctaisan.nhaptaisan.details');
                    $item->authorize(
                        $this->auth->hasAccess('danhmuctaisan.nhaptaisans.index')
                    );
                });
                $item->item(trans('Sửa Chữa'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.danhmuctaisan.suachua.create');
                    $item->route('admin.danhmuctaisan.suachua.index');
                    $item->authorize(
                        $this->auth->hasAccess('danhmuctaisan.suachuas.index')
                    );
                });
                $item->item(trans('Bảo Dưỡng'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.danhmuctaisan.baoduong.create');
                    $item->route('admin.danhmuctaisan.baoduong.index');
                    $item->authorize(
                        $this->auth->hasAccess('danhmuctaisan.baoduongs.index')
                    );
                });

// append




            });
        });

        return $menu;
    }
}
