<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EntryModel;

class EntryController extends BaseController
{
    protected $entryModel;
    protected $session;

    public function __construct()
    {
        $this->entryModel = new EntryModel();
        $this->session = \Config\Services::session();
    }

    public function store()
    {
        $value = $this->processValue($this->request->getVar('value'));

        if ($value === false) {
            $this->session->setFlashdata('error', 'O valor informado é inválido.');
        } else {
            $data = [
                'value' => $value
            ];
            $this->entryModel->insert($data);

            $this->session->setFlashdata('success', 'Valor adicionado com sucesso.');
        }

        return redirect()->to(site_url('dashboard'));
    }

    public function edit($id)
    {
        $data['entry'] = $this->entryModel->find($id);
        return view('entry/edit', $data);
    }

    public function update($id)
    {
        $this->request->getVar('value');

        $data = [
            'value' => $this->processValue($this->request->getVar('value'))
        ];
        $this->entryModel->update($id, $data);

        return redirect()->to(site_url('entry'));
    }

    public function delete($id)
    {
        $this->entryModel->delete($id);
        $this->session->setFlashdata('success', 'Registro deletado com sucesso.');
        return redirect()->to(site_url('dashboard'));
    }

    private function processValue($valor)
    {
        $valor = preg_replace('/[^\d,]/', '', $valor);;
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        echo $valor;
        $valor = empty($valor) ? 0.0 : (float) $valor;

        return $valor;
    }
}
