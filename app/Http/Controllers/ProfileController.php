<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProfileModel;
use App\Models\AddressModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\MunicipioModel;
use App\Models\ToolModel;
use Spatie\FlareClient\View;

class ProfileController extends Controller
{
    public function getMunicipios(Request $request){
        $id = $request->state_id;
        $municipios = MunicipioModel::where('state_id', $id)->get();
        return response()->json($municipios);
    }
    public function regresarCountry(){
        $countrys = CountryModel::all();
        return view('formProfile', ['countrys' => $countrys]);
    }
    public function consultaAjax(Request $request)
    {
        $country_id = $request->country_id;
        $data = StateModel::select('id', 'Estado')
            ->where('country_id', $country_id)
            ->get();
        return response()->json($data);
    }
    
    public function registerProfile(Request $request)
    {
        // Obtener la imagen desde el formulario
        $image = $request->file('image');
        // Guardar la imagen en el directorio de almacenamiento
        $url = Storage::putFile('public/images', $image);

        $nombre = $request->input('Nombres');
        $apellidoP = $request->input('apellidop');
        $apellidoM = $request->input('apellidom');
        //query
        $profile = new ProfileModel();
        $profile->Nombres = $nombre;
        $profile->Apellido_P = $apellidoP;
        $profile->Apellido_M = $apellidoM;
        $profile->Foto = Storage::url($url);
        $profile->save();

        
        
        //guardar en tabla address
        $idprofile = $profile->id;
        $calle = $request->input('numeroCalle');
        $numero = $request->input('calle');
        $colonia = $request->input('colonia');
        $municipio = $request->input('municipio');
        $estado = $request->input('estado');
        $pais = $request->input('pais');
        $cp = $request->input('codigoPostal');
        
        //query
        $address = new AddressModel();
        $address->Numero_calle = $calle;
        $address->Calle = $numero;
        $address->Colonia = $colonia;
        $address->Municipio_id = $municipio;
        $address->state_id = $estado;
        $address->country_id = $pais;
        $address->Codigo_Postal = $cp;
        $address->profile_id = $idprofile;
        $address->save();

        //tool
        $tool=new ToolModel();
        $variable=$request->input('variable');
        for ($i=1; $i <=$variable; $i++) { 
            $tool->Nombre_herramienta=$request->input('lenguaje'.$i);
            $tool->Descripcion=$request->input('descripcion'.$i);
            $tool->Nivel=$request->input('nivel'.$i);
            $tool->profile_id=$profile->id;
            $tool->save();
        }
                //lenguaje nivel descripcion
            
        
        

        

        return response()->json([
            'User' => [
                'message' => 'Profile created successfully',
                'url' => Storage::url($url),
                'Id' => $profile->id,
                'Nombre' => $profile->Nombres,
                'Apellido_P' => $profile->Apellido_P,
                'Apellido_M' => $profile->Apellido_M,
                'Foto' => $profile->Foto
            ],
            'Address' => [
                'message' => 'Address created successfully',
                'Id' => $address->id,
                'Numero_calle' => $address->Numero_calle,
                'Calle' => $address->Calle,
                'Colonia' => $address->Colonia,
                'Municipio' => $address->Municipio_id,
                'Estado' => $address->state_id,
                'Pais' => $address->country_id,
                'Codigo_Postal' => $address->Codigo_Postal,
                'profile_id' => $address->profile_id
            ]
        ]);
    }
}
