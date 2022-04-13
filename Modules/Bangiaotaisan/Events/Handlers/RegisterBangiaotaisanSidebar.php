<?php

namespace Modules\Bangiaotaisan\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterBangiaotaisanSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Bàn Giao Tài Sản'), function (Item $item) {
                $item->icon('fa fa-sellsy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Bàn Giao Tài Sản'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.bangiaotaisan.bangiaotaisan.create');
                    $item->route('admin.bangiaotaisan.bangiaotaisan.index');
                    $item->authorize(
                        $this->auth->hasAccess('bangiaotaisan.bangiaotaisans.index')
                    );
                });
                $item->item(trans('bangiaotaisan::thuhoitaisans.title.thuhoitaisans'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.bangiaotaisan.thuhoitaisan.create');
                    $item->route('admin.bangiaotaisan.thuhoitaisan.index');
                    $item->authorize(
                        $this->auth->hasAccess('bangiaotaisan.thuhoitaisans.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
