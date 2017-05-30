<?php

namespace views\Proj;

use framework\View;
use framework\components\bootstrap\SorterBootstrap;
use models\Proj\MoveM as MoveModel;
use models\Proj\MoveM;

/**
 * Class PartListManager
 * Part List Manager View
 *
 * @package views\examples\db
 */
class MoveV extends View
{
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "Proj/movement";
        parent::__construct($tplName);
    }

    public function setBlockParts(\mysqli_result $resultset){
        $this->openBlock("Parts");
        while ($part = $resultset->fetch_object()) {
            $this->setVar("good_movement_id",$part->good_movement_id);
            $this->setVar("movement_date",$part->movement_date);
            $this->setVar("part_code",$part->part_code);
            $this->setVar("store_code",$part->store_code);
            $this->setVar("operation_type",$part->operation_type);
            $this->setVar("quantity",$part->quantity);

            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    /**
     * Makes sorter for part_code field
     * @return SorterBootstrap
     */
    public function makeSoterGoodMovementId(MoveModel $model)
    {

        $sorterGoodMovementId = new SorterBootstrap();
        $sorterGoodMovementId->setName("good_movement_id");
        $sorterGoodMovementId->field = "good_movement_id";
        $sorterGoodMovementId->caption = "{RES:good_movement_id}";
        $sorterGoodMovementId->init($model);
        return $sorterGoodMovementId;
    }

    public function makeSoterMovementDate(MoveModel $model)
    {

        $sorterMovementDate = new SorterBootstrap();
        $sorterMovementDate->setName("movement_date");
        $sorterMovementDate->field = "movement_date";
        $sorterMovementDate->caption = "{RES:movement_date}";
        $sorterMovementDate->init($model);
        return $sorterMovementDate;
    }


    public function makeSoterPartCode(MoveModel $model)
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
    public function makeSoterStoreCode(MoveModel $model)
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
    public function makeSoterQuantity(MoveModel $model)
    {
        $sorterQuantity = new SorterBootstrap();
        $sorterQuantity->setName("quantity");
        $sorterQuantity->field = "quantity";
        $sorterQuantity->caption = "{RES:quantity}";
        $sorterQuantity->init($model);
        return $sorterQuantity;
    }


    public function makeSoterOperation(MoveModel $model)
    {
        $sorterOperation = new SorterBootstrap();
        $sorterOperation->setName("operation_type");
        $sorterOperation->field = "operation_type";
        $sorterOperation->caption = "{RES:operation_type}";
        $sorterOperation->init($model);
        return $sorterOperation;
    }
    public function makeSoterName(MoveModel $model)
    {
        $sorterName = new SorterBootstrap();
        $sorterName->setName("name");
        $sorterName->field = "name";
        $sorterName->caption = "name";
        $sorterName->init($model);
        return $sorterName;
    }


}
