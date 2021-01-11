<?php

namespace App\Controller;

use App\Entity\Citas;
use App\Entity\Empresa;
use App\Form\CitasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\InputBag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CitasController extends AbstractController
{
    /**
     * @Route("/registrarCitas", name="registrarCitas")
     */
    public function index(Request $request): Response
    {
        $cita=new Citas();
        $form= $this->createForm(CitasType::class,$cita);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user=$this->getUser();

            $cita->setUser($user);
            //$cita->setEmpresa($empresa);
            $em= $this->getDoctrine()->getManager();
            $em->persist($cita);
            $em->flush();
            return $this->redirectToRoute('misCitas');
        }
        return $this->render('citas/index.html.twig', [
            'formularioC' => $form->createView(),
        ]);

    }

    /**
     * @Route("/citas/{id}", name="VerCitas")
     */
    public function VerCitas($id){
        $em =$this->getDoctrine()->getManager();
        $cita= $em->getRepository(Citas::class)->find($id);
        return $this->render('citas/verCitas.html.twig',['cita'=>$cita]);
    }

    /**
     * @Route("misCitas", name="misCitas")
     */
    public function MisCitas(){
        $user= $this->getUser();
        if($user){
        $em = $this->getDoctrine()->getManager();

        $citas= $em->getRepository(Citas::class)->findBy(['user'=>$user]);
        return $this->render('citas/MisCitas.html.twig',['citas'=>$citas]);
    } else {
            return $this->redirectToRoute('app_login');
        }

    }
    /**
     * @Route("eliminarCitas/{id}", name="eliminarCitas/{id}",requirements={"id"="\d+"})
     */
    public function EliminarCitas(Citas $citas){
        $em=$this->getDoctrine()->getManager();
        $em->remove($citas);
        $em->flush();
        $this->addFlash('success','Cita eliminada correctamente');
        return $this->redirectToRoute('dashboard');
    }

}
