<?php
/**
 * Class IndexC
 *
 * {ControllerResponsability}
 *
 * @package controllers\examples
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
 */
namespace controllers\Proj;

use framework\Controller;
use framework\Model;
use framework\View;
use models\Proj\IndexM as IndexModel;
use views\Proj\IndexV as IndexView;

// Using some common and shared application controllers
use controllers\examples\cms\NavigationBar;

class IndexC extends Controller
{
    protected $view;
    protected $model;

    /**
     * Object constructor.
     *
     * @param View $view
     * @param Model $mode
     */
    public function __construct(View $view=null, Model $model=null)
    {
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view,$this->model);
    }

    /**
     * Autorun method. Put your code here for running it after object creation.
     * @param mixed|null $parameters Parameters to manage
     *
     */
    protected function autorun($parameters = null)
    {
        // Builds child controller
        $navigation = $this->makeNavigation();

        // Binding child controller and components instances to the main View
        $this->bindController($navigation);
    }

    /**
     * Makes the navigation bars by using a shared application controller
     * @return NavigationBar The navigation bar
     */
    protected function makeNavigation(){
        $navigation = new NavigationBar();
        return $navigation;
    }

    /**
     * Inizialize the View by loading static design of /examples/index.html.tpl
     * managed by views\examples\IndexC class
     *
     */
    public function getView()
    {
        $view = new IndexView("/Proj/index");
        return $view;
    }

    /**
     * Inizialize the Model by loading models\examples\IndexC class
     *
     */
    public function getModel()
    {
        $model = new IndexModel();
        return $model;
    }
}
