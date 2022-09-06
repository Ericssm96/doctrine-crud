<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "students")]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;

    #[OneToMany(targetEntity: Phone::class, mappedBy: 'student', cascade: ['persist'])]
    private Collection $phones;

    public function __construct(
        #[Column]
        public string $name
    )
    {
        $this->phones = new ArrayCollection();
    }

    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    /** @return iterable<Phone> */
    public function phones(): iterable
    {
        return $this->phones;
    }
}