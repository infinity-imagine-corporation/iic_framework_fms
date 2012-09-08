<?php
class Upload extends IIC_Controller 
{	
	// ------------------------------------------------------------------------
	// Constructor
	// ------------------------------------------------------------------------
	
	function __construct()
	{
		parent::__construct();
		
		// Set variable
		$this->module_config['module'] = 'upload';
		$this->module_config['controller'] = 'upload';
		$this->module_config['form'] = 'upload_form';
		
		// Load model
		$this->load->model($this->module_config['controller'].'_model');
		$this->content_model = $this->upload_model;
		
		// Load language
		$this->lang->load(
							$this->module_config['module'], 
							$this->config->item('backoffice_language')
						 );
	}
	
	// ------------------------------------------------------------------------
	// Page
	// ------------------------------------------------------------------------
	
	/**
	 * Mian page
	 *
	 * @access	public
	 */
	
	function index()
	{		
		// Check permission
		Modules::run('backoffice/auth/check_permission');	
		
		// Set module
		$_data['module']		= $this->module_config['module'];
		$_data['controller']	= $this->module_config['controller'];
		$_data['ajax_uri']		= 'content';
		$_data['template']		= 'backoffice/tpl_module_index';
		$_data['page']			= 'upload';
		$_data['title']			= $this->lang->line('page_upload');
		
		// Set navigator
		$_data['navigator'] = array();
		array_push($_data['navigator'], array(
												'label'	=> $this->lang->line('home'),	
												'link'	=> 'backoffice'
											  ));
		array_push($_data['navigator'], array(
												'label' => $this->lang->line('page_upload'),	
												'link'	=> ''
											  ));
		
		// Set table haed
		$_data['th'] = array();
		array_push($_data['th'], array(
										'axis'			=>'name',		
										'label'			=>$this->lang->line('name'),	
										'is_criteria'	=> TRUE
									  ));
		// Set pagination
		$this->load->library('pagination');
		
		$_data['content']['total'] = $this->content_model->count_content();

		$_config['base_url']	= site_url().'/'.$_data['module'].'/'.$_data['controller'].'/index/';
		$_config['total_rows']	= $_data['content']['total'];
		$_config['per_page']	= 25; 
		$_config['uri_segment']	= 4;
		
		$this->pagination->initialize($_config); 
		
		$_data['pagination'] = $this->pagination->create_links();
		
		// Display
		$this->load->view('backoffice/main', $_data);
	}
	
	// ------------------------------------------------------------------------
	// Function
	// ------------------------------------------------------------------------
	
	/**
	 * Module page for display backoffice module
	 *
	 * @access	public
	 */
	
	function get_upload()
	{

	}
	
	// ------------------------------------------------------------------------
}


/* End of file upload.php */
/* Location: application/modules/backoffice/controllers/upload.php */