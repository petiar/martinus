<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ImportType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * Class Import
 *
 * @package App\Controller
 *
 */
class Import extends AbstractController
{

  /**
   * @param \Symfony\Component\HttpFoundation\Request $request
   *
   * @return \Symfony\Component\HttpFoundation\Response
   * @Route("/import")
   */
  public function import(Request $request): Response
  {
    $form = $this->createForm(ImportType::class);

    $form->handleRequest($request);
    if ($form->isSubmitted()) {
      $importFile = $form->get('import')->getData();
      if ($importFile) {
        $newFilename = 'import-' . uniqid() . '.' . $importFile->getClientOriginalExtension();
        $importFile->move(
          $this->getParameter('imports_directory'),
          $newFilename
        );

       $handler = fopen($this->getParameter('imports_directory') . '/' . $newFilename, 'r');
       if ($handler !== FALSE) {
         $em = $this->getDoctrine()->getManager();
         while (($row = fgetcsv($handler, 9999, ";")) !== FALSE) {
           $book = new Book();

           $book->setId($row[0]);
           $book->setTitle($row[1]);
           $book->setAuthor($row[2]);
           $book->setPublisher($row[3]);
           $book->setYear((int) $row[4]);
           $book->setPicture($row[5]);
           $book->setRating($row[6]);
           $book->setDescription($row[7]);

           $em->persist($book);
         }
         $em->flush();
       }
      }
      return $this->redirectToRoute('books');
    }

    return $this->render('base.html.twig', [
      'form' => $form->createView(),
      'template' => 'import',
    ]);
  }

  /**
   * @param int $page
   * @Route("/books/{page}", name="books")
   */
  public function books($page = 1)
  {
    $repository = $this->getDoctrine()->getRepository(Book::class);
    $books = $repository->findBy([], [], 30, ($page - 1) * 30);

    return $this->render('base.html.twig', [
      'books' => $books,
      'page' => $page,
      'template' => 'books',
    ]);
  }

  /**
   * @param $id
   * @Route("/book/{id}", name="book")
   */
  public function book($id = NULL)
  {
    if (!$id) {
      return $this->redirectToRoute('books');
    }
    $repository = $this->getDoctrine()->getRepository(Book::class);
    $book = $repository->find($id);

    return $this->render('base.html.twig', [
      'book' => $book,
      'template' => 'book',
    ]);
  }
}
