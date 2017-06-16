<?php

namespace Fun\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @Entity */
class Customer
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @Column(length=140) */
    private $name;

    /** @Column(length=140) */
    private $email;
}