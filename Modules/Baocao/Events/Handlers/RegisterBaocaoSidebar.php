<?php

namespace Modules\Baocao\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterBaocaoSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Báo Cáo'), function (Item $item) {
                $item->icon('fa fa-keyboard-o');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Báo Cáo Xuất Hàng'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.baocao.baocaoxuattaisan.create');
                    $item->route('admin.baocao.baocaoxuattaisan.index');
                    $item->authorize(
                        $this->auth->hasAccess('baocao.baocaoxuattaisans.index')
                    );
                });
                $item->item(trans('Báo Cáo Nhập Hàng'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.baocao.baocaonhaptaisan.create');
                    $item->route('admin.baocao.baocaonhaptaisan.index');
                    $item->authorize(
                        $this->auth->hasAccess('baocao.baocaonhaptaisans.index')
                    );
                });
                $item->item(trans('Báo Cáo Khác'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.baocao.baocaokhac.create');
                    $item->route('admin.baocao.baocaokhac.index');
                    $item->authorize(
                        $this->auth->hasAccess('baocao.baocaokhacs.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
