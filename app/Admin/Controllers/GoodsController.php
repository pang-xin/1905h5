<?php

namespace App\Admin\Controllers;

use App\Model\Goods;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\Goods';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Goods());

        $grid->column('goods_id', __('Goods id'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('goods_sn', __('Goods sn'));
        $grid->column('goods_price', __('Goods price'));
        $grid->column('goods_file', __('Goods file'));
        $grid->column('goods_desc', __('Goods desc'));
        $grid->column('is_up', __('Is up'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Goods::findOrFail($id));

        $show->field('goods_id', __('Goods id'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_sn', __('Goods sn'));
        $show->field('goods_price', __('Goods price'));
        $show->field('goods_file', __('Goods file'));
        $show->field('goods_desc', __('Goods desc'));
        $show->field('is_up', __('Is up'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Goods());

        $form->text('goods_name', __('Goods name'));
        $form->text('goods_sn', __('Goods sn'));
        $form->text('goods_price', __('Goods price'));
        $form->file('goods_file', __('Goods file'));
        $form->text('goods_desc', __('Goods desc'));
        $form->text('is_up', __('Is up'))->default('1');

        return $form;
    }
}
