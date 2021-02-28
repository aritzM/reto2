<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class WebPageController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $parametros = array('datos' => null);
        return $this->render('index.html.twig', $parametros);
    }
    /**
     * @Route("/produccion", name="produccion")
     */
    public function produccion()
    {
        return $this->render('produccion.html.twig');
    }
    /**
     * @Route("/maquetas", name="maquetas")
     */
    public function maquetas()
    {
        return $this->render('maquetas.html.twig');
    }
    /**
     * @Route("/eventos", name="eventos")
     */
    public function eventos()
    {
        return $this->render('menu/menu.html.twig');
    }
    /**
     * @Route("/instrumentos", name="instrumentos")
     */
    public function instrumentos()
    {
        return $this->render('menu/menu.html.twig');
    }
    /**
     * @Route("/cursos", name="cursos")
     */
    public function cursos()
    {
        return $this->render('menu/menu.html.twig');
    }
    /**
     * @Route("/eventosproximos", name="eventos")
     */
    public function eventosproximos()
    {
        return $this->render('eventos.html.twig');
    }
    /**
     * @Route("/gestioneventos", name="gestioneventos")
     */
    public function gestioneventos()
    {
        return $this->render('gestioneventos.html.twig');
    }
    /**
     * @Route("/ventamaquetas", name="ventamaquetas")
     */
    public function ventamaquetas()
    {
        return $this->render('ventamaquetas.html.twig');
    }
    /**
     * @Route("/gestionmaquetas", name="gestionmaquetas")
     */
    public function gestionmaquetas()
    {
        return $this->render('gestionmaquetas.html.twig');
    }
    /**
     * @Route("/crearUsu", name="crearUsu")
     */
    public function crearUsu()
    {
        //CREAR JSON
        $data = array('json' => ["nombre" => "h"]);
        //ENVIAR PETICION


        $client = HttpClient::create();
        $response = $client->request('POST', 'http://192.168.4.96:8000', $data);

        $datos = $response->toArray();

        $parametros = array('prueba' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('index.html.twig', $parametros);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        //CREAR JSON
        if(isset($_POST['email']) && isset($_POST['password']))
        {


            $data = array('json' => ["email" => $_POST['email'], "password" => $_POST['password'], "tipo" => $_POST['tipo']]);
            //ENVIAR PETICION


            $client = HttpClient::create();
            //$response = $client->request('POST', 'http://192.168.4.96:8000', $data);

            $response = $client->request('POST', 'http://127.0.0.1:8000/login', $data);
            $datos = $response->toArray();

            $parametros = array('datos' => $datos);
        }
        else
        {
            $parametros = array('error' => 'email o contraseña son vacion');
        }

        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('index.html.twig', $parametros);
    }


    /**
     * @Route("/eventosM", name="eventosM")
     */
    public function eventosM()
    {
        //CREAR JSON
        $data = array('json' => ["nombre" => "h"]);
        //ENVIAR PETICION

        $client = HttpClient::create();

        //$response = $client->request('GET', 'http://192.168.4.96:8000', $data);
        $response = $client->request('GET', 'http://127.0.0.1:8000/eventosM', $data);
        //RECIBIR DATOS
        $datos = $response->toArray();

        $parametros = array('eventosM' => $datos);

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('eventos.html.twig', $parametros);
    }

    /**
     * @Route("/mostrelimevento", name="mostrelimevento")
     */
    public function mostrelimevento()
    {
        //CREAR JSON

        //ENVIAR PETICION
        $data = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //comprobar campos no vacios
            if(isset($_POST['btnMostrar']))
            {
                /*$eventos = new Eventos();
                $eventos->setNombre($_POST['nombreEvento']);*/

                $data = array('json' => ["nombre" => "h"]);

            }
            if(isset($_POST['btnEliminar']))
            {
                $data = array('json' => ["nombre" => "h"]);
            }
        }

        $client = HttpClient::create();
        $response = $client->request('POST', '192.168.4.96:8000', $data);

        $datos = $response->toArray();

        $parametros = array('prueba' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('prueba.html.twig', $parametros);
    }

    /**
     * @Route("/crmodevento", name="crmodevento")
     */
    public function crmodevento()
    {
        //CREAR JSON

        //ENVIAR PETICION
        $data = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //comprobar campos no vacios
            if(isset($_POST['btnModificar']))
            {
                /*$eventos = new Eventos();
                $eventos->setNombre($_POST['nombreEvento']);*/

                $data = array('json' => ["nombre" => "h"]);

            }
            if(isset($_POST['btnEliminar']))
            {
                $data = array('json' => ["nombre" => "Q"]);
            }
        }
        $client = HttpClient::create();
        $response = $client->request('GET', '192.168.4.96:8000', $data);

        $datos = $response->toArray();

        $parametros = array('prueba' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('prueba.html.twig', $parametros);
    }

    /**
     * @Route("/mostrmaquetaciones", name="mostrmaquetaciones")
     */
    public function mostrmaquetaciones()
    {
        //CREAR JSON
        $data = array('json' => ["nombre" => "h"]);
        //ENVIAR PETICION


        $client = HttpClient::create();
        //$response = $client->request('GET', '192.168.4.96:8000', $data);
        $response = $client->request('POST', '127.0.0.1:8001/mostrmaqutaciones', $data);

        $datos = $response->toArray();

        $parametros = array('maquetaciones' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('maquetas.html.twig', $parametros);
    }

    /**
     * @Route("/mostrmaquetacion", name="mostrmaquetacion")
     */
    public function mostrelimmaquetacion()
    {
        //CREAR JSON

        //ENVIAR PETICION
        $data = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //comprobar campos no vacios
            if(isset($_POST['btnMostrar']))
            {
                /*$eventos = new Eventos();
                $eventos->setNombre($_POST['nombreEvento']);*/

                $data = array('json' => ["nombre" => "h"]);

            }
            if(isset($_POST['btnEliminar']))
            {
                $data = array('json' => ["nombre" => "h"]);
            }
        }

        $client = HttpClient::create();
        $response = $client->request('POST', '192.168.4.96:8000', $data);

        $datos = $response->toArray();

        $parametros = array('prueba' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('prueba.html.twig', $parametros);
    }

    /**
     * @Route("/cractmaquetacion", name="cractmaquetacion")
     */
    public function cractmaquetacion()
    {
        //CREAR JSON

        //ENVIAR PETICION
        $data = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //comprobar campos no vacios
            if(isset($_POST['btnCrear']))
            {
                /*$eventos = new Eventos();
                $eventos->setNombre($_POST['nombreEvento']);*/

                $data = array('json' => ["nombre" => "h"]);

            }
            if(isset($_POST['btnActualizar']))
            {
                $data = array('json' => ["nombre" => "h"]);
            }
        }

        $client = HttpClient::create();
        $response = $client->request('POST', 'http://192.168.4.96:8000', $data);

        $datos = $response->toArray();

        $parametros = array('prueba' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('prueba.html.twig', $parametros);
    }
    /**
     * @Route("/comprInstru", name="comprInstru")
     */
    public function comprarInstru()
    {
        //CREAR JSON
        $data = array('json' => ["nombre" => "h"]);
        //ENVIAR PETICION


        $client = HttpClient::create();
        $response = $client->request('POST', '192.168.4.96:8000', $data);

        $datos = $response->toArray();

        $parametros = array('prueba' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('prueba.html.twig', $parametros);
    }
    /**
     * @Route("/mostrarInstruComp", name="mostrarInstruComp")
     */
    public function mostrarInstruComp()
    {
        //CREAR JSON
        $data = array('json' => ["nombre" => "h"]);
        //ENVIAR PETICION

        $client = HttpClient::create();
        $response = $client->request('POST', '192.168.4.96:8000', $data);

        $datos = $response->toArray();

        $parametros = array('prueba' => $datos);


        //RECIBIR DATOS

        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('prueba.html.twig', $parametros);
    }

    /**
     * @Route("/mostrarinstruventa", name="mostrarinstruventa")
     */
    public function mostrarinstruventa()
    {
        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('ventainstrumentos.html.twig');
    }

    /**
     * @Route("/cursosdepiano", name="cursosdepiano")
     */
    public function cursosdepiano()
    {
        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('cursosdepiano.html.twig');
    }
}
