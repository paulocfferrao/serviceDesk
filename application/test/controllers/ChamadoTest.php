<?php
/**
 *
 */
class ChamadoTest extends TestCase
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('unit_test');
    $this->load->model('chamado_model');
  }

  public function testSoma($a,$b){
    $test = $this->chamado_model->soma($a,$b);
    $expected = $a+$b;
    $testName = "Soma";
    echo $this->unit->run($test,$expected,$testName);

  }

  public function getChamadoTest(){

    $id=20;

    $query = $this->db->get_where('chamado', array('id'=>$id));
    $expected = $query->row_array(); //uma unica linha MATCH


    $this->unit->run($sClass->chamado_model->get($id),$expected,"GetChamadoTest");
    echo $this->unit->report();
    //$this->load->view('tests');
  }
}

/**
 *
 */



 ?>
