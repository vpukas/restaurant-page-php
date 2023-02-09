<?php

class User {
    private $idUser;
    private $email;
    private $password;
    private $username;
    private $phone;
    private $idRole;

    /**
     * @param string|null $email
     * @param string $password
     * @param string $username
     * @param string|null $phone
     * @param int|null $idRole
     * @param int|null $idUser
     */
    public function __construct(string $email = null, string $password, string $username, string $phone = null, int $idRole = null, int $idUser = null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->phone = $phone;
        $this->idUser = $idUser;
        $this->idRole = $idRole;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     */
    public function setIdUser(?int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return int|null
     */
    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    /**
     * @param int|null $idRole
     */
    public function setIdRole(?int $idRole): void
    {
        $this->idRole = $idRole;
    }




}