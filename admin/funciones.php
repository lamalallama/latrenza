<?php
//ESTE ARCHIVO SE LLAMA funciones.php

//Este es mi primera funcion en php
//sintaxis
/*
function nombredelaFuncion($parametro)
{
    codigo
    mas codigo
    mas mas codigo
}
*/

function obtenerListaEmpleados()
{
    //Incluir conexion con Base de Datos
    include('conexionBD.php');

    //Agregar mi sentencia
    $query = "SELECT IDEmpleado,APaterno,AMaterno,Nombre,Puesto,Edad FROM empleados"; 

    //Aqui verifico si tengo un error de codigo de mysql
    if ($resultado = mysqli_query($miConexion, $query))
    {

    }
    else
    {
        //Aqui despliego el error
        //Y detengo la ejecucion del codigo
        exit(mysqli_error($miConexion));
    }
    //Declaracion de mi variable de tipo arreglo para
    //guardar los datos obtenidos
    $arregloClasificacion = array();
    //Si el resultado de la consulta es de CERO REGISTROS o renglones
    //Entonces no se va a ejecutar el ciclo

    if(mysqli_num_rows($resultado) > 0) //Si hay mas de un registro o renglon se va a ejecutar
    {
        //Mientras no sea el final de la lista se asignan los valores de los datos al arreglo

        //Esta funcion especial se refiere a asociar los datos
        //Con un nombre significativo
        while($renglon = mysqli_fetch_assoc($resultado))
        {
            //Los corchetas son para indicar que son VARIOS REGISTROS O RENGLONES
            //Este es un arreglo multidimensional
            $arregloListaEmpleados[] = array(
                                    //  IINDICE/ALIAS   nombre del campo de la tabla
                                        'IDClasificacion' => $renglon['IDClasificacion'],
                                        'Clasificacion' => $renglon['Clasificacion'],
                                        'Sabor_o_Producto' => $renglon['Sabor_o_Producto'],
                                        'Costo' => $renglon['Costo']
                                        );
        }
    }
    return $arregloListaClasificacion;

}
?>