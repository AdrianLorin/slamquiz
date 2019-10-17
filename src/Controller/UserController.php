<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/user")
*/

class UserController extends AbstractController {

    /**
    * @Route("/index", name="user_index")
    */

    public function index () {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $usersList = array();

        $usersList[0]['first_name'] = 'Harry';
        $usersList[0]['last_name'] = 'POTDEBEURRE';

        $usersList[1]['first_name'] = 'Ron';
        $usersList[1]['last_name'] = 'DESNEIGES';

        return $this->render('user/user.html.twig', ['users_list' => $usersList, ]);
    }

}