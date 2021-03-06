<?php

namespace LaravelMenu;

use Illuminate\View\Component;
use Illuminate\Support\Facades\View;
use LaravelMenu\model\MenuModel;

class MenuComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type='v';

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $items = MenuModel::tree();

        if (View::exists('components.cmenu')):
            return view('components.cmenu', ['items' => $items]);
        else:
            return View::file(__DIR__ . '/views/components/cmenu.blade.php', ['items' => $items]);
        endif;
    }
}
