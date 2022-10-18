<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contentwarehouse;

class LegalCitationCourtDocument extends \Google\Collection
{
  protected $collection_key = 'unknowndate';
  protected $internal_gapi_mappings = [
        "arguedBefore" => "ArguedBefore",
        "arguedDate" => "ArguedDate",
        "certiorariCourtName" => "CertiorariCourtName",
        "certiorariRelationship" => "CertiorariRelationship",
        "courtTerm" => "CourtTerm",
        "decidedDate" => "DecidedDate",
        "filedDate" => "FiledDate",
        "memoID" => "MemoID",
        "modifiedDate" => "ModifiedDate",
        "syllabus" => "Syllabus",
  ];
  protected $arguedBeforeType = LegalPerson::class;
  protected $arguedBeforeDataType = 'array';
  protected $arguedDateType = LegalDate::class;
  protected $arguedDateDataType = '';
  /**
   * @var string
   */
  public $certiorariCourtName;
  /**
   * @var int
   */
  public $certiorariRelationship;
  /**
   * @var string
   */
  public $courtTerm;
  protected $decidedDateType = LegalDate::class;
  protected $decidedDateDataType = '';
  protected $filedDateType = LegalDate::class;
  protected $filedDateDataType = '';
  /**
   * @var string
   */
  public $memoID;
  protected $modifiedDateType = LegalDate::class;
  protected $modifiedDateDataType = '';
  /**
   * @var string
   */
  public $syllabus;
  protected $courtType = LegalCitationCourtDocumentCourt::class;
  protected $courtDataType = '';
  protected $opinioninfoType = LegalCitationCourtDocumentOpinionInfo::class;
  protected $opinioninfoDataType = 'array';
  protected $perdocketinfoType = LegalCitationCourtDocumentPerDocketInfo::class;
  protected $perdocketinfoDataType = 'array';
  protected $pubType = LegalCitationCourtDocumentPub::class;
  protected $pubDataType = 'array';
  protected $unknowndateType = LegalCitationCourtDocumentUnknownDate::class;
  protected $unknowndateDataType = 'array';

  /**
   * @param LegalPerson[]
   */
  public function setArguedBefore($arguedBefore)
  {
    $this->arguedBefore = $arguedBefore;
  }
  /**
   * @return LegalPerson[]
   */
  public function getArguedBefore()
  {
    return $this->arguedBefore;
  }
  /**
   * @param LegalDate
   */
  public function setArguedDate(LegalDate $arguedDate)
  {
    $this->arguedDate = $arguedDate;
  }
  /**
   * @return LegalDate
   */
  public function getArguedDate()
  {
    return $this->arguedDate;
  }
  /**
   * @param string
   */
  public function setCertiorariCourtName($certiorariCourtName)
  {
    $this->certiorariCourtName = $certiorariCourtName;
  }
  /**
   * @return string
   */
  public function getCertiorariCourtName()
  {
    return $this->certiorariCourtName;
  }
  /**
   * @param int
   */
  public function setCertiorariRelationship($certiorariRelationship)
  {
    $this->certiorariRelationship = $certiorariRelationship;
  }
  /**
   * @return int
   */
  public function getCertiorariRelationship()
  {
    return $this->certiorariRelationship;
  }
  /**
   * @param string
   */
  public function setCourtTerm($courtTerm)
  {
    $this->courtTerm = $courtTerm;
  }
  /**
   * @return string
   */
  public function getCourtTerm()
  {
    return $this->courtTerm;
  }
  /**
   * @param LegalDate
   */
  public function setDecidedDate(LegalDate $decidedDate)
  {
    $this->decidedDate = $decidedDate;
  }
  /**
   * @return LegalDate
   */
  public function getDecidedDate()
  {
    return $this->decidedDate;
  }
  /**
   * @param LegalDate
   */
  public function setFiledDate(LegalDate $filedDate)
  {
    $this->filedDate = $filedDate;
  }
  /**
   * @return LegalDate
   */
  public function getFiledDate()
  {
    return $this->filedDate;
  }
  /**
   * @param string
   */
  public function setMemoID($memoID)
  {
    $this->memoID = $memoID;
  }
  /**
   * @return string
   */
  public function getMemoID()
  {
    return $this->memoID;
  }
  /**
   * @param LegalDate
   */
  public function setModifiedDate(LegalDate $modifiedDate)
  {
    $this->modifiedDate = $modifiedDate;
  }
  /**
   * @return LegalDate
   */
  public function getModifiedDate()
  {
    return $this->modifiedDate;
  }
  /**
   * @param string
   */
  public function setSyllabus($syllabus)
  {
    $this->syllabus = $syllabus;
  }
  /**
   * @return string
   */
  public function getSyllabus()
  {
    return $this->syllabus;
  }
  /**
   * @param LegalCitationCourtDocumentCourt
   */
  public function setCourt(LegalCitationCourtDocumentCourt $court)
  {
    $this->court = $court;
  }
  /**
   * @return LegalCitationCourtDocumentCourt
   */
  public function getCourt()
  {
    return $this->court;
  }
  /**
   * @param LegalCitationCourtDocumentOpinionInfo[]
   */
  public function setOpinioninfo($opinioninfo)
  {
    $this->opinioninfo = $opinioninfo;
  }
  /**
   * @return LegalCitationCourtDocumentOpinionInfo[]
   */
  public function getOpinioninfo()
  {
    return $this->opinioninfo;
  }
  /**
   * @param LegalCitationCourtDocumentPerDocketInfo[]
   */
  public function setPerdocketinfo($perdocketinfo)
  {
    $this->perdocketinfo = $perdocketinfo;
  }
  /**
   * @return LegalCitationCourtDocumentPerDocketInfo[]
   */
  public function getPerdocketinfo()
  {
    return $this->perdocketinfo;
  }
  /**
   * @param LegalCitationCourtDocumentPub[]
   */
  public function setPub($pub)
  {
    $this->pub = $pub;
  }
  /**
   * @return LegalCitationCourtDocumentPub[]
   */
  public function getPub()
  {
    return $this->pub;
  }
  /**
   * @param LegalCitationCourtDocumentUnknownDate[]
   */
  public function setUnknowndate($unknowndate)
  {
    $this->unknowndate = $unknowndate;
  }
  /**
   * @return LegalCitationCourtDocumentUnknownDate[]
   */
  public function getUnknowndate()
  {
    return $this->unknowndate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitationCourtDocument::class, 'Google_Service_Contentwarehouse_LegalCitationCourtDocument');
