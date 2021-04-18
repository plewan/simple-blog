<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Validator as AppAssert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity("username")
 * @UniqueEntity("mail")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message = "Nazwa użytkownika nie może być pusta"
     * )
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "Nazwa użytkownika nie może mieć więcej niż {{ length }} znaków"
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message = "Adres mailowy nie może być pusta"
     * )
     * @Assert\Email(
     *      message = "Adres '{{ value }}' nie jest poprawnym adresem mailowym"
     * )
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "Adres mailowy nie może mieć więcej niż {{ length }} znaków"
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @Assert\NotBlank(
     *      message = "Hasło nie może być puste"
     * )
     * @Assert\Length(
     *      min = 8,
     *      max = 40,
     *      minMessage = "Hasło musi mieć co najmniej {{ length }} znaków",
     *      maxMessage = "Hasło nie może mieć więcej niż {{ length }} znaków"
     * )
     * @AppAssert\AtLeastOneCapitalLetter
     */
    private $plainPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        $this->setPassword($plainPassword);

        return $this;
    }
}
