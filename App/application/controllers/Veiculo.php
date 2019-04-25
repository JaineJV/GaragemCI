<?php

/**
 * @author Vianna
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Veiculo_model', 'vm');

        $data['veiculos'] = $this->vm->getAll();
        $this->load->view('ListaVeiculos', $data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('modelo', 'modelo', 'required');
        $this->form_validation->set_rules('preco', 'preco', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('FormVeiculo');
        } else {
            $this->load->model('Veiculo_model');
            $data = array(
                'modelo' => $this->input->post('modelo'),
                'preco' => $this->input->post('preco'),
                'status' => $this->input->post('status')
            );
            if ($this->Veiculo_model->insert($data)) {

                $this->session->set_flashdata('mensagem', 'Veículo cadastrado com sucesso!');
                redirect('Veiculo/listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar...');
                redirect('Veiculo/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Veiculo_model');

            $this->form_validation->set_rules('modelo', 'modelo', 'required');
            $this->form_validation->set_rules('preco', 'preco', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');

            if ($this->form_validation->run() == false) {

                $data['veiculo'] = $this->Veiculo_model->getOne($id);
                $this->load->view('FormVeiculo', $data);
            } else {
                $data = array(
                    'modelo' => $this->input->post('modelo'),
                    'preco' => $this->input->post('preco'),
                    'status' => $this->input->post('status')
                );

                if ($this->Veiculo_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Veículo alterada com sucesso!');
                    redirect('Veiculo/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar Veículo...');
                    redirect('Veiculo/alterar/' . $id);
                }
            }
        } else {
            redirect('Veiculo/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Veiculo_model');

            if ($this->Veiculo_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Veículo deletada com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar Veículo...');
            }

            redirect('Veiculo/listar');
        }
        redirect('Veiculo/listar');
    }

}
