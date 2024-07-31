<?php

namespace App\Entity;

class User
{
    private string $firstname;
    private int $age;
    private string $favoritePet;

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function getFavoritePet(): string
    {
        return $this->favoritePet;
    }

    public function setFavoritePet(string $favoritePet): self
    {
        $this->favoritePet = $favoritePet;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'firstname' => $this->getFirstname(),
            'age' => $this->getAge(),
            'favoritePet' => $this->getFavoritePet(),
        ];
    }
}