<?php

namespace SpiceMe\DomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Match
 *
 * @ORM\Table(name="`PersonMatch`", uniqueConstraints={@ORM\UniqueConstraint(name="person_id", columns={"person1_id", "person2_id"})})
 * @ORM\Entity
 */
class PersonMatch
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="person1_id", type="integer", nullable=false)
     */
    private $person1Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="person2_id", type="integer", nullable=false)
     */
    private $person2Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="like1to2", type="smallint", nullable=false)
     */
    private $like1to2;

    /**
     * @var integer
     *
     * @ORM\Column(name="like2to1", type="smallint", nullable=false)
     */
    private $like2to1;

    /**
     * @var integer
     *
     * @ORM\Column(name="vital", type="integer", nullable=false)
     */
    private $vital = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="attraction", type="integer", nullable=false)
     */
    private $attraction = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="emotional", type="integer", nullable=false)
     */
    private $emotional = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="sexual", type="integer", nullable=false)
     */
    private $sexual = '0';


}
