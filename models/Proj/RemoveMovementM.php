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
use models\beans\BeanRemoveMovement;
use views\Proj\RemoveMovementV;
use framework\components\DataRepeater;

class RemoveMovementM extends Model
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
    public function makePartTypeCodeList(RemoveMovementV $view)
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
    public function setBeanWithPostedData(BeanRemoveMovement $bean)
    {
        $bean->setGoodMovementId($_POST["good_movement_id"]);
    }
}
