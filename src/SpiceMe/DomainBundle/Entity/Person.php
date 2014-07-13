<?php

namespace SpiceMe\DomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="Person", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="researchcriteria", columns={"latitude", "longitude", "minage", "maxage", "lookmen", "lookwomen", "looksex", "lookrelationship"})})
 * @ORM\Entity
 */
class Person
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
     * @ORM\Column(name="fb_id", type="bigint", nullable=false)
     */
    private $fbId;
    /**
     * @var integer
     *
     * @ORM\Column(name="fb_access_token", type="string", length=64, nullable=false)
     */    
    private $fbAccessToken;
    
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=64, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=64, nullable=false)
     */
    private $lastName;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=256, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="gender", type="string", length=15, nullable=true)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="avatar_img", type="string", length=1024, nullable=true)
     */
    private $avatarImg;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="about", type="string", length=1024, nullable=true)
     */
    private $about;

    /**
     * @var integer
     *
     * @ORM\Column(name="credit", type="integer", nullable=true)
     */
    private $credit = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate_local", type="datetime", nullable=true)
     */
    private $birthdateLocal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate_utc", type="datetime", nullable=true)
     */
    private $birthdateUtc;

    /**
     * @var string
     *
     * @ORM\Column(name="birth_latitude", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $birthLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="birth_longitude", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $birthLongitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $longitude;

    /**
     * @var integer
     *
     * @ORM\Column(name="analyzed", type="integer", nullable=true)
     */
    private $analyzed = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logindate", type="datetime", nullable=true)
     */
    private $logindate;

    /**
     * @var integer
     *
     * @ORM\Column(name="minage", type="integer", nullable=true)
     */
    private $minage;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxage", type="integer", nullable=true)
     */
    private $maxage;

    /**
     * @var integer
     *
     * @ORM\Column(name="distance", type="integer", nullable=true)
     */
    private $distance;

    /**
     * @var integer
     *
     * @ORM\Column(name="lookmen", type="smallint", nullable=true)
     */
    private $lookmen;

    /**
     * @var integer
     *
     * @ORM\Column(name="lookwomen", type="smallint", nullable=true)
     */
    private $lookwomen;

    /**
     * @var integer
     *
     * @ORM\Column(name="looksex", type="smallint", nullable=true)
     */
    private $looksex = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="lookrelationship", type="smallint", nullable=true)
     */
    private $lookrelationship = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="weeklynotification", type="integer", nullable=true)
     */
    private $weeklynotification = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="dailynotification", type="integer", nullable=true)
     */
    private $dailynotification = '0';

     /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=6, nullable=true)
     */
    private $locale;
    
     /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="integer", nullable=true)
     */
    private $timezone;    
    
    public function getBirthLatitude() {
        return $this->birthLatitude;
    }

    public function getBirthLongitude() {
        return $this->birthLongitude;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function getTimezone() {
        return $this->timezone;
    }

    public function setBirthLatitude($birthLatitude) {
        $this->birthLatitude = $birthLatitude;
    }

    public function setBirthLongitude($birthLongitude) {
        $this->birthLongitude = $birthLongitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function setTimezone($timezone) {
        $this->timezone = $timezone;
    }

        
    public function getId() {
        return $this->id;
    }

    public function getFbId() {
        return $this->fbId;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getAbout() {
        return $this->about;
    }

    public function getCredit() {
        return $this->credit;
    }

    public function getBirthdateLocal() {
        return $this->birthdateLocal;
    }

    public function getBirthdateUtc() {
        return $this->birthdateUtc;
    }





    public function getLongitude() {
        return $this->longitude;
    }

    public function getAnalyzed() {
        return $this->analyzed;
    }


    public function getMinage() {
        return $this->minage;
    }

    public function getMaxage() {
        return $this->maxage;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getLookmen() {
        return $this->lookmen;
    }

    public function getLookwomen() {
        return $this->lookwomen;
    }

    public function getLooksex() {
        return $this->looksex;
    }

    public function getLookrelationship() {
        return $this->lookrelationship;
    }

    public function getWeeklynotification() {
        return $this->weeklynotification;
    }

    public function getDailynotification() {
        return $this->dailynotification;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFbId($fbId) {
        $this->fbId = $fbId;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setAbout($about) {
        $this->about = $about;
    }

    public function setCredit($credit) {
        $this->credit = $credit;
    }

    public function setBirthdateLocal(\DateTime $birthdateLocal) {
        $this->birthdateLocal = $birthdateLocal;
    }

    public function setBirthdateUtc(\DateTime $birthdateUtc) {
        $this->birthdateUtc = $birthdateUtc;
    }



    public function setAnalyzed($analyzed) {
        $this->analyzed = $analyzed;
    }


    public function setMinage($minage) {
        $this->minage = $minage;
    }

    public function setMaxage($maxage) {
        $this->maxage = $maxage;
    }

    public function setDistance($distance) {
        $this->distance = $distance;
    }

    public function setLookmen($lookmen) {
        $this->lookmen = $lookmen;
    }

    public function setLookwomen($lookwomen) {
        $this->lookwomen = $lookwomen;
    }

    public function setLooksex($looksex) {
        $this->looksex = $looksex;
    }

    public function setLookrelationship($lookrelationship) {
        $this->lookrelationship = $lookrelationship;
    }

    public function setWeeklynotification($weeklynotification) {
        $this->weeklynotification = $weeklynotification;
    }

    public function setDailynotification($dailynotification) {
        $this->dailynotification = $dailynotification;
    }

    public function getFbAccessToken() {
        return $this->fbAccessToken;
    }

    public function setFbAccessToken($fbAccessToken) {
        $this->fbAccessToken = $fbAccessToken;
    }
    public function getAvatarImg() {
        return $this->avatarImg;
    }

    public function getLogindate() {
        return $this->logindate;
    }

    public function getLocale() {
        return $this->locale;
    }

    public function setAvatarImg($avatarImg) {
        $this->avatarImg = $avatarImg;
    }

    public function setLogindate(\DateTime $logindate) {
        $this->logindate = $logindate;
    }

    public function setLocale($locale) {
        $this->locale = $locale;
    }
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }



}
