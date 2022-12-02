<?php



namespace App\Http\Controllers\SEL_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SEL_Modelos\E_Usuario;
use App\SEL_Modelos\E_Respuesta;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('SEL_Vistas/Login/P_Login');
    }

    public function validacion(Request $request)
    {

        $validator = $request->validate([
            'cedula' => 'required',
            'clave' => 'required'
        ]);

        $usuarios = E_Usuario::get()->all();
        $cedula = $request->cedula;
        $clave = $request->clave;
        
        foreach ($usuarios as $usuario) {
            if ($cedula === $usuario->cedula && $clave === $usuario->clave) {
                // $encrypt = encrypt($usuario->id_rol_usuario);
                $respondido = E_Respuesta::select('id_usuario')->distinct()->where('id_usuario', $usuario->id_usuario)->first();
                
                //Valida si el usuario ya respondio o no
                if ($respondido != null && $usuario->id_usuario == $respondido->id_usuario){

                    return redirect('/')->with('status', 'La cédula ' . $usuario->cedula . ' ya contestó la encuesta');
                }


                //GUARDA EL USUARIO EN UNA SESSION
                session(['id_usuario' => $usuario->id_usuario]);
                return redirect('rol/' . $usuario->id_rol_usuario);
            }
        }
      
        return view('SEL_Vistas/Login/P_Login')->withInput($request->clave)->withErrors([
            'clave' => 'Cedula o Contraseña incorreca'
        ]);
        
    }

    public function index($id)
    {
        // $id = decrypt($id);
        //Aqui se valida que tipo de rol es en base de datos
        //Dependiendo del rol, muestra el texto

        //ruta de la encuesta correspondiente
        $texto = '';
        $ruta = '';
        switch ($id) {
            case 1:
            case 2:
            case 3:
            case 4:
                return view('SEL_Vistas/Administrador/P_MenuAdministrativos');
            case 5:
            case 6:
            case 7:
                $texto = 'Secretaría de la vicedecana académica';
                return view('Modulo_3_Egresados/P_MenuSecretaria',[
                    'texto' => $texto,
                    ]);
            case 8:
                $texto = 'RESOLVER ENCUESTA DE PROFESOR';
                $ruta = 'profesor/Encuesta';
                break;
            case 9:
                $texto = 'RESOLVER ENCUESTA DE ESTUDIANTE';
                $ruta = 'estudiante';
                break;
            case 10:
                $texto = 'RESOLVER ENCUESTA DE EGRESADO';
                $ruta = 'P_EgresadoA';
                
                break;
            case 11:
                $texto = 'RESOLVER ENCUESTA DE EMPRESARIO';
                $ruta = 'P_EncuestaEmpresario';
                break;
        }

        return view('SEL_Vistas/Login/P_ResolverEncuesta', [
            'texto' => $texto,
            'url' => $ruta,
            'id' => $id
        ]);
    }

    /* public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }*/
}
