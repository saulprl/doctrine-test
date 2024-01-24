<?php
// src/User.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "users")]
class User
{
  /** @var int */
  #[ORM\Id]
  #[ORM\Column(type: "integer")]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  /** @var string */
  #[ORM\Column(type: "string")]
  private string $name;

  /** @var Collection<int, Bug> */
  #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: "reporter")]
  private Collection $reportedBugs;

  /** @var Collection<int, Bug> */
  #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: "engineer")]
  private Collection $assignedBugs;

  public function getId(): int|null
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }


  public function __construct()
  {
    $this->reportedBugs = new ArrayCollection();
    $this->assignedBugs = new ArrayCollection();
  }

  public function addReportedBug(Bug $bug): void
  {
    $this->reportedBugs[] = $bug;
  }

  public function assignedToBug(Bug $bug): void
  {
    $this->assignedBugs[] = $bug;
  }
}
