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

class AppsPeopleOzExternalMergedpeopleapiOrganization extends \Google\Collection
{
  protected $collection_key = 'project';
  protected $assignmentType = AppsPeopleOzExternalMergedpeopleapiOrganizationAssignment::class;
  protected $assignmentDataType = 'array';
  /**
   * @var string
   */
  public $certification;
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
  public $description;
  /**
   * @var string
   */
  public $domain;
  protected $endCalendarDayType = GoogleTypeDate::class;
  protected $endCalendarDayDataType = '';
  /**
   * @var string
   */
  public $endMs;
  /**
   * @var string
   */
  public $endMsAsNumber;
  /**
   * @var string
   */
  public $formattedStringType;
  /**
   * @var int
   */
  public $fteMilliPercent;
  /**
   * @var float
   */
  public $importance;
  /**
   * @var string
   */
  public $location;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $projectType = AppsPeopleOzExternalMergedpeopleapiOrganizationProject::class;
  protected $projectDataType = 'array';
  protected $startCalendarDayType = GoogleTypeDate::class;
  protected $startCalendarDayDataType = '';
  /**
   * @var string
   */
  public $startMs;
  /**
   * @var string
   */
  public $startMsAsNumber;
  /**
   * @var string
   */
  public $stringType;
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
   * @var string
   */
  public $yomiName;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiOrganizationAssignment[]
   */
  public function setAssignment($assignment)
  {
    $this->assignment = $assignment;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiOrganizationAssignment[]
   */
  public function getAssignment()
  {
    return $this->assignment;
  }
  /**
   * @param string
   */
  public function setCertification($certification)
  {
    $this->certification = $certification;
  }
  /**
   * @return string
   */
  public function getCertification()
  {
    return $this->certification;
  }
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param GoogleTypeDate
   */
  public function setEndCalendarDay(GoogleTypeDate $endCalendarDay)
  {
    $this->endCalendarDay = $endCalendarDay;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getEndCalendarDay()
  {
    return $this->endCalendarDay;
  }
  /**
   * @param string
   */
  public function setEndMs($endMs)
  {
    $this->endMs = $endMs;
  }
  /**
   * @return string
   */
  public function getEndMs()
  {
    return $this->endMs;
  }
  /**
   * @param string
   */
  public function setEndMsAsNumber($endMsAsNumber)
  {
    $this->endMsAsNumber = $endMsAsNumber;
  }
  /**
   * @return string
   */
  public function getEndMsAsNumber()
  {
    return $this->endMsAsNumber;
  }
  /**
   * @param string
   */
  public function setFormattedStringType($formattedStringType)
  {
    $this->formattedStringType = $formattedStringType;
  }
  /**
   * @return string
   */
  public function getFormattedStringType()
  {
    return $this->formattedStringType;
  }
  /**
   * @param int
   */
  public function setFteMilliPercent($fteMilliPercent)
  {
    $this->fteMilliPercent = $fteMilliPercent;
  }
  /**
   * @return int
   */
  public function getFteMilliPercent()
  {
    return $this->fteMilliPercent;
  }
  /**
   * @param float
   */
  public function setImportance($importance)
  {
    $this->importance = $importance;
  }
  /**
   * @return float
   */
  public function getImportance()
  {
    return $this->importance;
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
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
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
   * @param AppsPeopleOzExternalMergedpeopleapiOrganizationProject[]
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiOrganizationProject[]
   */
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setStartCalendarDay(GoogleTypeDate $startCalendarDay)
  {
    $this->startCalendarDay = $startCalendarDay;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getStartCalendarDay()
  {
    return $this->startCalendarDay;
  }
  /**
   * @param string
   */
  public function setStartMs($startMs)
  {
    $this->startMs = $startMs;
  }
  /**
   * @return string
   */
  public function getStartMs()
  {
    return $this->startMs;
  }
  /**
   * @param string
   */
  public function setStartMsAsNumber($startMsAsNumber)
  {
    $this->startMsAsNumber = $startMsAsNumber;
  }
  /**
   * @return string
   */
  public function getStartMsAsNumber()
  {
    return $this->startMsAsNumber;
  }
  /**
   * @param string
   */
  public function setStringType($stringType)
  {
    $this->stringType = $stringType;
  }
  /**
   * @return string
   */
  public function getStringType()
  {
    return $this->stringType;
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
  /**
   * @param string
   */
  public function setYomiName($yomiName)
  {
    $this->yomiName = $yomiName;
  }
  /**
   * @return string
   */
  public function getYomiName()
  {
    return $this->yomiName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiOrganization::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiOrganization');
