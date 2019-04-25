<?php
/**
 * @author Vianna
 */
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Marca extends CI_Controller {
    public function index() {
        $this->listar();
    }

    public function listar(){
        $this->load->model('Marca_model', 'mm');

        $data['marcas'] = $this->mm->getAll();
        $this->load->view('ListaMarcas', $data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('descricao', 'descricao', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('FormMarca');
        } else {
            $this->load->model('Marca_model');
            $data = array(
                'descricao' => $this->input->post('descricao')
            );
            if ($this->Prova_model->insert($data)) {

                $this->session->set_flashdata('mensagem', 'Marca cadastrada com sucesso!');
                redirect('Marca/listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar...');
                redirect('Marca/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if($id > 0){
            $this->load->model('Marca_model');

            $this->form_validation->set_rules('descricao', 'descricao', 'required');

            if ($this->form_validation->run() == false) {

                $data['marca'] = $this->Marca_model->getOne($id);
                $this->load->view('FormMarca', $data);
            } else {
                $data = array(
                    'descricao' => $this->input->post('descricao')
                );

                if ($this->Marca_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Marca alterada com sucesso!');
                    redirect('Marca/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar Marca...');
                    redirect('Marca/alterar/' . $id);
                }
            }
        } else {
            redirect('Marca/listar');
        }
    }
    
    public function deletar($id){
        if($id > 0){
            $this->load->model('Marca_model');
            
            if($this->Marca_model->delete($id)){
                $this->session->set_flashdata('mensagem', 'Marca deletada com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar Marca...');
            }
            
            redirect('Marca/listar');
        }
        redirect('Marca/listar');
    }
    
}
