<?php
/**
 * Created by PhpStorm.
 * User: NickChung
 * Date: 28/02/18
 * Time: 4:56 PM
 */

class ModelExtendApi extends Model {
    public function getConsumerHistory($crm_id)
    {
        $sql = "  select a.customer_id,a.firstname,a.email,a.telephone,b.*,c.image,d.* from mcc_order a "
            . " left join mcc_order_product b "
            . " on a.order_id=b.order_id "
            . " left join mcc_product c "
            . " on b.product_id=c.product_id "
            . " left join mcc_product_description d "
            . " on c.product_id=d.product_id and d.language_id=1 "
            . " where customer_id=(select customer_id from mcc_customer where crm_id='$crm_id' limit 0,1)";
        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getStyleMatchList($style_tag_id)
    {
        $sql = " select a.style_tag_id, (select style_tag_name from mcc_style_tag d where d.style_tag_id=a.style_tag_id) "
            . " as style_tag_name "
            . " ,b.image,c.* "
            . " from mcc_style_match a "
            . " left join mcc_product b "
            . " on a.product_id = b.product_id "
            . " left join mcc_product_description c "
            . " on b.product_id=c.product_id and c.language_id=1 "
            . " where style_tag_id=" . (int)$style_tag_id;

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getStyleTagList()
    {
        $sql = " select * from mcc_style_tag ";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function autoRegCustomer($crm_id,$firstname,$lastname,$email,$telephone){
        $sql = " INSERT INTO mcc_customer(customer_group_id,store_id,language_id,firstname,lastname,email,telephone,fax,password,salt,cart "
                .",wishlist,newsletter,address_id,custom_field,ip,status,safe,token,code,date_added,weixin_login_openid,weixin_login_unionid "
                .",weibo_login_access_token,weibo_login_uid,qq_openid,crm_id)"
                ."VALUES ('1', '0', '1', '$firstname', '$lastname', '$email', '$telephone', '', 'eccf449cd40960ff3d606c52d0d7d1d9fbd41259', 'LaACsgOqc', null, null, '0', '1', '', '::1', '1', '0', '', '', CURRENT_TIMESTAMP(), '', '', '', '', '', '$crm_id')";

        $this->db->query($sql);

        return $this->db->getLastId();
    }

    public function getCategoryList()
    {
        $sql = "select a.parent_id,b.* from mcc_category a left join mcc_category_description b on a.category_id = b.category_id and b.language_id=1 order by a.category_id";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getProductListByCategory($cat_id)
    {
        $sql = "select b.image,c.* from mcc_product_to_category a
                inner join mcc_product b
                on a.product_id=b.product_id
                left join mcc_product_description c
                on b.product_id=c.product_id and c.language_id=1
                where a.category_id=".(int)$cat_id;

        $query = $this->db->query($sql);

        return $query->rows;
    }
}