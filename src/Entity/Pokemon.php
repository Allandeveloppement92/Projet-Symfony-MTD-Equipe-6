<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="float")
     */
    private $height;

    /**
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @ORM\ManyToMany(targetEntity=Pokedex::class, mappedBy="pokemon")
     */
    private $pokedexes;

    public function __construct()
    {
        $this->pokedexes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return Collection|Pokedex[]
     */
    public function getPokedexes(): Collection
    {
        return $this->pokedexes;
    }

    public function addPokedex(Pokedex $pokedex): self
    {
        if (!$this->pokedexes->contains($pokedex)) {
            $this->pokedexes[] = $pokedex;
            $pokedex->addPokemon($this);
        }

        return $this;
    }

    public function removePokedex(Pokedex $pokedex): self
    {
        if ($this->pokedexes->removeElement($pokedex)) {
            $pokedex->removePokemon($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Name;
    }
}
