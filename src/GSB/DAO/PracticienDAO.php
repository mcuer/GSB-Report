<?php

namespace GSB\DAO;

use GSB\Domain\Practicien;

class PracticienDAO extends DAO
{
    private $PracticienTypeDAO;

    public function setPracticienTypeDAO($practicienTypeDAO) {
        $this->$practicienTypeDAO = $practicienTypeDAO;
    }
    /**
     * Returns the list of all families, sorted by name.
     *
     * @return array The list of all families.
     */
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioner = array();
        foreach ($result as $row) {
            $practicienId = $row['practitioner_id'];
            $practitioner[$practicienId] = $this->buildDomainObject($row);
        }
        return $practitioner;
    }
    /**
     * Returns the list of all practitioners for a given type, sorted by trade name.
     *
     * @param integer $practitionersDd The type id.
     *
     * @return array The list of practitioners.
     */
    public function findAllByType($typeId) {
        $sql = "select * from practitioner where practitioner_type_id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($typeId));
        
        // Convert query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioners[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }
    /**
     * Returns the family matching the given id.
     *
     * @param integer $id The family id.
     *
     * @return \GSB\Domain\Family|throws an exception if no family is found.
     */
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }

    /**
     * Creates a Family instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Practicien
     */
    protected function buildDomainObject($row) {
        $typeId = $row['practitioner_type_id'];
        $type = $this->PracticienTypeDAO->find($typeId);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setName($row['practitioner_name']);
        $practitioner->setFirst_name($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setZip_code($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
        $practitioner->setCoefficient($row['notoriety_coefficient']);
        $practitioner->setType($type);
        return $practitioner;
    }
}
