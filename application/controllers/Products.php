<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
$this->page();

    }


    public function page()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'products/page/';
        $config['total_rows'] = $this->products_model->total_rows();
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
     //   $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'products.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $products = $this->products_model->index_limit($config['per_page'], $start);

        $data = array(
            'products_data' => $products,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('products_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'products/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'products/index/';
        }

        $config['total_rows'] = $this->products_model->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'products/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $products = $this->products_model->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'products_data' => $products,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('products_list', $data);
    }
    
    public function read($id) 
    {
        $row = $this->products_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'description' => $row->description,
		'price' => $row->price,
		'stock' => $row->stock,
		'image' => $row->image,
	    );
            $this->load->view('products_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('products/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'description' => set_value('description'),
	    'price' => set_value('price'),
	    'stock' => set_value('stock'),
	    'image' => set_value('image'),
	);
        $this->load->view('products_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'price' => $this->input->post('price',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'image' => $this->input->post('image',TRUE),
	    );

            $this->products_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('products'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->products_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('products/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'description' => set_value('description', $row->description),
		'price' => set_value('price', $row->price),
		'stock' => set_value('stock', $row->stock),
		'image' => set_value('image', $row->image),
	    );
            $this->load->view('products_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'price' => $this->input->post('price',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'image' => $this->input->post('image',TRUE),
	    );

            $this->products_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('products'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->products_model->get_by_id($id);

        if ($row) {
            $this->products_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('products'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }

    function _rules() 
    {
	$this->form_validation->set_rules('name', ' ', 'trim|required');
	$this->form_validation->set_rules('description', ' ', 'trim|required');
	$this->form_validation->set_rules('price', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('stock', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('image', ' ', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */