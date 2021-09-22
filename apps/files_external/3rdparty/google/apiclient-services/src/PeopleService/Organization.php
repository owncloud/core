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

namespace Google\Service\PeopleService;

class Organization extends \Google\Model
{
  public $costCenter;
  public $current;
  public $department;
  public $domain;
  protected $endDateType = Date::class;
  protected $endDateDataType = '';
  public $formattedType;
  public $fullTimeEquivalentMillipercent;
  public $jobDescription;
  public $location;
  protected $metadataType = FieldMetadata::class;
  protected $metadataDataType = '';
  public $name;
  public $phoneticName;
  protected $startDateType = Date::class;
  protected $startDateDataType = '';
  public $symbol;
  public $title;
  public $type;

  public function setCostCenter($costCenter)
  {
    $this->costCenter = $costCenter;
  }
  public function getCostCenter()
  {
    return $this->costCenter;
  }
  public function setCurrent($current)
  {
    $this->current = $current;
  }
  public function getCurrent()
  {
    return $this->current;
  }
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  public function getDepartment()
  {
    return $this->department;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param Date
   */
  public function setEndDate(Date $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return Date
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setFullTimeEquivalentMillipercent($fullTimeEquivalentMillipercent)
  {
    $this->fullTimeEquivalentMillipercent = $fullTimeEquivalentMillipercent;
  }
  public function getFullTimeEquivalentMillipercent()
  {
    return $this->fullTimeEquivalentMillipercent;
  }
  public function setJobDescription($jobDescription)
  {
    $this->jobDescription = $jobDescription;
  }
  public function getJobDescription()
  {
    return $this->jobDescription;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param FieldMetadata
   */
  public function setMetadata(FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return FieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPhoneticName($phoneticName)
  {
    $this->phoneticName = $phoneticName;
  }
  public function getPhoneticName()
  {
    return $this->phoneticName;
  }
  /**
   * @param Date
   */
  public function setStartDate(Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setSymbol($symbol)
  {
    $this->symbol = $symbol;
  }
  public function getSymbol()
  {
    return $this->symbol;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Organization::class, 'Google_Service_PeopleService_Organization');
