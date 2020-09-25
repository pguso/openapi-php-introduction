<?php
declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

/**
 * @OA\Schema(
 *     title="User",
 *     description="A simple user model."
 * )
 */
class User implements JsonSerializable
{
    /**
     * @OA\Property(type="integer", format="int64", readOnly=true, example=1)
     */
    private $id;

    /**
     * @OA\Property(type="string", example="johndoe")
     */
    private $username;

    /**
     * @OA\Property(type="string", example="John")
     */
    private $firstName;

    /**
     * @OA\Property(type="string", example="Doe")
     */
    private $lastName;

    /**
     * @param int|null  $id
     * @param string    $username
     * @param string    $firstName
     * @param string    $lastName
     */
    public function __construct(?int $id, string $username, string $firstName, string $lastName)
    {
        $this->id = $id;
        $this->username = strtolower($username);
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}
