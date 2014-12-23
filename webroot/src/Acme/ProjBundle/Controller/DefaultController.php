<?php

namespace Acme\ProjBundle\Controller;

use Acme\ProjBundle\Entity\Comment;
use Acme\ProjBundle\Form\Type\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeProjBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createCommentAction(Request $request)
    {
        $model = new Comment();
        $model->setDate(new \DateTime('now'));
        $model->setRating(5);
        $model->setStatus(1);
        $model->setFailure(1);

        $form = $this->createForm(new CommentType(), $model);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($model);
            $em->flush();

            return new Response('Success!');
        }

        return $this->render('AcmeProjBundle:Default:createComment.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
