<?php

namespace AppBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('new')
            ->setLabel('Libraries')
        ;

        $newSubmenu
            ->addChild('new-subitem', [
                'route' => 'app_admin_books_index',
            ])
            ->setLabel('Books');
        $newSubmenu
            ->addChild('new-subitem1', [
                'route' => 'app_admin_authors_index',
            ])
            ->setLabel('Authors');
        $newSubmenu
            ->addChild('new-subitem2', [
                'route' => 'app_admin_libraries_index',
            ])
            ->setLabel('Libraries')
        ;
    }
}