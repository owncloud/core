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

class LegalCitationLaw extends \Google\Collection
{
  protected $collection_key = 'level';
  protected $internal_gapi_mappings = [
        "revisionDate" => "RevisionDate",
        "status" => "Status",
        "type" => "Type",
  ];
  protected $revisionDateType = LegalDate::class;
  protected $revisionDateDataType = '';
  /**
   * @var int
   */
  public $status;
  /**
   * @var int
   */
  public $type;
  protected $collectionnameType = LegalCitationLawCollectionName::class;
  protected $collectionnameDataType = '';
  protected $levelType = LegalCitationLawLevel::class;
  protected $levelDataType = 'array';

  /**
   * @param LegalDate
   */
  public function setRevisionDate(LegalDate $revisionDate)
  {
    $this->revisionDate = $revisionDate;
  }
  /**
   * @return LegalDate
   */
  public function getRevisionDate()
  {
    return $this->revisionDate;
  }
  /**
   * @param int
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return int
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param LegalCitationLawCollectionName
   */
  public function setCollectionname(LegalCitationLawCollectionName $collectionname)
  {
    $this->collectionname = $collectionname;
  }
  /**
   * @return LegalCitationLawCollectionName
   */
  public function getCollectionname()
  {
    return $this->collectionname;
  }
  /**
   * @param LegalCitationLawLevel[]
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return LegalCitationLawLevel[]
   */
  public function getLevel()
  {
    return $this->level;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitationLaw::class, 'Google_Service_Contentwarehouse_LegalCitationLaw');
