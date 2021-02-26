<?php

namespace App\Controller;

use App\Entity\Clientes;
use App\Entity\Conciertos;
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
    public function crearUsu()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);


        if ($request->nombre == "h")
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

            foreach($usuarios as $usuario)
            {
                if($usuario->getNombre() != $nombre)
                {
                    $ins = true;
                }
            }

            if($ins == true)
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
            }
            else
            {
                $datos = array("error" => "Usuario existente");
            }
        }
        else if($request->nombre == "Q")
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
            $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();
            $ins = false;

            foreach($usuarios as $usuario)
            {
                if($usuario->getNombre() != $nombre && $usuario->getDni() != $dni)
                {
                    $ins = true;
                }
            }
            if($ins == true)
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
            }

            $datos = array("hola" => "holamundo");

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

        if ($request->nombre == "h")
        {

            $email = "";
            $password = "";
            $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();
            foreach ($usuarios as $usuario)
            {
                if($email == $usuario->getEmail() && $password == $usuario->getPassword())
                {
                    $datos = array("login" => "true", "usuario" => ["dni" => $usuario->getDni(), "nombre" => $usuario->getNombre(), "apellidos" => $usuario->getApellidos(), "direccion" => $usuario->getDireccion(), "telefono" => $usuario->getTelefono(), "sexo" => $usuario->getSexo()]);
                }
            }

        }
        else if($request->nombre == "Q")
        {
            $email = "";
            $password = "";
            $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();
            foreach ($usuarios as $usuario)
            {
                if($email == $usuario->getEmail() && $password == $usuario->getPassword())
                {
                    $datos = array("login" => "true", "usuario" => ["nombre" => $usuario->getNombre(), "apellidos" => $usuario->getApellidos(), "telefono" => $usuario->getTelefono(), "genero" => $usuario->getGenero()]);
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
        //REVISAR
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

        if ($request->nombre == "h")
        {
            $nombre = "";
            $decripcion = "";
            $ubicacion = "";
            $fechaevento = "";

            $datos = array("hola" => "holamundo");
        }
        else if($request->nombre == "Q")
        {
            $nombre = "";
            $decripcion = "";
            $ubicacion = "";
            $fechaevento = "";

            $datos = array("hola" => "holamundo");
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
        if ($request->nombre == "h")
        {
            $datos = array("hola" => "holamundo");
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
        if ($request->nombre == "h")
        {
            $nombre = "";
            $nombreArtista = "";
            $descripcion = "";

            $datos = array("hola" => "holamundo");
        }
        else if($request->nombre == "Q")
        {
            $nombre = "";
            $nombreArtista = "";
            $descripcion = "";

            $datos = array("hola" => "holamundo");
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
        if($request->nombre == "h")
        {
            $nombreInst = ""; //para sacar la id
            $idInst = "";
            $nombreCli = ""; //para sacar el nombre del cliente
            $idUsu = "";
            $fecha = "";
            $hora = "";
            $unidades = "";

            $datos = array("hola"=>"holamundo");
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