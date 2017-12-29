<?php

namespace PaginaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PaginaBundle:Default:index.html.twig');
    }

    public function contactoAction(){
      return $this->render('PaginaBundle:Default:contacto.html.twig');
    }

    public function quienesAction(){
      return $this->render('PaginaBundle:Default:quienes.html.twig');
    }

    public function serviciosAction(){
      return $this->render('PaginaBundle:Default:servicio.html.twig');
    }

    public function sociosAction(){
      return $this->render('PaginaBundle:Default:socios.html.twig');
    }

    public function blogAction(){
      return $this->render('PaginaBundle:Default:blog.html.twig');
    }

    public function corporativoAction(){
      return $this->render('PaginaBundle:Default:corporativo.html.twig');
    }

    public function gobiernoAction(){
      return $this->render('PaginaBundle:Default:gobierno.html.twig');
    }

    public function educacionAction(){
      return $this->render('PaginaBundle:Default:educacion.html.twig');
    }

    public function wmailAction(){
      return $this->render('PaginaBundle:Default:wmail.html.twig');
    }

    public function ipsAction(){
      return $this->render('PaginaBundle:Default:ips.html.twig');
    }

    public function storageAction(){
      return $this->render('PaginaBundle:Default:storage.html.twig');
    }

    public function newgenerationAction(){
      return $this->render('PaginaBundle:Default:newgeneration.html.twig');
    }

    public function portalcautivoAction(){
      return $this->render('PaginaBundle:Default:portalcautivo.html.twig');
    }

    public function firewallAction(){
      return $this->render('PaginaBundle:Default:firewall.html.twig');
    }

    public function enviarMailAction(Request $request){

      $nombre = $request->get("nombre");
      $correo = $request->get("correo");
      $mensaje = $request->get("mensaje");

      $message = \Swift_Message::newInstance()
        ->setSubject($nombre)
        ->setFrom($correo)
        ->setTo('creativef25@gmail.com')
        ->setBody(
          $this->renderView(
            'PaginaBundle:Default:correo.html.twig', array('nombre' => $nombre, 'correo' => $correo, 'mensaje' => $mensaje)
            ),
            'text/html'
          )
          ;
          $this->get('mailer')->send($message);

          return $this->render('PaginaBundle:Default:index.html.twig');
    }

    public function enviarSocioAction(Request $request){

      $empresa = $request->get("empresa");
      $nombre = $request->get("nombre");
      $select1 = $request->get("select1");
      $correo = $request->get("correo");
      $select2 = $request->get("select2");
      $ciudad = $request->get("ciudad");
      $cp = $request->get("cp");
      $direccion = $request->get("direccion");
      $datos = $request->get("datos");
      $comentarios = $request->get("comentarios");

      $mensage =\Swift_Message::newInstance()
        ->setSubject('Un socio se esta postulando')
        ->setFrom('creativef25@gmail.com')
        ->setTo('creativef25@gmail.com')
        ->setBody(
          $this->renderView(
              'PaginaBundle:Default:socio_mail.html.twig', array('empresa' => $empresa, 'nombre' => $nombre, 'select1' => $select1, 'correo' => $correo,
              'select2' => $select2, 'ciudad' => $ciudad, 'cp' => $cp, 'direccion' => $direccion, 'datos' => $datos, 'comentarios' => $comentarios)
            ),
            'text/html'
          )
          ;
          $this->get('mailer')->send($mensage);

          return $this->render('PaginaBundle:Default:index.html.twig');
    }

}
