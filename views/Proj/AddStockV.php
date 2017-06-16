<?php
/**
 * Class StoreRecord
 *
 * {ViewResponsability}
 *
 * @package controllers\examples\db
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
 */
namespace views\Proj;

use framework\View;
use models\beans\BeanStock;

class AddStockV extends View
{

    /**
     * Object constructor.
     *
     * @param string|null $tplName The html template containing the static design.
     */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/Proj/add_stock";
        parent::__construct($tplName);
    }

    /**
     * Update fiellds with bean data
     * @param BeanStore $bean
     */
    public function setFieldsWithBeanData(BeanStock $bean)
    {
        // Switch form mode
        if ($bean->getStoreCode() == null) {
            $this->setVar("FormTitle", "{RES:New_Record}");
            //$this->setVar("readonly","");
        }else  {
            $this->setVar("FormTitle", "{RES:Edit_Record}: ". $bean->getStoreCode());
            $this->setVar("readonly","readonly");
        }

        $this->setVar("store_name_in",$bean->getStoreCode());
        $this->setVar("part_code",$bean->getPartCode());
        //$this->setVar("quantity",$bean->getQuantity());
    }



}
