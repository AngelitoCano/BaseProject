<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use Exception;

class CalculadoraController extends Controller
{
    public function formulario()
    {
        return view('calculadora');
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'operacion' => 'required|in:Add,Multiply,Subtract,Divide',
        ]);

        try {
            $client = new SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");

            $params = [
                'intA' => $request->num1,
                'intB' => $request->num2,
            ];

            $respuesta = $client->__soapCall($request->operacion, [$params]);
            $campoResultado = $request->operacion . 'Result';

            return view('calculadora', [
                'resultado' => $respuesta->$campoResultado
            ]);
        } catch (Exception $e) {
            return view('calculadora', [
                'error' => 'No se pudo conectar al servicio SOAP: ' . $e->getMessage()
            ]);
        }
    }
}
