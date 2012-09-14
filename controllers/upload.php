<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends IIC_Controller {
		
	// ------------------------------------------------------------------------
	// Constructor
	// ------------------------------------------------------------------------
	
	function __construct()
	{
		parent::__construct();
		
		// Set variable
		$this->module_config['module'] = 'fms';
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
						 
		// Load library
		$this->load->library('upload');
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
	
	/**
	 * Create content 
	 *
	 * @access	public
	 */
	
	function create_content($file_field)
	{	
		$_config['upload_path'] = './uploads';
		$_config['allowed_types'] = '*';
		$_config['max_filename'] = 10;
		$_config['remove_spaces'] = TRUE;
		$_config['encrypt_name'] = TRUE;
		
		if( ! file_exists($_config['upload_path']))
		{
			//echo 'Created directory '.$_config['upload_path'];
			mkdir($_config['upload_path'], 0777, TRUE);
		}

		$this->upload->initialize($_config);

		if($this->upload->do_upload($file_field))
		{
			$_data = $this->upload->data();
			$_data['date_time_create'] = date('Y-m-d H:i:s');
			$_result = $this->content_model->create_content($_data);
			
			if(is_int($_result))
			{
				$this->output->set_status_header('201');	
				echo $_result;
			}
			else 
			{
				$this->output->set_status_header('500');
			}
		}
		else
		{
			$this->output->set_status_header('500');
			echo '<h1>'.$this->module_config['module'].'/'.$this->module_config['controller'].'</h1>';
			echo '<hr />';
			echo '<p>Upload fail :(</p>'.$this->upload->display_errors();
		}
	}
	
	// ------------------------------------------------------------------------
}


/* End of file upload.php */
/* Location: application/modules/backoffice/controllers/upload.php */