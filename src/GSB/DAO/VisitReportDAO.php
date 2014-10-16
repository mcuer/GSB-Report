<?php

namespace GSB\DAO;

use GSB\Domain\VisitReport;

class VisitReportDAO extends DAO
{
    protected $practitionerDAO;
    public function setPractitionerDAO($practitionerDAO) {
        $this->practitionerDAO = $practitionerDAO;
    }
    protected $visitorDAO;
    public function setVisitorDAO($visitorDAO) {
        $this->visitorDAO = $visitorDAO;
    }

        /**
     * Returns the list of all practitioner types, sorted by name.
     *
     * @return array The list of all families.
     */
    public function findAll() {
        $sql = "select * from visit_report";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $visitReport = array();
        foreach ($result as $row) {
            $visitReportId = $row['report_id'];
            $visitReport[$visitReportId] = $this->buildDomainObject($row);
        }
        return $visitReport;
    }

    /**
     * Returns the visit-report matching the given id.
     *
     * @param integer $id
     *
     * @return \GSB\Domain\VisitReport|throws an exception if no PractitionerType is found.
     */
    public function find($id) {
        $sql = "select * from visit_report where report_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No report visit found for id " . $id);
    }

    /**
     * Creates a PractitionerType instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\PractitionerType
     */
    protected function buildDomainObject($row) {
        $practicienId = $row['practitioner_id'];
        $practicien = $this->practitionerDAO->find($practicienId);
        
        $visitorId = $row['visitor_id'];
        $visitor = $this->visitorID->find($visitorId);
        
        $visitReport = new VisitReport();
        $visitReport->setReportId($row['report_id']);
        $visitReport->setPractitionerId($practicien);
        $visitReport->setVisitorId($visitor);
        $visitReport->setReportingDate($row['reporting_date']);
        $visitReport->setAssessment($row['assessment']);
        $visitReport->setPurpose($row['purpose']);
        return $visitReport;
    }
}
