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
use models\beans\BeanRemoveMovement;

class RemoveMovementV extends View
{

    /**
     * Object constructor.
     *
     * @param string|null $tplName The html template containing the static design.
     */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/Proj/remove_movement";
        parent::__construct($tplName);
    }

    /**
     * Update fiellds with bean data
     * @param BeanStore $bean
     */
    public function setFieldsWithBeanData(BeanRemoveMovement $bean)
    {
        // Switch form mode
        if ($bean->getStoreCode() == null) {
            $this->setVar("FormTitle", "{RES:New_Record}");
            $this->setVar("readonly","");
        }else  {
            $this->setVar("FormTitle", "{RES:Edit_Record}: ". $bean->getStoreCode());
            $this->setVar("readonly","readonly");
        }

        $this->setVar("good_movement_id",$bean->getGoodMovementId());
    }



}
