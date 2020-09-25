<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class ListUsersAction extends UserAction
{
    /**
     * @OA\Get(
     *   tags={"user"},
     *   path="/users/{id}",
     *   operationId="getUser",
     *   @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="User id",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="A single user",
     *     @OA\JsonContent(ref="#/components/schemas/User")
     *   )
     * )
     */
    protected function action(): Response
    {
        $users = $this->userRepository->findAll();

        $this->logger->info("Users list was viewed.");

        return $this->respondWithData($users);
    }
}
