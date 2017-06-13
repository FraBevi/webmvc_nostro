<?php
/**
 * Class StoreRecord
 *
 * {ControllerResponsability}
 *
 * @package controllers\examples\db
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace controllers\Proj;

use framework\Controller;
use framework\Model;
use framework\View;

use models\Proj\MovimentazioneM as MovimentazioneModel;
use views\Proj\MovimentazioneV  as MovimentazioneView;

use controllers\examples\cms\NavigationBar;

use framework\components\Record;
use models\beans\BeanStore;
use framework\BeanAdapter;

class MovimentazioneC extends Controller
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
        // Use application NavigationBar Controller
        $navigation = new NavigationBar();
        $navigation->view->loadCustomTemplate("templates/examples/cms/navigation_bar_record");

        // Binding child controller NavigationBar
        $this->bindController($navigation);

        // Builds select options values
        $this->model->makePartTypeCodeList($this->view);

        // Creates a record component instance
        $record = new Record();

        // Customizes the record components
        $record->setName("PartManagerRecord");
        $record->registerPkUrlParameter("part_code");

        // Optionals setting
        $record->registerActionName($record::ADD, "aggiungi");
        $record->registerActionName($record::UPDATE, "modifica");
        $record->registerActionName($record::DELETE, "elimina");
        $record->registerActionName($record::CLOSE, "chiudi");

        // Gets curren record
        $currentRecord = $record->getCurrentRecord();

        // Sets history back for button close and delete
        $historyBack = $record->getControllerHistoryBack("MovimentazioneC");
        $record->redirectAfterClose = $historyBack;
        $record->redirectAfterDelete = $historyBack;

        // Sets disallow mode
        $record->disallowMode = $record::DISALLOW_MODE_WITH_HIDE;
        // $record->disallowAction(record::UPDATE);
        // $record->disallowAction($record::DELETE);

        // Creates BeanAclActions, its BeanAdapter and select the
        // current record
        $bean = new BeanStore();
        $beanAdapter = new BeanAdapter($bean);
        $beanAdapter->select($currentRecord);

        // Handles form submission and updates the bean attributes
        // with posted data
        if ($record->isSubmitted()){
            $this->model->setBeanWithPostedData($bean);
        }

        // Initializes record component with BeanAdapter
        // (and automatically with its managed Bean BeanPart)
        try {
            $record->init($beanAdapter);
        } catch (\Exception $e){

            if ($record->editMode == false) {
                $bean->setPartCode(null);
                $record->disallowAction(Record::UPDATE);
                $record->disallowAction(Record::DELETE);
            } else {
                $record->disallowAction(Record::ADD);
            }

        };

        // Binding Record Component to the view (without rendering)
        $this->bindComponent($record,false);

        // Set others view fields values with bean data
        $this->view->setFieldsWithBeanData($bean);

        // Pocesses record errors
        $this->view->parseErrors($record->getErrors());

    }


    public function open($pk)
    {
        $_GET["store_code"] = $pk;
        $this->autorun();
        $this->render();
    }

    public function add($dummy)
    {
        $this->autorun();
        $this->render();
    }

    /**
    * Inizialize the View by loading static design of /examples/db/store_record.html.tpl
    * managed by views\examples\db\StoreRecord class
    *
    */
    public function getView()
    {
        $view = new MovimentazioneView("/proj/movimentazione");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\examples\db\StoreRecord class
    *
    */
    public function getModel()
    {
        $model = new MovimentazioneModel();
        return $model;
    }
}
