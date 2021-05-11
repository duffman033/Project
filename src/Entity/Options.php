<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionsRepository::class)
 */
class Options
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $animals;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $barbecue;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $electricity;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $swimming_pool;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $washing_machine;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dryer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $wardrobe;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $toilet_1;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $toilet_2;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $independent_shower;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $shower_at_home;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $kitchen_at_home;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $independent_kitchen;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $independent_refrigerator;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $refrigerator_at_home;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $permitted_naturism;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $private_parking;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $garden_table;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $permitted_campfire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enclosed_terrain;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $train_or_bus;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $shops;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $water_discharges;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $childrens_games;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $handicapped_access;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $independent_access;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $drinking_water;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ElectricalCharge;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Internet;

    /**
     * @ORM\OneToMany(targetEntity=Host::class, mappedBy="Options")
     */
    private $hosts;

    /**
     * @ORM\OneToMany(targetEntity=Environnement::class, mappedBy="Options")
     */
    private $environnements;

    public function __construct()
    {
        $this->host = new ArrayCollection();
        $this->hosts = new ArrayCollection();
        $this->environnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimals(): ?bool
    {
        return $this->animals;
    }

    public function setAnimals(?bool $animals): self
    {
        $this->animals = $animals;

        return $this;
    }

    public function getBarbecue(): ?bool
    {
        return $this->barbecue;
    }

    public function setBarbecue(?bool $barbecue): self
    {
        $this->barbecue = $barbecue;

        return $this;
    }

    public function getElectricity(): ?bool
    {
        return $this->electricity;
    }

    public function setElectricity(?bool $electricity): self
    {
        $this->electricity = $electricity;

        return $this;
    }

    public function getSwimmingPool(): ?bool
    {
        return $this->swimming_pool;
    }

    public function setSwimmingPool(?bool $swimming_pool): self
    {
        $this->swimming_pool = $swimming_pool;

        return $this;
    }

    public function getWashingMachine(): ?bool
    {
        return $this->washing_machine;
    }

    public function setWashingMachine(?bool $washing_machine): self
    {
        $this->washing_machine = $washing_machine;

        return $this;
    }

    public function getDryer(): ?bool
    {
        return $this->dryer;
    }

    public function setDryer(?bool $dryer): self
    {
        $this->dryer = $dryer;

        return $this;
    }

    public function getWardrobe(): ?bool
    {
        return $this->wardrobe;
    }

    public function setWardrobe(?bool $wardrobe): self
    {
        $this->wardrobe = $wardrobe;

        return $this;
    }

    public function getToilet1(): ?bool
    {
        return $this->toilet_1;
    }

    public function setToilet1(?bool $toilet_1): self
    {
        $this->toilet_1 = $toilet_1;

        return $this;
    }

    public function getToilet2(): ?bool
    {
        return $this->toilet_2;
    }

    public function setToilet2(?bool $toilet_2): self
    {
        $this->toilet_2 = $toilet_2;

        return $this;
    }

    public function getIndependentShower(): ?bool
    {
        return $this->independent_shower;
    }

    public function setIndependentShower(?bool $independent_shower): self
    {
        $this->independent_shower = $independent_shower;

        return $this;
    }

    public function getShowerAtHome(): ?bool
    {
        return $this->shower_at_home;
    }

    public function setShowerAtHome(?bool $shower_at_home): self
    {
        $this->shower_at_home = $shower_at_home;

        return $this;
    }

    public function getKitchenAtHome(): ?bool
    {
        return $this->kitchen_at_home;
    }

    public function setKitchenAtHome(?bool $kitchen_at_home): self
    {
        $this->kitchen_at_home = $kitchen_at_home;

        return $this;
    }

    public function getIndependentKitchen(): ?bool
    {
        return $this->independent_kitchen;
    }

    public function setIndependentKitchen(?bool $independent_kitchen): self
    {
        $this->independent_kitchen = $independent_kitchen;

        return $this;
    }

    public function getIndependentRefrigerator(): ?bool
    {
        return $this->independent_refrigerator;
    }

    public function setIndependentRefrigerator(?bool $independent_refrigerator): self
    {
        $this->independent_refrigerator = $independent_refrigerator;

        return $this;
    }

    public function getRefrigeratorAtHome(): ?bool
    {
        return $this->refrigerator_at_home;
    }

    public function setRefrigeratorAtHome(?bool $refrigerator_at_home): self
    {
        $this->refrigerator_at_home = $refrigerator_at_home;

        return $this;
    }

    public function getPermittedNaturism(): ?bool
    {
        return $this->permitted_naturism;
    }

    public function setPermittedNaturism(?bool $permitted_naturism): self
    {
        $this->permitted_naturism = $permitted_naturism;

        return $this;
    }

    public function getPrivateParking(): ?bool
    {
        return $this->private_parking;
    }

    public function setPrivateParking(?bool $private_parking): self
    {
        $this->private_parking = $private_parking;

        return $this;
    }

    public function getGardenTable(): ?bool
    {
        return $this->garden_table;
    }

    public function setGardenTable(?bool $garden_table): self
    {
        $this->garden_table = $garden_table;

        return $this;
    }

    public function getPermittedCampfire(): ?bool
    {
        return $this->permitted_campfire;
    }

    public function setPermittedCampfire(?bool $permitted_campfire): self
    {
        $this->permitted_campfire = $permitted_campfire;

        return $this;
    }

    public function getEnclosedTerrain(): ?bool
    {
        return $this->enclosed_terrain;
    }

    public function setEnclosedTerrain(?bool $enclosed_terrain): self
    {
        $this->enclosed_terrain = $enclosed_terrain;

        return $this;
    }

    public function getTrainOrBus(): ?bool
    {
        return $this->train_or_bus;
    }

    public function setTrainOrBus(?bool $train_or_bus): self
    {
        $this->train_or_bus = $train_or_bus;

        return $this;
    }

    public function getShops(): ?bool
    {
        return $this->shops;
    }

    public function setShops(?bool $shops): self
    {
        $this->shops = $shops;

        return $this;
    }

    public function getWaterDischarges(): ?bool
    {
        return $this->water_discharges;
    }

    public function setWaterDischarges(?bool $water_discharges): self
    {
        $this->water_discharges = $water_discharges;

        return $this;
    }

    public function getChildrensGames(): ?bool
    {
        return $this->childrens_games;
    }

    public function setChildrensGames(?bool $childrens_games): self
    {
        $this->childrens_games = $childrens_games;

        return $this;
    }

    public function getHandicappedAccess(): ?bool
    {
        return $this->handicapped_access;
    }

    public function setHandicappedAccess(?bool $handicapped_access): self
    {
        $this->handicapped_access = $handicapped_access;

        return $this;
    }

    public function getIndependentAccess(): ?bool
    {
        return $this->independent_access;
    }

    public function setIndependentAccess(?bool $independent_access): self
    {
        $this->independent_access = $independent_access;

        return $this;
    }


    public function getDrinkingWater(): ?bool
    {
        return $this->drinking_water;
    }

    public function setDrinkingWater(?bool $drinking_water): self
    {
        $this->drinking_water = $drinking_water;

        return $this;
    }

    public function getElectricalCharge(): ?bool
    {
        return $this->ElectricalCharge;
    }

    public function setElectricalCharge(?bool $ElectricalCharge): self
    {
        $this->ElectricalCharge = $ElectricalCharge;

        return $this;
    }

    public function getInternet(): ?bool
    {
        return $this->Internet;
    }

    public function setInternet(?bool $Internet): self
    {
        $this->Internet = $Internet;

        return $this;
    }

    /**
     * @return Collection|Host[]
     */
    public function getHosts(): Collection
    {
        return $this->hosts;
    }

    public function addHost(Host $host): self
    {
        if (!$this->hosts->contains($host)) {
            $this->hosts[] = $host;
            $host->setOptions($this);
        }

        return $this;
    }

    public function removeHost(Host $host): self
    {
        if ($this->hosts->removeElement($host)) {
            // set the owning side to null (unless already changed)
            if ($host->getOptions() === $this) {
                $host->setOptions(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Environnement[]
     */
    public function getEnvironnements(): Collection
    {
        return $this->environnements;
    }

    public function addEnvironnement(Environnement $environnement): self
    {
        if (!$this->environnements->contains($environnement)) {
            $this->environnements[] = $environnement;
            $environnement->setOptions($this);
        }

        return $this;
    }

    public function removeEnvironnement(Environnement $environnement): self
    {
        if ($this->environnements->removeElement($environnement)) {
            // set the owning side to null (unless already changed)
            if ($environnement->getOptions() === $this) {
                $environnement->setOptions(null);
            }
        }

        return $this;
    }

}
