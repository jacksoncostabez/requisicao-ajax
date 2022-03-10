<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form.form');
    }

    public function store(Request $request)
    {

        if (strlen($request->password) < 5) {
            $data['message'] = 'Senha inválida!';
        } else {
            $data['email'] = $request->email;
            $data['password'] = $request->password;
            $data['success'] = true;
            $data['message'] = 'Login efetuado com sucesso!';
            $data['tam'] = strlen($request->password);
        }

        //exibe na aba rede do navegador.
        echo json_encode($data);
    }

    public function success()
    {
        return view('form.success');
    }
}
