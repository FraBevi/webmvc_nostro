<?php
/**
 * Class IndexV
 *
 * {ViewResponsability}
 *
 * @package controllers\examples
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
 */
namespace views\Proj;

use framework\View;

class IndexV extends View
{

    /**
     * Object constructor.
     *
     * @param string|null $tplName The html template containing the static design.
     */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/Proj/index";
        parent::__construct($tplName);
    }

}
