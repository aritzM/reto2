<?php

namespace App\Controller;

use App\Entity\Clientes;
use App\Entity\Compran;
use App\Entity\Conciertos;
use App\Entity\Maquetas;
use App\Entity\Trajadores;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/02/21
 * Time: 17:03
 */

class WebServiceController extends AbstractController
{
    ////*****REVISAAAAAAAR HABER SI SE PUEDE HACER ALGUNA FUNCION ETC*****/////
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        if ($request->nombre == "h") {
            $datos = array("hola" => "holamundo");
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }

    /**
     * @Route("/crearUsu", name="crearUsu", methods={"POST"})
     */
    public function crearModUsu()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);

        if($request->tipo == "Crear")
        {
            if ($request->tipoUsu == "Cliente")
            {

                $nombre = "";
                $apellidos = "";
                $genero = "";
                $telefono = "";
                $email = "";
                $password = "";

                $cliente = new Clientes();
                $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();
                $ins = false;

                foreach ($usuarios as $usuario)
                {
                    if ($usuario->getNombre() != $nombre)
                    {
                        $ins = true;
                    }
                }

                if ($ins == true)
                {
                    $cliente->setNombre($nombre);
                    $cliente->setApellidos($apellidos);
                    $cliente->setGenero($genero);
                    $cliente->setTelefono($telefono);
                    $cliente->setEmail($email);
                    $cliente->setPassword($password);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($cliente);
                    $entityManager->flush();

                    $datos = array("inserccion" => "Usuario creado correctamente");
                }
                else
                {
                    $datos = array("error" => "Usuario existente");
                }
            }
            else if($request->tipoUsu == "Trabajador")
            {
                $dni = "";
                $nombre = "";
                $apellidos = "";
                $direccion = "";
                $telefono = "";
                $email = "";
                $password = "";
                $sexo = "";
                $trabajor = new Trajadores();
                $usuarios = $this->getDoctrine()->getRepository(Trajadores::class)->findAll();
                $ins = false;

                foreach ($usuarios as $usuario)
                {
                    if ($usuario->getNombre() != $nombre && $usuario->getDni() != $dni)
                    {
                        $ins = true;
                    }
                }
                if ($ins == true)
                {
                    $trabajor->setDni($dni);
                    $trabajor->setNombre($nombre);
                    $trabajor->setApellidos($apellidos);
                    $trabajor->setDireccion($direccion);
                    $trabajor->setTelefono($telefono);
                    $trabajor->setEmail($email);
                    $trabajor->setPassword($password);
                    $trabajor->setSexo($sexo);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($trabajor);
                    $entityManager->flush();

                    $datos = array("inserccion" => "Trabajador creado exitosamente");
                }
                else
                {
                    $datos = array("error" => "Trabajador ya existente");
                }
            }
            else
            {
                $datos = array("error" => "error");
            }
        }
        else if($request->tipo == "Actualizar")
        {
            if($request->tipoUsu == "Cliente")
            {
                $idCliente = "";
                $nombre = "";
                $apellidos = "";
                $genero = "";
                $telefono = "";
                $email = "";
                $password = "";

                $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();

                foreach ($usuarios as $usuario)
                {
                    //RECORDAR LA PARTE DE ENCRYPTACION ETC
                    if($usuario->getIdClientes() == $idCliente)
                    {
                        $usuario->setNombre($nombre);
                        $usuario->setApellidos($apellidos);
                        $usuario->setGenero($genero);
                        $usuario->setTelefono($telefono);
                        $usuario->setEmail($email);
                        $usuario->setPassword($password);
                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($usuario);
                        $entityManager->flush();

                        $datos = array("actualizacion" => "Usuario actualizado correctamente");
                    }
                    else
                    {
                        $datos = array("error" => "Usuario no existente");
                    }
                }
            }
            else if($request->tipoUsu="Trabajador")
            {
                $dni = "";
                $nombre = "";
                $apellidos = "";
                $direccion = "";
                $telefono = "";
                $email = "";
                $password = "";
                $sexo = "";

                $usuarios = $this->getDoctrine()->getRepository(Trajadores::class)->findAll();
                foreach ($usuarios as $usuario)
                {
                    if($usuario->getDni() == $dni)
                    {
                        $usuario->setDni($dni);
                        $usuario->setNombre($nombre);
                        $usuario->setApellidos($apellidos);
                        $usuario->setDireccion($direccion);
                        $usuario->setTelefono($telefono);
                        $usuario->setEmail($email);
                        $usuario->setPassword($password);
                        $usuario->setSexo($sexo);
                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($usuario);
                        $entityManager->flush();
                        $datos = array("actualizacion" => "Trabajador actualizado exitosamente");
                    }
                    else
                    {
                        $datos = array("error" => "Trabajador no existente");
                    }
                }
            }
            else
            {
                $datos = array("error" => "error");
            }
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }


    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);

        if ($request->tipo == "Cliente")
        {

            $email = "";
            $password = "";
            $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();

            foreach ($usuarios as $usuario)
            {
                if($email == $usuario->getEmail() && $password == $usuario->getPassword())
                {
                    $datos = array("login" => "true", "usuario" => ["idCliente" => $usuario->getIdCliente(), "nombre" => $usuario->getNombre(), "apellidos" => $usuario->getApellidos(),  "telefono" => $usuario->getTelefono(), "genero" => $usuario->getGenero()]);
                }
                else
                {
                    $datos = array("error" => "Email o Password son incorrectos");
                }
            }

        }
        else if($request->tipo == "Trabajador")
        {
            $email = "";
            $password = "";
            $usuarios = $this->getDoctrine()->getRepository(Trajadores::class)->findAll();

            foreach ($usuarios as $usuario)
            {
                if($email == $usuario->getEmail() && $password == $usuario->getPassword())
                {
                    $datos = array("login" => "true", "usuario" => ["dni" => $usuario->getDni(), "nombre" => $usuario->getNombre(), "apellidos" => $usuario->getApellidos(), "telefono" => $usuario->getTelefono(), "sexo" => $usuario->getSexo()]);
                }
                else
                {
                    $datos = array("error" => "Email o Password son incorrectos");
                }
            }
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }


    /**
     * @Route("/eventosM", name="eventosM", methods={"GET"})
     */
    public function eventosM()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        //EL IF NO ES NECESARIO YA SE CORREGIRA
        if ($request->nombre == "h")
        {
            $eventos = $this->getDoctrine()->getRepository(Conciertos::class)->findAll();
            $eventosM = array();
            $count = 0;

            foreach($eventos as $evento)
            {
                $count = $count + 1;
                $eventoM = new Conciertos();
                $eventoM->setIdEvento($evento->getIdEvento());
                $eventoM->setNombre($evento->getNombre());
                $eventoM->setUbicacion($evento->getUbicacion());
                $eventoM->setDescripcion($evento->getDescripcion());
                $eventoM->setFechaevento($evento->getFechaevento()->format('Y-m-d'));
                $eventosM[$count] = $eventoM;
            }
            $datos = array("eventos" => $eventosM);
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }


    /**
     * @Route("/mostrelimeventos", name="mostrelimeventos", methods={"POST"})
     */
    public function mostrelimeventos()
    {
        //REVISAR YA QUE IGUAL CON LOS PRIMEROS DATOS QUE SE DEVUELVEN SE PUEDEN UTILIZAR PARA MOSTRAR EL CONTENIDO
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        if ($request->nombre == "h")
        {
            $idEvento = "";
            $eventos = $this->getDoctrine()->getRepository(Conciertos::class)->findAll();

            foreach($eventos as $evento)
            {
                if($idEvento == $evento->getIdEvento())
                {

                }
            }

        }
        else if($request->nombre == "Q")
        {
            $idEvento = "";
            $datos = array("hola" => "holamundo");
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }


    /**
     * @Route("/crmodeventos", name="crmodeventos", methods={"POST"})
     */
    public function crmodeventos()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);

        if ($request->tipo == "Crear")
        {
            $nombre = "";
            $decripcion = "";
            $ubicacion = "";
            $fechaevento = "";
            $eventos = $this->getDoctrine()->getRepository(Conciertos::class)->findAll();
            $ins = false;

            foreach($eventos as $evento)
            {
                if($eventos->getNombre() != $nombre)
                {
                    $ins = true;
                }
            }

            if($ins == true)
            {
                $eventoC = new Conciertos();
                $eventoC->setNombre($nombre);
                $eventoC->setDescripcion($decripcion);
                $eventoC->setUbicacion($ubicacion);
                //formatear a date time se hace de otra forma pero es pa dejar estructurao el webservice
                $eventoC->setFechaevento($fechaevento->format('Y-d-m'));
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($eventoC);
                $entityManager->flush();

                $datos = array("inserccion" => "El evento o concierto se inserto correctamente");
            }
            else
            {
                $datos = array("error" => "Evento ya existent");
            }

        }
        else if($request->tipo == "Modificar")
        {
            $idEvento = "";
            $nombre = "";
            $descripcion = "";
            $ubicacion = "";
            $fechaevento = "";
            $eventos = $this->getDoctrine()->getRepository(Conciertos::class)->findAll();

            foreach($eventos as $evento)
            {
                if($idEvento == $evento->getIdEvento())
                {
                    $evento->setNombre($nombre);
                    $evento->setDescripcion($descripcion);
                    $evento->setUbicacion($ubicacion);
                    $evento->setFechaEvento($fechaevento);

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($evento);
                    $entityManager->flush();

                    $datos = array("actualizacion" => "La actualizacion del evento se hizo correctament");
                }
                else
                {
                    $datos = array("error" => "Evento no esta creado y no se puede actualizar");
                }
            }
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }


    /**
     * @Route("/mostrmaquetaciones", name="mostrmaquetaciones", methods={"POST"})
     */
    public function mostrmaquetaciones()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        //Revisar porque igual no es necesario el foreach
        //Recordar eliminar el if ya que no es necesario solo se muestran datos
        if ($request->nombre == "h")
        {
            $maquetas = $this->getDoctrine()->getRepository(Maquetas::class)->findAll();
            $maquetasM = array();
            $count = 0;

            foreach ($maquetas as $maqueta)
            {
                $count = $count + 1;
                /*$maquetaM = new Maquetas();
                $maquetaM->setIdMaquetas($maqueta->getIdMaquedas());
                $maquetaM->setIdArtista($maqueta->getIdArtista());
                $maquetaM->setNombre($maqueta->getNombre());
                $maquetaM->setDescripcion($maqueta->getDescripcion());*/
                $maquetasM[$count] = $maqueta;

            }
            $datos = array("maquetas" => $maquetasM);
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }


    /**
     * @Route("/mostrmaquetacion", name="mostrmaquetacion", methods={"POST"})
     */
    public function mostrelimmaquetacion()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        //REVISAR YA QUE IGUAL NO ES NECESARIO RECOJER LOS DATOS YA QUE SE PUEDEN GUARDAR EN EL CLIENTE Y MANTENERLOS EN SESION IGUAL QUE PASABA EN UNA DE LAS ANTERIORES SESSIONES
        if ($request->nombre == "h")
        {
            $idMaquetaciones = "";
            $datos = array("hola" => "holamundo");
        }
        else if($request->nombre == "Q")
        {
            $idMaquetaciones = "";
            $datos = array("hola" => "holamundo");
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }


    /**
     * @Route("/cractmaquetacion", name="cractmaquetacion", methods={"POST"})
     */
    public function cractmaquetacion()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        if ($request->nombre == "Crear")
        {
            //HACER EL FOREACH PARA RECOJER LA ID DEL ARTISTA YA QUE ES LO QUE SE AÑADE A LA TABLA
            $nombre = "";
            $nombreArtista = "";
            $descripcion = "";

            $maquetas = $this->getDoctrine()->getRepository(Maquetas::class)->findAll();
            $ins = false;
            $idArtista = "";

            foreach($maquetas as $maqueta)
            {
                if($maqueta->getNombre() != $nombre && $maqueta->getIdArtista() == $idArtista)
                {
                    $ins = true;
                }
            }
            if($ins == true)
            {
                $maquetasC = new Maquetas();
                $maquetasC->setIdArtista($idArtista);
                $maquetasC->setDescripcion($descripcion);
                $maquetasC->setNombre($nombre);
                //RECORDAR CREAR FECHA DE CREACION EN LA BBDD
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($maquetasC);
                $entityManager->flush();

                $datos = array("inserccion" => "Maqueta creada correctamente");
            }
            else
            {
                $datos = array("error" => "Maqueta ya existente");
            }

        }
        else if($request->nombre == "Modificar")
        {
            $idMaqueta = "";
            $nombre = "";
            $nombreArtista = "";
            $descripcion = "";
            $idArtista = "";
            $maquetas = $this->getDoctrine()->getRepository(Maquetas::class)->findAll();
            //HACER EL FOREACH PARA RECOJER LA ID DEL ARTISTA YA QUE ES LO QUE SE AÑADE A LA TABLA
            foreach ($maquetas as $maqueta)
            {
                if($maqueta->getIdMaquetas() == $idMaqueta)
                {

                    $maqueta->setNombre($nombre);
                    $maqueta->setIdArtista($descripcion);
                    $maqueta->setDescripcion($idArtista);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($maqueta);
                    $entityManager->flush();
                    $datos = array("actualizacion" => "LA actualizacion de la maqueta se hizo correctamente");
                }
                else
                {
                    $datos = array("error" => "Maqueta no existente");
                }
            }

        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
    }
    /**
     * @Route("/comprinst", name="comprInst", methods={"POST"})
     */
    public function comprinst()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        //el if no es necesario en este caso ya que solo vamos a hacer una cosa
        if($request->nombre == "h")
        {
            $nombreInst = ""; //para sacar la id
            $idInst = "";
            $nombreCli = ""; //para sacar el nombre del cliente
            $idUsu = "";
            $fecha = "";
            $hora = "";
            $unidades = "";

            $compran = new Compran();
            $compran->setIdCliente($idUsu);
            $compran->setIdInstrumento($idInst);
            //reviar para meter la fecha y la hora
            $compran->setFecha($fecha->format('Y-d-m'));
            $compran->setHora($hora);
            $compran->setUnidades($unidades);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compran);
            $entityManager->flush();

            $datos = array("inserccion"=>"Instrumento comprado correctamente");
        }
        else
        {
            $datos = array("error"=>"error");
        }
    }

    public function jsonDam($data)
    {
        $normalizers = array(new GetSetMethodNormalizer());
        $encoders = array("json" => new JsonEncoder());
        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($data, 'json');

        $response = new Response();
        $response->setContent($json);
        $response->headers->set("Content-Type", "application/json");

        return $response;
    }
}