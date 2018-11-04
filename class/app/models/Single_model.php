<?php
class Single_model extends CI_Model {

  public function __construct()
  {
          $this->load->database();
  }

  public function send_offer($user)
            {
            $data = array(
            'of_value' => $this->input->post('value'),
            'of_to' => $this->input->post('to'),
            'of_product' => $this->input->post('prd'),
            'of_from' => $user,
            );
            return $this->db->insert('offers', $data);
            }

  public function send_message($user)
            {
            $data = array(
            'me_message' => $this->input->post('message'),
            'me_to' => $this->input->post('to'),
            'me_prd' => $this->input->post('prd'),
            'me_from' => $user,
            );
            return $this->db->insert('messages', $data);
            }

  public function get_comments($id)
     {
            $this->db->from('comments');
            $this->db->where('co_product',$id);
            $this->db->join('users','users.us_id =comments.co_poster');
            $this->db->order_by('co_id',"desc");
            $query = $this->db->get();
            if($query->num_rows()>0)
            {
              $result = $query->result_array();
              return $result;
            }
            else return false;
    }

  public function create_comment($user)
            {
            $data = array(
            'co_comment' => $this->input->post('comment'),
            'co_poster' => $user,
            'co_product' => $this->input->post('product_id'),
            'co_product_user' => $this->input->post('co_product_user'),
            'co_date' => date('y-m-d'),
            );
            return $this->db->insert('comments', $data);
            }

  public function get_recently_viewed($recently_viewed)
  {
    $this->db->from('products');
    $this->db->where_in('pr_id',$recently_viewed);
    $this->db->limit('4');
  //  $this->db->order_by($recently_viewed);
    $query = $this->db->get();
          if($query->num_rows()>0)
          {
            $result = $query->result_array();
            return $result;
          }
          else return false;
  }


  public function send_product_offer($user)
  {
    $data = array(
    'po_product' => $this->input->post('prd'),
    'po_offer_product' => $this->input->post('product'),
    'po_user' => $user,
    'po_val_type' => $this->input->post('val_type'),
    'po_val' => $this->input->post('value'),
    'po_to' => $this->input->post('po_to'),
    );
    return $this->db->insert('product_offers', $data);
  }

    public function get_product($id)
    {
        $this->db->from('products');
        $this->db->where('pr_id',$id);
        $this->db->join('users','users.us_id =products.pr_user');
        $query = $this->db->get();
              if($query->num_rows()>0)
              {
                $result = $query->row_array();
                return $result;
              }
              else return false;
    }

    public function get_products($user)
    {
        $this->db->from('products');
        $this->db->where('pr_user',$user);
        $query = $this->db->get();
              if($query->num_rows()>0)
              {
                $result = $query->result_array();
                return $result;
              }
              else return false;
    }

    public function update($id,$views){
            $data = array(
              'pr_views' => $views+1 ,
              );
              $this->db->where('pr_id', $id);
              $this->db->update('products', $data);
          }

    public function add_favorite($id,$user,$pr_user)
            {
              $data=array(
                'fp_product' =>$id,
                'fp_user' =>$user,
                'fp_product_user' =>$pr_user,
              );
              $this->update_rating($id);
              return $this->db->insert('favorite_products',$data);
            }

  public function remove_favorite($id,$pr_user)
    {
      $this->db->where('fp_user', $pr_user);
      $this->db->delete('favorite_products',array('fp_product' => $id));
    }

    public function update_rating($id) {

              $this->db->from('products');
              $this->db->where('pr_id', $id);
              $this->db->limit(1);
              $query = $this->db->get();
                          if($query->num_rows() > 0){
                    $result = $query->row_array();
                    $new_rating = $result['pr_rating'] + 1;

                    $data = array(
                      'pr_rating' => $new_rating,
                  );

                  return $this->db->update('products', $data, array('pr_id' => $id));

                }
            }



}
