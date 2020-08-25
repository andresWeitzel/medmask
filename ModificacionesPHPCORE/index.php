<?php

    //==============Routes===========================
/*
    //------------Conexion--------------------
    require_once 'conexionDB/conexion.php';
    //------------End Conexion--------------------

    //------------Persistencia--------------------
    require_once 'persistencia/crud.php';
    require_once 'persistencia/modelos/modeloGenerico.php';
    require_once 'persistencia/modelos/usuarios.php';
    require_once 'persistencia/modelos/armadores.php';
    require_once 'persistencia/modelos/donantes.php';
    require_once 'persistencia/modelos/solicitantes.php';
    //------------End Persistencia--------------------

    //------------  Controllers--------------------
    require_once 'http/controladorUsuarios.php';
    require_once 'http/controladorArmadores.php';
    require_once 'http/controladorDonantes.php';
    require_once 'http/controladorSolicitantes.php';
    //------------ End Controllers--------------------

      //------------  Message--------------------
      require_once 'mensajesConJson/mensajesEncapsulados.php';
      require_once 'mensajesConJson/mensajes.php';
   */
      //------------ End Message--------------------

      //------------RoutesWithAutoLoader----------------
      require_once './src/Routes.php';
      
     require_once PATH_SRC . 'autoloader/AutoLoader.php';
    

     AutoLoader::registrar();
      //------------EndRoutesWithAutoLoader----------------

    //==============End Routes===========================

    //==============Objects=========================

    $controladorUsuarios=new ControladorUsuarios();    
    $controladorArmadores=new ControladorArmadores();
    $controladorDonantes=new ControladorDonantes();
    $controladorSolicitantes=new ControladorSolicitantes();

    //==============End Objects=========================

    //=============Insert====================
    //CUALQUIER CAMPO O DATO QUE NO ESTE EN LA DB O NO SEA RELEVANTE SE ESTABLECEN LOS FILTROS EN LA LOGICA DE MODELOGENERICO PARA QUE NO INFLUYA...

    $saltoDeLinea="\n\n\n\n";

     //---------DESCOMENTAR PARA SU USO----------
    
     /*
    $usuarioInsertado=$controladorUsuarios->insertarUsuario([
         "nombre"      => "Jose",
         "apellido"    => "Alvarez",
         "localidad"   => "CABA",
         "email"       => "elJose2021@gmail.com",
         "pass"        => "elJose"

     ])->Json();
     
     echo($usuarioInsertado);
     echo($saltoDeLinea);
    


    $armadorInsertado=$controladorArmadores->insertarArmador([
        "idUsuario"      => 5 

    ])->Json();
    
    echo($armadorInsertado);
    echo($saltoDeLinea);



    $donanteInsertado=$controladorDonantes->insertarDonante([
        "idUsuario"      => 7

    ])->Json();
   
    echo($donanteInsertado);
    echo($saltoDeLinea);
       


    $solicitanteInsertado=$controladorSolicitantes->insertarSolicitante([
        "idUsuario"      => 19,
        "institucion"    => "Hospital municipal"

    ])->Json();
    
    echo($solicitanteInsertado);
    echo($saltoDeLinea);
    
    */

     

    //=============End Insert====================

    
    //=============Update====================
    //---------DESCOMENTAR PARA SU USO----------
    /*
    $usuario=[
        "id"          => 19,
        "apellido"    => "Gutierrez",
        "localidad"   => "Belgrano",
    ];
    echo($usuarioActualizado=$controladorUsuarios->actualizarUsuario($usuario)->Json());
    echo($saltoDeLinea);


    $armador=[
        "id"          => 4,
        "idUsuario"   => 6,
        
    ];
    echo($armadorActualizado=$controladorArmadores->actualizarArmador($armador)->Json());
    echo($saltoDeLinea);


    $donante=[
        "id"          => 5,
        "idUsuario"   => 8,
        
    ];
    echo($donanteActualizado=$controladorDonantes->actualizarDonante($donante)->Json());
    echo($saltoDeLinea);


    $solicitante=[
        "id"          => 6,
        "institucion" => "Hogar de Ancianos"
        
    ];
    echo($solicitanteActualizado=$controladorSolicitantes->actualizarSolicitanes($solicitante)->Json());
    echo($saltoDeLinea);
   */

    //=============End Update====================

    //=============Delete====================
   //---------DESCOMENTAR PARA SU USO----------
    /*
    $usuarioEliminado=$controladorUsuarios->eliminarUsuario(21)->Json();
    
     echo($usuarioEliminado);
     echo($saltoDeLinea);

     $armadorEliminado=$controladorArmadores->eliminarArmador(4)->Json();
     
     echo($armadorEliminado);
     echo($saltoDeLinea);

     $donanteEliminado=$controladorDonantes->eliminarDonante(4)->Json();
     
     echo($donanteEliminado);
     echo($saltoDeLinea);

     $solicitanteEliminado=$controladorSolicitantes->eliminarSolicitantes(6)->Json();
     
     echo($solicitanteEliminado);
     echo($saltoDeLinea);
    */
    //=============End Delete====================


    //==================Output=========================
  
    //--------------------------Usuarios----------------------------------
    echo"\n\n=======================Todos los Usuarios===========================\n\n";
   
    var_dump($controladorUsuarios->listarUsuarios()->Json());
  
    echo"\n\n===========================Usuario con el id 2===========================\n\n";
 
    echo($controladorUsuarios->buscarUsuario(2)->Json());
    
    //--------------------------End Usuarios----------------------------------
    echo($saltoDeLinea);
   
    //--------------------------Armadores----------------------------------
    echo"\n\n===========================Todos los Armadores===========================\n\n";
    
    echo($controladorArmadores->listarArmadores()->Json());
    
    echo"\n\n===========================Armador con el id 3===========================\n\n";
    
    echo($controladorArmadores->buscarArmador(3)->Json());
    
    //--------------------------End Armadores----------------------------------
    echo($saltoDeLinea);

    //--------------------------Donantes----------------------------------
    echo"\n\n===========================Todos los Donantes===========================\n\n";
    
    echo($controladorDonantes->listarDonantes()->Json());
  
    echo"\n\n===========================Donante con el id 1===========================\n\n";
   
    var_dump($controladorDonantes->buscarDonante(1)->Json());
    
    //--------------------------End Donantes----------------------------------
    echo($saltoDeLinea);
 
    //--------------------------Solicitantes----------------------------------
    echo"\n\n===========================Todos los Solicitantes===========================\n\n";

    var_dump($controladorSolicitantes->listarSolitantes()->Json());
   
    echo"\n\n===========================Solitante con el id 4===========================\n\n";
    
    var_dump($controladorSolicitantes->buscarSolicitante(4)->Json());
  
    //--------------------------End Solicitantes----------------------------------

    echo($saltoDeLinea);
    //===================End Output==========================