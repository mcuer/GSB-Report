<?php

namespace GSB\DAO;

use GSB\Domain\Practicien;

class Practicien extends DAO
{
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
            throw new \Exception("No family found for id " . $id);
    }

    /**
     * Creates a Family instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Family
     */
    protected function buildDomainObject($row) {
        $practicien = new Practicien();
        $practicien->setId($row['practicien_id']);
        $practicien->setName($row['practicien_name']);
        return $practicien;
    }
}
