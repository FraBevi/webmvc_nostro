<?php
namespace controllers\Proj;

// Basic Framework classes usage
use framework\Controller;
use framework\Model;
use framework\View;

// Use related applications View and Model
use models\Proj\PartInStoreM;
use function PHPSTORM_META\type;
use views\ProJ\MoveV as MoveView;
use models\Proj\MoveM as MoveModel;

// Using some common and shared application controllers
use controllers\examples\cms\NavigationBar;

// Using some framework components
use framework\components\bootstrap\PaginatorBootstrap;
use framework\components\Searcher;
use framework\components\DataRepeater;
use framework\components\bootstrap\SorterBootstrap;
use views\Proj\MoveV;

/**
 * Class PartListManager
 * Manages Parts.
 *
 * @package controllers\examples\db
 */


class MoveC extends Controller
{

    public function __construct(View $view=null, Model $model=null)
    {
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view,$this->model);
    }


    public function getView()
    {
        $view = new MoveV();
        return $view;
    }


    public function getModel()
    {
        $model = new MoveModel();
        return $model;
    }


    public function autorun($parameters = null)
    {
        parent::autorun($parameters);

        // Builds child controller
        $navigation = $this->makeNavigation();



        $searcher = $this->makeSearcher();

        $sorterGoodMovementId = $this->view->makeSoterGoodMovementId($this->model);
        $sorterMovementDate = $this->view->makeSoterMovementDate($this->model);
        $sorterPartCode = $this->view->makeSoterPartCode($this->model);
        $sorterStoreCode = $this->view->makeSoterStoreCODE($this->model);
        $sorterQuantity = $this->view->makeSoterQuantity($this->model);



        $pagination = $this->makePagination();
        $parts = $this->makePartsWithDataRepeater();

        // Binding child controller and components instances to the main View
        $this->bindController($navigation);

        // Binding components instances to the main View (by
        // using the same creation order)
        $this->bindComponent($searcher,false);

        $this->bindComponent($sorterGoodMovementId);
        $this->bindComponent($sorterMovementDate);
        $this->bindComponent($sorterPartCode);
        $this->bindComponent($sorterStoreCode);
        $this->bindComponent($sorterQuantity);



        $this->bindComponent($pagination);

        $this->bindComponent($parts);
    }

    /**
     * Makes a Searcher Component
     * The componponent uses new View witch uses itself
     * an external template design (part_search_form.html.tpl).
     *
     * @return Searcher We can use it to binding it {Searcher:ricerca}
     *                  placeholder of the main View
     */
    protected function makeSearcher()
    {
        // Creates a searcher by using a new View and an external template
        // for its search form HTML design.
        $view = new View("Proj/movement_search");
        $searcher = new Searcher($view, $this->model);

        // Set component name
        $searcher->setName("ricerca");


        // Creates filters:
        // parameters: table field, form input, operators into query, data type
        $searcher->addFilter("good_movement_id","s_good_movement_id","=","string");
        $searcher->addFilter("movement_date","s_movement_date","=","string");

        $searcher->addFilter("part_code","s_part_code","=","string");
        $searcher->addFilter("store_code","s_store_code","LIKE","string");
        $searcher->addFilter("quantity","s_quantity","=","int");

        // Sets form name (tpl variable)
        $searcher->setFormName("search_form", $searcher->getName());

        // Sets component submit and reset inputs name (tpl variables)
        $searcher->setResetButton("search_reset", "Reset");
        $searcher->setSubmitButton("search_submit","Cerca");

        // Init component ( do the search job for you if :) )
        $searcher->init($this->model,$view);
        return $searcher;
    }


    /**
     * Makes pagination by using PaginatorBootstrap component
     * @return PaginatorBootstrap
     */
    protected function makePagination(){
        $paginator = new PaginatorBootstrap();
        $paginator->setName("Bottom");
        $paginator->resultPerPage = 15;
        $paginator->setModel($this->model);
        $paginator->buildPagination();
        $this->model->sql = $paginator->query;
        return $paginator;
    }

    /**
     * Makes part list by using a DataRepeater
     * @return DataRepeater The DataRepeater to use form binging it
     *                      to Parts Block of the main View
     */
    protected function makePartsWithDataRepeater()
    {
        $parts = new  DataRepeater($this->view,$this->model,"Parts",null);
        return $parts;

    }

    /**
     * Makes the navigation bars by using a shared application controller
     * @return NavigationBar The navigation bar
     */
    protected function makeNavigation(){
        $navigation = new NavigationBar();
        return $navigation;
    }

}