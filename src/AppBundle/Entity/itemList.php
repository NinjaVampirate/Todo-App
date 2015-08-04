<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="itemlist")
 */

class itemList
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $Item;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $Status;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Item
     *
     * @param string $item
     * @return itemList
     */
    public function setItem($item)
    {
        $this->Item = $item;

        return $this;
    }

    /**
     * Get Item
     *
     * @return string 
     */
    public function getItem()
    {
        return $this->Item;
    }

    /**
     * Set Status
     *
     * @param boolean $status
     * @return itemList
     */
    public function setStatus($status)
    {
        $this->Status = $status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->Status;
    }
}
