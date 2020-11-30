<?php

namespace Site;

use Site\Helper\Redirector;
use Site\Interfaces\IModel;
use Site\Interfaces\IViewer;

/**
 * Class User
 * @package Site
 */
class User extends Controller
{
    /**
     * @const string
     */
    const METHOD_NAME="Action";
    /**
     * @var \Site\Interfaces\IViewer
     */
    public $viewer;
    /**
     * @var \Site\Interfaces\IModel
     */
    public $model;

    /**
     * User constructor.
     * @param \Site\Viewer $viewer
     */
    public function __construct(IViewer $viewer, IModel $model)
    {
        $this->viewer = $viewer;
        $this->model = $model;
    }
    /**
     *
     */
    public function listAction():void {
        $this->renderView($this->getActionName(__FUNCTION__), $this->model->list());
    }

    /**
     * @return mixed|void
     */
    public function getAction():void
    {
        $this->renderView($this->getActionName(__FUNCTION__));
    }

    /**
     * @return mixed|void
     */
    public function postAction():void
    {
        Redirector::redirect(empty($this->model->add($_POST))? "get": "");
    }

    /**
     * @return mixed|string
     */
    public function notFoundAction():void
    {
        $this->renderView($this->getActionName(__FUNCTION__));
    }

    /**
     * @param array $params
     * @param string $tpl
     */
    protected function renderView( string $tpl = '', array $params = []):void {
        $this->viewer->setTpl($tpl);
        $this->viewer->set('params', $params);
        $this->viewer->render();
    }

    /**
     * @param string $action
     * @return string
     */
    protected function getActionName(string $action = ""):string
    {
        return explode(self::METHOD_NAME, $action)[0];
    }
}