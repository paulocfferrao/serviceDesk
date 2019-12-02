<?php
  // Toda classe deve herdar as características
  //da classe CI_Controller (system)
  class Pages extends CI_Controller{

    public function sobre(){

        $dados['titulo'] = "Sobre";
        $dados['ano']    = "2019";

        $this->load->view('template/header', $dados);
        $this->load->view('pages/sobre',     $dados);
        $this->load->view('template/footer', $dados);
    }

    public function view($pagina = "sobre"){
        if(!file_exists(APPPATH . 'views/pages/' . $pagina . '.php')){
          show_404();
        }
        $dados['titulo'] = ucfirst($pagina);
        $dados['ano']    = date('Y');

        $this->load->view('template/header', $dados);
        $this->load->view('pages/'.$pagina,  $dados);
        $this->load->view('template/footer', $dados);
    }
  }
 ?>
