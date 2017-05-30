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
use views\Proj\PartRecord as PartRecordView;
use framework\components\DataRepeater;
use models\beans\BeanStore;

class PartRecord extends Model
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
    public function makePartTypeCodeList(PartRecordView $view)
    {
        $storeTypeList = new Model();
        $storeTypeList->sql= "SELECT DISTINCT store_type_code, store_type_code FROM store_type";
        $storeTypeList->updateResultSet();
        $list = new DataRepeater($view,$storeTypeList,"part_type_code_list",null);
        $list->render();
    }


    /**
     * Update Table by using bean
     * @param BeanStore $bean
     */
    public function setBeanWithPostedData(BeanStore $bean)
    {
        $bean->setStoreCode($_POST["store_code"]);
        $bean->setName($_POST["name"]);
        $bean->setStoreTypeCode($_POST["store_type_code"]);
    }
}
