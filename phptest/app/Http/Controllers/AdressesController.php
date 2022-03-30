<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adresses')
        ->with('adresses',Adress::orderBy('updated_at','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error='';
        $request->validate([
            'zip_code'=>'required',
        ]);

        $adress = Adress::where('zip_code',$request->input('zip_code'))->first();

        if(!$adress){
            $zip = str_replace("-","",$request->input('zip_code'));
            $response = Http::get('viacep.com.br/ws/'.$zip.'/json');
            if(!$response->json('erro')){
                Adress::create([
                    "zip_code"=>$response->json('cep'),
                    "adress"=>$response->json('logradouro'),
                    "neighborhood"=>$response->json('bairro'),
                    "complement"=>$response->json('complemento'),
                    "city"=>$response->json('localidade'),
                    "state"=>$response->json('uf'),
                    "ibge"=>$response->json('ibge'),
                    "gia"=>$response->json('gia'),
                    "ddd"=>$response->json('ddd'),
                    "siafi"=>$response->json('siafi')
                ]);
                $adress = Adress::where('zip_code',$request->input('zip_code'))->first();
            }else{
                $error = 'CEP '.$request->input('zip_code').' Não encontrado!';
            }
        }

        return redirect('/')
        ->with('adress',$adress)
        ->with('error',$error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
