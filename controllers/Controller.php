<?php
class Controller
{
    public $load;
    public $model;

    function __construct($pageURI = null)
    {
        $this->load = new Load();
        $this->model = new Model();
        $this->$pageURI();
    }
    function home()
    {
        try {
            $this->model->initModel();
        } catch (Exception $e) {
        };
        $this->load->view('homePage');
    }
    function apiCreateTable()
    {
        // echo "Create table function";
        $data = $this->model->createTable();
        $this->load->view('viewMessage', $data);
    }
    function apiInsertData($inseartData)
    {
        $data = $this->model->insert('Model_3D', $inseartData);
        $this->load->view('viewMessage', $data);
    }
    function initProject()
    {
        try {
            $this->model->initModel();
        } catch (Exception $e) {
        };
        $this->load->view('homePage');
    }
    function homePageJSONapi()
    {
        echo json_encode(array($this->model->getHomePageInfo(),$this->model->dbGetData()));
        // return json_encode($this->model->get_model3D_info());
    }
}
