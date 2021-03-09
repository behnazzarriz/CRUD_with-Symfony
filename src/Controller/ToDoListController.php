<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="to_do_list")
     */
    public function index(): Response
    {

        $tasks=$this->getDoctrine()->getRepository(Task::class)->findBy([],['id'=>'DESC']);


        return $this->render('index.html.twig',
            [
                "tasks"=>$tasks
            ]);
    }

    /**
     * @Route("/creatTask", name="creat_task",methods={"POST"})
     */
    public function creatTask(Request $request)
    {
        $entityManager=$this->getDoctrine()->getManager();
        $task=new Task();
        $title=trim($request->request->get('title'));

        if(!empty($title)){

            $task->setTitle($title);
            $entityManager->persist($task);
            $entityManager->flush();
        }


        return $this->redirectToRoute('to_do_list');




    }
    /**
     * @Route("/switchTask/{id}", name="Switch_task")
     */
    public function switchTask($id): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        $task=$entityManager->getRepository(Task::class)->find($id);
        $task->setStatus(!$task->getStatus());

        $entityManager->flush();
        return $this->redirectToRoute('to_do_list');

    }
    /**
     * @Route("/delete/{id}", name="delete_task")
     */
    public function delete(Task $task)
    {
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($task);
        $entityManager->flush();


        return $this->redirectToRoute('to_do_list');

    }
}
