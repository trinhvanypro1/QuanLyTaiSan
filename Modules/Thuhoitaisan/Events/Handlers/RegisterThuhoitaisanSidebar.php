<?php

namespace Modules\Thuhoitaisan\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterThuhoitaisanSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Thu Hồi Tài Sản'), function (Item $item) {
                $item->icon('fa fa-retweet');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Danh Sách Mượn & Thu Hồi'), function (Item $item) {
                    $item->icon('fa fa-circle-thin');
                    $item->weight(0);
                    $item->append('admin.thuhoitaisan.thuhoitaisan.create');
                    $item->route('admin.thuhoitaisan.thuhoitaisan.index');
                    $item->authorize(
                        $this->auth->hasAccess('thuhoitaisan.thuhoitaisans.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
