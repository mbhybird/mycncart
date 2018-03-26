<?php
/**
 * Created by PhpStorm.
 * User: NickChung
 * Date: 28/02/18
 * Time: 5:02 PM
 */
class ControllerExtendApi extends Controller {
    //url=>http://localhost/mycncart/index.php?route=extend/api/getConsumerHistory&crm_id=crm_2018020111200
    public function getConsumerHistory() {

        $this->load->model('extend/api');
        $list = $this->model_extend_api->getConsumerHistory($this->request->get['crm_id']);

        $json = $list;

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    //url=>http://localhost/mycncart/index.php?route=extend/api/getStyleMatchList&style_tag_id=1
    public function getStyleMatchList() {

        $this->load->model('extend/api');
        $list = $this->model_extend_api->getStyleMatchList($this->request->get['style_tag_id']);

        $json = $list;

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    //url=>http://localhost/mycncart/index.php?route=extend/api/getStyleTagList
    public function getStyleTagList() {

        $this->load->model('extend/api');
        $list = $this->model_extend_api->getStyleTagList();

        $json = $list;

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    //url=>http://localhost/mycncart/index.php?route=extend/api/autoRegCustomer&crm_id=crm_2018020111200&firstname=fn&lastname=ln&email=fn@qq.com&telephone=10086
    public function autoRegCustomer(){
        $this->load->model('extend/api');
        $crm_id = $this->request->get['crm_id'];
        $firstname = $this->request->get['firstname'];
        $lastname = $this->request->get['lastname'];
        $email = $this->request->get['email'];
        $telephone = $this->request->get['telephone'];
        $customer_id = $this->model_extend_api->autoRegCustomer($crm_id,$firstname,$lastname,$email,$telephone);

        $json = array(
            'customer_id' => $customer_id
        );

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    //url=>http://localhost/mycncart/index.php?route=extend/api/getCategoryList
    public function getCategoryList(){
        $this->load->model('extend/api');
        $list = $this->model_extend_api->getCategoryList();

        $json = $list;

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    //url=>http://localhost/mycncart/index.php?route=extend/api/getProductListByCategory&cat_id=34
    public function getProductListByCategory(){
        $this->load->model('extend/api');
        $list = $this->model_extend_api->getProductListByCategory($this->request->get['cat_id']);

        $json = $list;

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
