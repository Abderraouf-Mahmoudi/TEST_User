<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle file upload
            $imageFile = $form->get('imageUser')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // Sanitize the filename
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'), // You need to configure this parameter
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // Set the newFilename in your User entity
                $user->setImageUser($newFilename);
            }

            // encode the plain password and set role
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Assuming the role should be ROLE_CLIENT
            $user->setRoles(['Client']);
            $user->setStatus( false );
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirect or any other post-registration logic
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/delete/{id}', name: 'app_delete_user')]
public function deleteUser(int $idu, EntityManagerInterface $entityManager): Response
{
    // Fetch the user you want to delete from the database using the EntityManager
    $user = $entityManager->getRepository(User::class)->find($idu);

    // Check if the user was found
    if (!$user) {
        $this->addFlash('danger', 'User not found.');
        return $this->redirectToRoute('app_user_index'); // Adjust the redirection as per your application's routes
    }

    // If the user is found, remove them from the database
    try {
        $entityManager->remove($user);
        $entityManager->flush();

        // Add a flash message to inform the user of successful deletion
        $this->addFlash('success', 'The user has been deleted successfully.');
    } catch (\Exception $e) {
        // If there's an error, you might want to handle it gracefully
        $this->addFlash('danger', 'There was a problem deleting the user.');
    }

    // Redirect to a route after deletion. Adjust the route as necessary.
    return $this->redirectToRoute('app_user_index'); // Assuming 'user_list' is the route where users are listed
}
}