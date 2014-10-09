<?php

namespace GSB\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use GSB\Domain\PractitionerType;

class PractitionerTypeDAO extends DAO
{
    /**
     * Returns the list of all  visitor types, sorted by id.
     *
     * 
     */
    public function findAll() {
        $sql = "select * from visitor order by visitor_id";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $visitor = array();
        foreach ($result as $row) {
            $visitor = $row['visitor_id'];
            $visitor[$visitor] = $this->buildDomainObject($row);
        }
        return $visitor;
    }

    /**
     * Returns the visitor matching the given id.
     *
     * @param integer $id
     *
     * @return \GSB\Domain\visitorDAO |throws an exception if no PractitionerType is found.
     */
    public function find($id) {
        $sql = "select * from visitor where visitor_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No visitor found for id " . $id);
    }
    public function loadUserByUsername($username)
    {
        $sql = "select * from visitor where visitor_last_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * Creates a visitor instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\PractitionerType
     */
    protected function buildDomainObject($row) {
        $visitor = new visitor();
        $visitor->setId($row['visitor_id']);
        $visitor->setSector($row['visitor_secteur']);
        $visitor->setLaboraty($row['visitor_laboraty']);
        $visitor->setlast($row['visitor_last']);
        $visitor->setfirst($row['visitor_first']);
        $visitor->setaddresse($row['visitor_address']);
        $visitor->setzip_code($row['visitor_zip_code']);
        $visitor->setcity($row['visitor_city']);
        $visitor->setHiring_date($row['visitor_hiring_date_address']);
        $visitor->setUser_name($row['visitor_user_name']);
        $visitor->setPasseword($row['visitor_passeword']);
        $visitor->setSalt($row['visitor_salt']);
        $visitor->setRole($row['visitor_role']);
        $visitor->setType($row['visitor_type']);
        return $visitor;
    }
}
