<?php

namespace App\Entity;

use App\Repository\HostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HostRepository::class)
 */
class Host
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $superficy;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_of_people = false;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $price_for_options;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forTents = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forCaravans = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forVans = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forCars = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forMotorcycles = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Country = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Mountain = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Sea = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $City = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Lake = false;

    /**
     * @ORM\Column(type="text")
     */
    private $Summarise;

    /**
     * @ORM\Column(type="text")
     */
    private $The_Setting;

    /**
     * @ORM\Column(type="text")
     */
    private $The_Sanitary_Facilities;

    /**
     * @ORM\Column(type="text")
     */
    private $The_Equipement;

   
    /**
     * @ORM\Column(type="boolean")
     */
    private $Loan = false ;

    /**
     * @ORM\Column(type="text")
     */
    private $Other_Remarks;

    /**
     * @ORM\Column(type="text")
     */
    private $Rules_of_the_field;

    /**
     * @ORM\Column(type="text")
     */
    private $the_pitches;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $price_of_location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $region;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="host",cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Options::class, inversedBy="hosts",cascade={"persist"})
     */
    private $Options;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Host")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="hosts")
     */
    private $User;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->options = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setHost($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getHost() === $this) {
                $image->setHost(null);
            }
        }
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getSuperficy(): ?int
    {
        return $this->superficy;
    }

    public function setSuperficy(int $superficy): self
    {
        $this->superficy = $superficy;

        return $this;
    }

    public function getNumberOfPeople(): ?int
    {
        return $this->number_of_people;
    }

    public function setNumberOfPeople(int $number_of_people): self
    {
        $this->number_of_people = $number_of_people;

        return $this;
    }

    public function getPriceForOptions(): ?string
    {
        return $this->price_for_options;
    }

    public function setPriceForOptions(float $price_for_options): self
    {
        $this->price_for_options = $price_for_options;

        return $this;
    }

    public function getForTents(): ?bool
    {
        return $this->forTents;
    }

    public function setForTents(bool $forTents): self
    {
        $this->forTents = $forTents;

        return $this;
    }

    public function getForCaravans(): ?bool
    {
        return $this->forCaravans;
    }

    public function setForCaravans(bool $forCaravans): self
    {
        $this->forCaravans = $forCaravans;

        return $this;
    }

    public function getForVans(): ?bool
    {
        return $this->forVans;
    }

    public function setForVans(bool $forVans): self
    {
        $this->forVans = $forVans;

        return $this;
    }

    public function getForCars(): ?bool
    {
        return $this->forCars;
    }

    public function setForCars(bool $forCars): self
    {
        $this->forCars = $forCars;

        return $this;
    }

    public function getForMotorcycles(): ?bool
    {
        return $this->forMotorcycles;
    }

    public function setForMotorcycles(bool $forMotorcycles): self
    {
        $this->forMotorcycles = $forMotorcycles;

        return $this;
    }

    public function getCountry(): ?bool
    {
        return $this->Country;
    }

    public function setCountry(bool $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getMountain(): ?bool
    {
        return $this->Mountain;
    }

    public function setMountain(bool $Mountain): self
    {
        $this->Mountain = $Mountain;

        return $this;
    }

    public function getSea(): ?bool
    {
        return $this->Sea;
    }

    public function setSea(bool $Sea): self
    {
        $this->Sea = $Sea;

        return $this;
    }

    public function getCity(): ?bool
    {
        return $this->City;
    }

    public function setCity(bool $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getLake(): ?bool
    {
        return $this->Lake;
    }

    public function setLake(bool $Lake): self
    {
        $this->Lake = $Lake;

        return $this;
    }

    public function getSummarise(): ?string
    {
        return $this->Summarise;
    }

    public function setSummarise(string $Summarise): self
    {
        $this->Summarise = $Summarise;

        return $this;
    }

    public function getTheSetting(): ?string
    {
        return $this->The_Setting;
    }

    public function setTheSetting(string $The_Setting): self
    {
        $this->The_Setting = $The_Setting;

        return $this;
    }

    public function getTheSanitaryFacilities(): ?string
    {
        return $this->The_Sanitary_Facilities;
    }

    public function setTheSanitaryFacilities(string $The_Sanitary_Facilities): self
    {
        $this->The_Sanitary_Facilities = $The_Sanitary_Facilities;

        return $this;
    }

    public function getTheEquipement(): ?string
    {
        return $this->The_Equipement;
    }

    public function setTheEquipement(string $The_Equipement): self
    {
        $this->The_Equipement = $The_Equipement;

        return $this;
    }

    public function getLoan(): ?bool
    {
        return $this->Loan;
    }

    public function setLoan(bool $Loan): self
    {
        $this->Loan = $Loan;

        return $this;
    }

    public function getOtherRemarks(): ?string
    {
        return $this->Other_Remarks;
    }

    public function setOtherRemarks(string $Other_Remarks): self
    {
        $this->Other_Remarks = $Other_Remarks;

        return $this;
    }

    public function getRulesOfTheField(): ?string
    {
        return $this->Rules_of_the_field;
    }

    public function setRulesOfTheField(string $Rules_of_the_field): self
    {
        $this->Rules_of_the_field = $Rules_of_the_field;

        return $this;
    }

    public function getThePitches(): ?string
    {
        return $this->the_pitches;
    }

    public function setThePitches(string $the_pitches): self
    {
        $this->the_pitches = $the_pitches;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPriceOfLocation(): ?string
    {
        return $this->price_of_location;
    }

    public function setPriceOfLocation(string $price_of_location): self
    {
        $this->price_of_location = $price_of_location;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getOptions(): ?Options
    {
        return $this->Options;
    }

    public function setOptions(?Options $Options): self
    {
        $this->Options = $Options;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setHost($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getHost() === $this) {
                $user->setHost(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

}