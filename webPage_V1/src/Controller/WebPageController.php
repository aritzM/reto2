<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\s;
use Symfony\Flex\Response;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/02/21
 * Time: 19:59
 */
class WebPageController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('menu/menu.html.twig');
    }
    /**
     * @Route("/maquetas", name="maquetas")
     */
    public function maquetas()
    {
        return $this->render('menu/menu.html.twig');
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
     * @Route("/gestion", name="gestion")
     */
    public function gestion()
    {
        return $this->render('gestion.html.twig');
    }

    /**
     * @Route("/prueba", name="prueba")
     */
    public function prueba()
    {
        //CREAR JSON
        $request= array("nombre" => "h");
        //ENVIAR PETICION
        /*$normalizers = array(new GetSetMethodNormalizer());
        $encoders = array("json" => new JsonEncoder());
        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($request, 'json');*/
        $data = array('body' => $request);
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://127.0.0.1:8000', ['json' => ['nombre' => 'h']]);
        //$statusCode = $response->getStatusCode();
        $datos = $response->toArray();
        /*$count = 0;
        $data = array();
        foreach ($datos as $dato){
            $data[$count] = $dato;
        }*/
        $parametros = array('prueba' => $datos);

        //$parametros = array('prueba' => $statusCode);
        //RECIBIR DATOS
        //INTERPRETAR DATOS (MOSTRARLOS)
        return $this->render('prueba.html.twig', $parametros);
    }
}