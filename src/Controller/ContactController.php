<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/rendez-vous", name="app_contact_index")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contactForm = $this->createForm(ContactType::class);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contactData = $contactForm->getData();

            $email = (new TemplatedEmail())
                ->from('site@cks-dieppe.com')
                ->to(new Address('cabinet.kine@cks-dieppe.fr'))
                ->subject('Rendez-vous demandé depuis cks-dieppe.fr')

                // path of the Twig template to render
                ->htmlTemplate('emails/contact.html.twig')

                // pass variables (name => value) to the template
                ->context($contactData);

            $mailer->send($email);


            return $this->render('contact/index.html.twig', ['sended' => true]);
        }

        return $this->render('contact/index.html.twig', ['contactForm' => $contactForm->createView(), 'sended' => false]);
    }
}