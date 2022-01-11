<?php

class Leaf
{

    public $parent;

    public $value;

    public $type;

    public $leftLeaf;

    public $rightLeaf;

    public function __construct($value)
    {
        $this->type = 'operand';
        $this->parent = null;
        $this->value = $value;
        $this->leftLeaf = null;
        $this->rightLeaf = null;
    }


}

class Tree
{

    public $leafs = [];

    public $expression = [9, '*', 5, '-', 10, '+', 15, '/', 2, '+', 3];

    public function __construct($expression)
    {
        $this->expression = $expression;
    }

    public function buildTree()
    {
        for ($i = 0; $i < count($this->expression); $i++) {

            $leaf = new Leaf($this->expression[$i]);
            $lustOperator = null;
            $lustElement = null;

            if (!empty($this->leafs)) {

                $lustElement = $this->leafs[count($this->leafs) - 1];

                for ($j = count($this->leafs); $j > 0; $j--) {
                    if ($this->leafs[$j - 1]->type === 'operator' && is_null($this->leafs[$j - 1]->parent)) {
                        $lustOperator = $this->leafs[$j - 1];
                        break;
                    }
                }
            }

            if (is_numeric($this->expression[$i])) {

                if (!empty($this->leafs)) {
                    $lustElement->rightLeaf = $leaf;
                    $leaf->parent = $lustElement;
                }

                $this->leafs[] = $leaf;
            }

            if ($this->expression[$i] === '+' || $this->expression[$i] === '-') {

                $leaf->type = 'operator';

                if (!is_null($lustOperator)) {
                    $leaf->leftLeaf = $lustOperator;
                    $lustOperator->parent = $leaf;
                }

                if (is_null($leaf->leftLeaf)) {
                    $leaf->leftLeaf = $lustElement;
                    $lustElement->parent = $leaf;
                }
                $this->leafs[] = $leaf;
            }

            if ($this->expression[$i] === '*' || $this->expression[$i] === '/') {

                $leaf->type = 'operator';

                if (!is_null($lustOperator)) {
                    $leaf->parent = $lustOperator;
                    $lustOperator->rightLeaf = $leaf;
                }

                $lustElement->parent = $leaf;
                $leaf->leftLeaf = $lustElement;

                $this->leafs[] = $leaf;
            }

        }

        $this->leafs = $this->sortLeaves();

    }

    private function sortLeaves()
    {

        $sortLeaves = [];

        while (count($sortLeaves) != count($this->leafs)) {

            if (empty($sortLeaves)) {

                foreach ($this->leafs as $leaf) {

                    if (is_null($leaf->parent)) {
                        $sortLeaves[] = $leaf;
                    }
                }

                continue;
            }

            $nextLeaf = current($sortLeaves);
            if (!is_null($nextLeaf->leftLeaf)) {
                $sortLeaves[] = $nextLeaf->leftLeaf;
            }

            if (!is_null($nextLeaf->rightLeaf)) {
                $sortLeaves[] = $nextLeaf->rightLeaf;
            }

            next($sortLeaves);
        }

        return $sortLeaves;

    }

}

$expression1 = [9, '*', 5, '-', 10, '+', 15, '/', 2, '+', 3];

$expression2 = [5, '+', 3, '*', 7, '-', 5,];

// вроде все получилось, но очень не рекомендую смотреть результаты через дебаггер,
// как сделать нормальный вывод сил уже не хватило

$tree1 = new Tree($expression1);
$tree1->buildTree();
//var_dump($tree1);
//echo '<br>';

$tree2 = new Tree($expression2);
$tree2->buildTree();
//var_dump($tree2);