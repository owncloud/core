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

class OceanDocTagPatentSpecific extends \Google\Collection
{
  protected $collection_key = 'tenCharUsClassification';
  /**
   * @var string
   */
  public $applicationDate;
  /**
   * @var string
   */
  public $contentLanguage;
  /**
   * @var int
   */
  public $docType;
  /**
   * @var string
   */
  public $documentNumber;
  /**
   * @var string[]
   */
  public $domesticClassification;
  /**
   * @var string[]
   */
  public $internationalClassification;
  /**
   * @var string
   */
  public $issueDate;
  /**
   * @var string
   */
  public $patentAssignee;
  /**
   * @var string
   */
  public $publicationNumber;
  /**
   * @var string
   */
  public $relativeThumbnailPath;
  /**
   * @var string[]
   */
  public $tenCharUsClassification;

  /**
   * @param string
   */
  public function setApplicationDate($applicationDate)
  {
    $this->applicationDate = $applicationDate;
  }
  /**
   * @return string
   */
  public function getApplicationDate()
  {
    return $this->applicationDate;
  }
  /**
   * @param string
   */
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  /**
   * @return string
   */
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param int
   */
  public function setDocType($docType)
  {
    $this->docType = $docType;
  }
  /**
   * @return int
   */
  public function getDocType()
  {
    return $this->docType;
  }
  /**
   * @param string
   */
  public function setDocumentNumber($documentNumber)
  {
    $this->documentNumber = $documentNumber;
  }
  /**
   * @return string
   */
  public function getDocumentNumber()
  {
    return $this->documentNumber;
  }
  /**
   * @param string[]
   */
  public function setDomesticClassification($domesticClassification)
  {
    $this->domesticClassification = $domesticClassification;
  }
  /**
   * @return string[]
   */
  public function getDomesticClassification()
  {
    return $this->domesticClassification;
  }
  /**
   * @param string[]
   */
  public function setInternationalClassification($internationalClassification)
  {
    $this->internationalClassification = $internationalClassification;
  }
  /**
   * @return string[]
   */
  public function getInternationalClassification()
  {
    return $this->internationalClassification;
  }
  /**
   * @param string
   */
  public function setIssueDate($issueDate)
  {
    $this->issueDate = $issueDate;
  }
  /**
   * @return string
   */
  public function getIssueDate()
  {
    return $this->issueDate;
  }
  /**
   * @param string
   */
  public function setPatentAssignee($patentAssignee)
  {
    $this->patentAssignee = $patentAssignee;
  }
  /**
   * @return string
   */
  public function getPatentAssignee()
  {
    return $this->patentAssignee;
  }
  /**
   * @param string
   */
  public function setPublicationNumber($publicationNumber)
  {
    $this->publicationNumber = $publicationNumber;
  }
  /**
   * @return string
   */
  public function getPublicationNumber()
  {
    return $this->publicationNumber;
  }
  /**
   * @param string
   */
  public function setRelativeThumbnailPath($relativeThumbnailPath)
  {
    $this->relativeThumbnailPath = $relativeThumbnailPath;
  }
  /**
   * @return string
   */
  public function getRelativeThumbnailPath()
  {
    return $this->relativeThumbnailPath;
  }
  /**
   * @param string[]
   */
  public function setTenCharUsClassification($tenCharUsClassification)
  {
    $this->tenCharUsClassification = $tenCharUsClassification;
  }
  /**
   * @return string[]
   */
  public function getTenCharUsClassification()
  {
    return $this->tenCharUsClassification;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanDocTagPatentSpecific::class, 'Google_Service_Contentwarehouse_OceanDocTagPatentSpecific');
