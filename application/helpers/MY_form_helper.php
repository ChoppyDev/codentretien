<?php 
if (!function_exists('redirect_form_validation')){
	function redirect_form_validation($form_errors, $form_post_data, $redirect_page){
		$CI =& get_instance();
		$validation_errors = array('errors'=> $form_errors, 'post_data'=> $form_post_data);
		$CI->session->set_flashdata('validation_errors', $validation_errors);

		redirect($redirect_page);

	}
}
?>