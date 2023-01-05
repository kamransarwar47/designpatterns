<?php
interface Communicative
{
    public function speak(): string;
}

class Dog implements Communicative
{
    public function speak(): string
    {
        return 'woof woof';
    }
}

class Duck implements Communicative
{
    public function speak(): string
    {
        return 'quack quack';
    }
}

class Fox implements Communicative
{
    public function speak(): string
    {
        return 'ring-ding-ding-ding-dingeringeding!, wa-pa-pa-pa-pa-pa-pow!';
    }
}

class Communication
{
    public function communicate(Communicative $animal): string
    {
        return $animal->speak();
    }
}

$fox = new Fox();
$comm = new Communication();
echo $comm->communicate($fox);