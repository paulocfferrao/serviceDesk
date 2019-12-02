<?php
/**
 *
 */
class Test extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('unit_test');


  }
  public function index(){
    echo "Usando teste unitário";

  }
  // public function testSoma(){
  //
  //   $test = $this->chamado_model->soma(3,6);
  //   $expected = 9;
  //   $testName = "Soma";
  //   echo $this->unit->run($test,$expected,$testName);
  //
  //   //$this->test->ChamadoTest->soma(2,8);
  //
  // }

  public function testGetChamado(){
    $this->load->model('chamado_model');
    $id=1;
    //
    $test = $this->chamado_model->get(1);
    $query = $this->db->get_where('chamado', array('id'=>$id));
    $expected = $query->row_array();
    $testName = "Busca Chamado";

    echo $this->unit->run($test,$expected,$testName);

  }

  public function testGetUsuario(){
    $this->load->model('usuario_model');
    $id=5;
    //
    $test = $this->usuario_model->get($id);
    $query = $this->db->get_where('usuarios', array('id'=>$id));
    $expected = $query->row_array();
    $testName = "Busca Usuario";

    echo $this->unit->run($test,$expected,$testName);

  }



}

 ?>
