<?php

namespace App\Controller;

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
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login()
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
     * @Route("/eventosM", name="eventosM", methods={"GETT"})
     */
    public function eventosM()
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
     * @Route("/mostrelimeventos", name="mostrelimeventos", methods={"POST"})
     */
    public function mostrelimeventos()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        if ($request->nombre == "h")
        {
            $datos = array("hola" => "holamundo");
        }
        else if($request->nombre == "Q")
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
     * @Route("/crmodeventos", name="crmodeventos", methods={"POST"})
     */
    public function crmodeventos()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        if ($request->nombre == "h")
        {
            $datos = array("hola" => "holamundo");
        }
        else if($request->nombre == "Q")
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
        if ($request->nombre == "h") {
            $datos = array("hola" => "holamundo");
        }
        else if($request->nombre == "Q")
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
     * @Route("/cractmaquetacion", name="cractmaquetacion", methods={"POST"})
     */
    public function cractmaquetacion()
    {
        $datos = file_get_contents('php://input');
        $request = json_decode($datos);
        if ($request->nombre == "h")
        {
            $datos = array("hola" => "holamundo");
        }
        else if($request->nombre == "Q")
        {
            $datos = array("hola" => "holamundo");
        }
        else
        {
            $datos = array("error" => "error");
        }

        return $this->jsonDam($datos);
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