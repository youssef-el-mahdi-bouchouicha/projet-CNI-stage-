<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/employee")
 */
class EmployeeController extends AbstractController
{
    /**
     * @Route("/", name="employee_index", methods={"GET"})
     */
    public function index(): Response
    {
        $employees = $this->getDoctrine()
            ->getRepository(Employee::class)
            ->findAll();

        return $this->render('employee/index.html.twig', [
            'employees' => $employees,
        ]);
    }

    /**
     * @Route("/new", name="employee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employee);
            $entityManager->flush();

            return $this->redirectToRoute('employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/new.html.twig', [
            'employee' => $employee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{ide}", name="employee_show", methods={"GET"})
     */
    public function show(Employee $employee): Response
    {
        return $this->render('employee/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    /**
     * @Route("/{ide}/edit", name="employee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Employee $employee): Response
    {
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/edit.html.twig', [
            'employee' => $employee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{ide}", name="employee_delete", methods={"POST"})
     */
    public function delete(Request $request, Employee $employee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employee->getIde(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($employee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employee_index', [], Response::HTTP_SEE_OTHER);
    }
}
