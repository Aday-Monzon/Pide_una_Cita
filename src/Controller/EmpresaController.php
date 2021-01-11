<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\Trabaja;
use App\Entity\User;
use App\Form\EmpresaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa", name="empresa")
     */
    public function index(Request $request): Response
    {
        $user= $this->getUser();
        if ($user->getTipoUsuario() == 1) {
            $empresa = new Empresa();
            $form = $this->createForm(EmpresaType::class, $empresa);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $empresa->setUser($user);
                $em = $this->getDoctrine()->getManager();
                $em->persist($empresa);
                $em->flush();
                $this->addFlash('success', 'Registro de empresa realizado con exito');
                return $this->redirectToRoute('misCitas');
            }

            return $this->render('empresa/index.html.twig', [
                'formularioE' => $form->createView(),
            ]);
        } else {
            $this->addFlash('danger','No perteneces a ninguna empresa');
            return $this->redirectToRoute('misCitas');
        }
    }

    /**
     * @Route("/empresa/{id}", name="VerEmpresa")
     */
    public function VerEmpresa($id){
        $em =$this->getDoctrine()->getManager();
        $empresa= $em->getRepository(Empresa::class)->find($id);
        return $this->render('empresa/verEmpresa.html.twig',['empresa'=>$empresa]);
    }

    /**
     * @Route("/nombreEmpresa", name="nombreEmpresa")
     */
    public function NombreEmpresas(){
        $em= $this->getDoctrine()->getManager();
        $empresa= $em->getRepository(Empresa::class)->BuscarTodasLasEmpresa();
        return $this->render('empresa/nombreEmpresa.html.twig',['empresa'=>$empresa]);
    }
}
