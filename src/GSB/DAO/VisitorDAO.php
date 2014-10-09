<?php

namespace GSB\DAO;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use GSB\Domain\Visitor;

class VisitorDAO extends DAO implements UserProviderInterface
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
        $sql = "select * from visitor where user_name=?";
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
     public function supportsClass($class)
    {
        return 'GSB\Domain\Visitor' === $class;
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
        $visitor->setVisitorLast($row['visitor_last_name']);
        $visitor->setVisitorFirst($row['visitor_first_name']);
        $visitor->setVisitorAddresse($row['visitor_address']);
        $visitor->setVisitorZipCode($row['visitor_zip_code']);
        $visitor->setVisitorCity($row['visitor_city']);
        $visitor->setHiringDate($row['hiring_date']);
        $visitor->setUserName($row['user_name']);
        $visitor->setPasseword($row['password']);
        $visitor->setSalt($row['salt']);
        $visitor->setRole($row['role']);
        $visitor->setType($row['visitor_type']);
        return $visitor;
    }
}
