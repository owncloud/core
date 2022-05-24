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
  /**
   * @var string
   */
  public $costCenter;
  /**
   * @var bool
   */
  public $current;
  /**
   * @var string
   */
  public $department;
  /**
   * @var string
   */
  public $domain;
  protected $endDateType = Date::class;
  protected $endDateDataType = '';
  /**
   * @var string
   */
  public $formattedType;
  /**
   * @var int
   */
  public $fullTimeEquivalentMillipercent;
  /**
   * @var string
   */
  public $jobDescription;
  /**
   * @var string
   */
  public $location;
  protected $metadataType = FieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $phoneticName;
  protected $startDateType = Date::class;
  protected $startDateDataType = '';
  /**
   * @var string
   */
  public $symbol;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setCostCenter($costCenter)
  {
    $this->costCenter = $costCenter;
  }
  /**
   * @return string
   */
  public function getCostCenter()
  {
    return $this->costCenter;
  }
  /**
   * @param bool
   */
  public function setCurrent($current)
  {
    $this->current = $current;
  }
  /**
   * @return bool
   */
  public function getCurrent()
  {
    return $this->current;
  }
  /**
   * @param string
   */
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  /**
   * @return string
   */
  public function getDepartment()
  {
    return $this->department;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  /**
   * @return string
   */
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  /**
   * @param int
   */
  public function setFullTimeEquivalentMillipercent($fullTimeEquivalentMillipercent)
  {
    $this->fullTimeEquivalentMillipercent = $fullTimeEquivalentMillipercent;
  }
  /**
   * @return int
   */
  public function getFullTimeEquivalentMillipercent()
  {
    return $this->fullTimeEquivalentMillipercent;
  }
  /**
   * @param string
   */
  public function setJobDescription($jobDescription)
  {
    $this->jobDescription = $jobDescription;
  }
  /**
   * @return string
   */
  public function getJobDescription()
  {
    return $this->jobDescription;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPhoneticName($phoneticName)
  {
    $this->phoneticName = $phoneticName;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSymbol($symbol)
  {
    $this->symbol = $symbol;
  }
  /**
   * @return string
   */
  public function getSymbol()
  {
    return $this->symbol;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Organization::class, 'Google_Service_PeopleService_Organization');
