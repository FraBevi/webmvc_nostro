<?php
/**
 * Class PartListManager
 *
 * {ModelResponsability}
 *
 * @package models\examples\db
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
 */
namespace models\Proj;

use framework\Model;

/**
 * Class PartListManager
 * Part List Manager Model
 *
 * @package models\examples\db
 */
class PartInStoreM extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->sql =
            <<<SQL
        
                        SELECT  
              part_code,
              store_code, 
              quantity,
              stock_store.name
              
            FROM 
              stock_store
              
             
SQL;
        // Also you can use a statement like this:
        // $this->sql = "SELECT t.* FROM part t";
        //
        // Warning:
        // Do not use "SELECT * FROM part" because frameworks components
        // and SQL itself cannot build SQL subquery that use the same table
        $this->updateResultSet();
    }
}
