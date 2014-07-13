<?php

namespace SpiceMe\DomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personpref
 *
 * @ORM\Table(name="PersonPref")
 * @ORM\Entity
 */
class Personpref
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="person_id", type="integer", nullable=false)
     */
    private $personId;

    /**
     * @var string
     *
     * @ORM\Column(name="prefname", type="string", length=16, nullable=false)
     */
    private $prefname;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="textvalue", type="string", length=1024, nullable=false)
     */
    private $textvalue;


}
