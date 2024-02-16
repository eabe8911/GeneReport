<?php
interface ReportInterface
{
    // public function ReportID(string $ReportID = null): ?string;
    // public function ReportName(string $ReportName = null): ?string;
    // public function ReportType(string $ReportType = null): ?string;
    // public function FileName(string $FileName = null): ?string;
    // public function HospitalList(string $HospitalList = null): ?string;
    // public function ReportStatus(string $ReportStatus = null): ?string;
    // public function CreatedAt(string $CreatedAt = null): ?string;
    // public function UpdatedAt(string $UpdatedAt = null): ?string;
    // public function Approved1(string $Approved1 = null): ?string;
    // public function Approved1At(string $Approved1At = null): ?string;
    // public function Approved2(string $Approved2 = null): ?string;
    // public function Approved2At(string $Approved2At = null): ?string;
    public function ReportInfo(string $key, $value = null);
}