<?php

namespace Controllers;

use App\Models\FaqModel;

class FaqController extends Controller
{
    protected $faqModel;



    public function __construct()
    {
        $this->faqModel = $this->model('FaqModel');
    }

    public function indexAction()
    {
        $this->tableAction();
    }

    public function tableAction($action = 'orderby', $orderby = 'score', $order = 'desc')
    {
     //   $columnsMeta = $this->faqModel->getColumnsMeta();



        $args = [];
        $args['action'] = $action;
        $args['orderby'] = $orderby;
        $args['order'] = $order;
        $args['filterby'] = $_GET;

        // Get fag and sorting args
        $data = $this->faqModel->getFAQ();

        $this->view('faq/list', [
            'faq' => $data['faq'],



        ]);
    }
}
