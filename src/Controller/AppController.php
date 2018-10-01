<?php

namespace App\Controller;

use App\DTO\Request;
use App\DTO\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Operation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Swagger\Annotations as SWG;

class AppController extends FOSRestController
{
    /**
     * @Rest\Post("/q")
     * @Operation(
     *     description="Test",
     *     tags={"App"},
     *     summary="",
     *     @SWG\Response(
     *          description="Returned value",
     *          response="200",
     *          @SWG\Schema(ref=@Model(type="App\DTO\Response"))
     *     ),
     *     @SWG\Parameter(
     *          in="body",
     *          name="body",
     *          @SWG\Schema(ref=@Model(type="App\DTO\Request"))
     *     )
     * )
     * @param Request $request
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->handleView($this->view(Response::fromRequest($request), 200));
    }
}
