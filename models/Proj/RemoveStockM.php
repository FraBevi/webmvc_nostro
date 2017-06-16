<?php
/**
 * Class StoreRecord
 *
 * {ModelResponsability}
 *
 * @package models\examples\db
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
 */
namespace models\Proj;

use framework\Model;
use models\beans\BeanRemoveStock;
use views\Proj\RemoveStockV;
use framework\components\DataRepeater;

class RemoveStockM extends Model
{

    /**
     * Object constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Autorun method. Put your code here for running it after object creation.
     * @param mixed|array|null $parameters Additional parameters to manage
     *
     */
    protected function autorun($parameters = null)
    {

    }

    /**
     * Build select list values for Measurament Code by using a DataRepeater
     *
     * @param PartRecordView $view
     */
    public function makePartTypeCodeList(RemoveStockV $view)
    {
        $storeTypeList = new Model();
        $storeTypeList->sql= "SELECT DISTINCT name FROM store";
        $storeTypeList->updateResultSet();
        $list = new DataRepeater($view,$storeTypeList,"part_type_code_list",null);
        $list->render();
    }


    /**
     * Update Table by using bean
     * @param BeanGoodMovement $bean
     */
    public function setBeanWithPostedData(BeanRemoveStock $bean)
    {
        $bean->setPartCode($_POST["part_code"]);
        $bean->setStoreCode($_POST["store_name_in"]);
    }
}
