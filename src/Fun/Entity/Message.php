<?php

namespace Fun\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @Entity */
class Message
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /** @Column(length=140) */
    private $text;
    /** @Column(type="datetime", name="posted_at") */
    private $postedAt;
}