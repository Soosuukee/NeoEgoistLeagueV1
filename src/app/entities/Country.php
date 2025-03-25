<?php

class Country
{

    private int $id;
    private string $name;
    private string $flag;

    public function __construct(int $id, string $name, string $flag)
    {
        $this->id = $id;
        $this->name = $name;
        $this->flag = $flag;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFlag(): string
    {
        return $this->flag;
    }
}
