<?php
namespace app\components;
use yii\base\Widget;
use yii;

class TreeCommentWidget extends Widget
{
    public $model = null;
    public $viewUrlToSearch = true;
    public $viewUrlModelField = 'category_id';
    public $orderField = false;
    public $parentField = 'parent_id';
    public $idField = 'id';
    public $view = 'index';

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $model = $this->model;
        if($this->orderField) {
            $list = $model::find()->orderBy($this->orderField)->asArray()->all();
        } else {
           $list = $model;
        }
        $itemsTree = self::buildArray($list, 0, $this->idField, $this->parentField);

       return $this->render($this->view, [
            'categoriesTree' => self::treeBuild($itemsTree),
        ]);
    }

    private function buildArray($items, $currentElementId = 0, $idKeyname = 'id', $parentIdKeyname = 'parent_id', $parentarrayName = 'news_id')   //childs->news_id
    {
        if(empty($items)) return array();
        $return = [];
        foreach($items as $item) {
            if($item[$parentIdKeyname] == $currentElementId) {
                $item[$parentarrayName] = self::buildArray($items, $item[$idKeyname], $idKeyname, $parentIdKeyname, $parentarrayName);
                $return[] = $item;
            }
        }
        return $return;
    }

    private function treeBuild($items)
    {
        $return = '';
        foreach($items as $item) {
            $return .= '<li>';
            $return .= $this->render('parts/tree_inlist.php', ['widget' => $this, 'category' => $item]);
           if(!empty($item['news_id'])) {

                      //childs->parent_id
                $return .= '<ul class="child">';
                $return .= $this->treeBuild($item['news_id']);  //childs->text
                $return .= '</ul>';
            }
            $return .= '</li>';
        }
        return $return;
    }
}
