<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends IIC_Model {
	
    /**
     * Setup database
     */
    
    protected $table = array(
    							'main' => 'fms_file'
							);
    
    // ------------------------------------------------------------------------
    
    /**
     * Delete content
     *
     * @access  public
     * @param   array   $id     
     */
    
    function delete_content($id)
    {       
        for($loop = 0; $loop < count($id); $loop++)
        {
        	$data = $this->get_content($id[$loop]);
			
			if(file_exists($data['full_path']))
			{
				unlink($data['full_path']);
			}
			
            $this->db->where('id', $id[$loop]);
            $this->db->delete($this->table['main']);
        }
		
		return count($id);
    }	
    
    // ------------------------------------------------------------------------
}


/* End of file upload_model.php */
/* Location: ./application/modules/backoffice/model/upload_model.php */