<?phpdefined('BASEPATH') OR exit('No direct script access allowed');$ci =& get_instance();$maincontroller=strtolower($ci->router->fetch_class());//echo $ci->router->fetch_method();if ($maincontroller=='dashboard'){    $this->load->view('admin/requires/header');    $this->load->view('admin/requires/sidebar');    $this->load->view('admin/requires/top_menu');    $this->load->view($subview);    $this->load->view('admin/requires/footer');}else{    $this->load->view('web/home');}?>