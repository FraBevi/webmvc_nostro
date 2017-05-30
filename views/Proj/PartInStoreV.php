<?php

namespace views\Proj;

use framework\View;
use framework\components\bootstrap\SorterBootstrap;
use models\Proj\PartInStoreM as PartInStoreModel;
use models\Proj\PartInStoreM;

/**
 * Class PartListManager
 * Part List Manager View
 *
 * @package views\examples\db
 */
class PartInStoreV extends View
{
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "Proj/part_in_store";
        parent::__construct($tplName);
    }

    public function setBlockParts(\mysqli_result $resultset){
        $this->openBlock("Parts");
        while ($part = $resultset->fetch_object()) {
            $this->setVar("part_code",$part->part_code);
            $this->setVar("store_code",$part->store_code);
            $this->setVar("quantity",$part->quantity);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    /**
     * Makes sorter for part_code field
     * @return SorterBootstrap
     */
    public function makeSoterPartCode(PartInStoreModel $model)
    {

        $sorterPartCode = new SorterBootstrap();
        $sorterPartCode->setName("part_code");
        $sorterPartCode->field = "part_code";
        $sorterPartCode->caption = "{RES:part_code}";
        $sorterPartCode->init($model);
        return $sorterPartCode;
    }

    /**
     * Make sorter for description field
     * @return SorterBootstrap
     */
    public function makeSoterStoreCode(PartInStoreModel $model)
    {
        $sorterStoreCode = new SorterBootstrap();
        $sorterStoreCode->setName("store_code");
        $sorterStoreCode->field = "store_code";
        $sorterStoreCode->caption = "{RES:store_code}";
        $sorterStoreCode->init($model);
        return $sorterStoreCode;
    }

    /**
     * Make sorter for source field
     * @return SorterBootstrap
     */
    public function makeSoterQuantity(PartInStoreModel $model)
    {
        $sorterQuantity = new SorterBootstrap();
        $sorterQuantity->setName("quantity");
        $sorterQuantity->field = "quantity";
        $sorterQuantity->caption = "{RES:quantity}";
        $sorterQuantity->init($model);
        return $sorterQuantity;
    }


}
