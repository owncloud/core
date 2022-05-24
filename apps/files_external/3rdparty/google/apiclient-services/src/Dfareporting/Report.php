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

namespace Google\Service\Dfareporting;

class Report extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  protected $criteriaType = ReportCriteria::class;
  protected $criteriaDataType = '';
  protected $crossDimensionReachCriteriaType = ReportCrossDimensionReachCriteria::class;
  protected $crossDimensionReachCriteriaDataType = '';
  protected $deliveryType = ReportDelivery::class;
  protected $deliveryDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $fileName;
  protected $floodlightCriteriaType = ReportFloodlightCriteria::class;
  protected $floodlightCriteriaDataType = '';
  /**
   * @var string
   */
  public $format;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastModifiedTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $ownerProfileId;
  protected $pathAttributionCriteriaType = ReportPathAttributionCriteria::class;
  protected $pathAttributionCriteriaDataType = '';
  protected $pathCriteriaType = ReportPathCriteria::class;
  protected $pathCriteriaDataType = '';
  protected $pathToConversionCriteriaType = ReportPathToConversionCriteria::class;
  protected $pathToConversionCriteriaDataType = '';
  protected $reachCriteriaType = ReportReachCriteria::class;
  protected $reachCriteriaDataType = '';
  protected $scheduleType = ReportSchedule::class;
  protected $scheduleDataType = '';
  /**
   * @var string
   */
  public $subAccountId;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param ReportCriteria
   */
  public function setCriteria(ReportCriteria $criteria)
  {
    $this->criteria = $criteria;
  }
  /**
   * @return ReportCriteria
   */
  public function getCriteria()
  {
    return $this->criteria;
  }
  /**
   * @param ReportCrossDimensionReachCriteria
   */
  public function setCrossDimensionReachCriteria(ReportCrossDimensionReachCriteria $crossDimensionReachCriteria)
  {
    $this->crossDimensionReachCriteria = $crossDimensionReachCriteria;
  }
  /**
   * @return ReportCrossDimensionReachCriteria
   */
  public function getCrossDimensionReachCriteria()
  {
    return $this->crossDimensionReachCriteria;
  }
  /**
   * @param ReportDelivery
   */
  public function setDelivery(ReportDelivery $delivery)
  {
    $this->delivery = $delivery;
  }
  /**
   * @return ReportDelivery
   */
  public function getDelivery()
  {
    return $this->delivery;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }
  /**
   * @return string
   */
  public function getFileName()
  {
    return $this->fileName;
  }
  /**
   * @param ReportFloodlightCriteria
   */
  public function setFloodlightCriteria(ReportFloodlightCriteria $floodlightCriteria)
  {
    $this->floodlightCriteria = $floodlightCriteria;
  }
  /**
   * @return ReportFloodlightCriteria
   */
  public function getFloodlightCriteria()
  {
    return $this->floodlightCriteria;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  /**
   * @return string
   */
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
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
  public function setOwnerProfileId($ownerProfileId)
  {
    $this->ownerProfileId = $ownerProfileId;
  }
  /**
   * @return string
   */
  public function getOwnerProfileId()
  {
    return $this->ownerProfileId;
  }
  /**
   * @param ReportPathAttributionCriteria
   */
  public function setPathAttributionCriteria(ReportPathAttributionCriteria $pathAttributionCriteria)
  {
    $this->pathAttributionCriteria = $pathAttributionCriteria;
  }
  /**
   * @return ReportPathAttributionCriteria
   */
  public function getPathAttributionCriteria()
  {
    return $this->pathAttributionCriteria;
  }
  /**
   * @param ReportPathCriteria
   */
  public function setPathCriteria(ReportPathCriteria $pathCriteria)
  {
    $this->pathCriteria = $pathCriteria;
  }
  /**
   * @return ReportPathCriteria
   */
  public function getPathCriteria()
  {
    return $this->pathCriteria;
  }
  /**
   * @param ReportPathToConversionCriteria
   */
  public function setPathToConversionCriteria(ReportPathToConversionCriteria $pathToConversionCriteria)
  {
    $this->pathToConversionCriteria = $pathToConversionCriteria;
  }
  /**
   * @return ReportPathToConversionCriteria
   */
  public function getPathToConversionCriteria()
  {
    return $this->pathToConversionCriteria;
  }
  /**
   * @param ReportReachCriteria
   */
  public function setReachCriteria(ReportReachCriteria $reachCriteria)
  {
    $this->reachCriteria = $reachCriteria;
  }
  /**
   * @return ReportReachCriteria
   */
  public function getReachCriteria()
  {
    return $this->reachCriteria;
  }
  /**
   * @param ReportSchedule
   */
  public function setSchedule(ReportSchedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return ReportSchedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param string
   */
  public function setSubAccountId($subAccountId)
  {
    $this->subAccountId = $subAccountId;
  }
  /**
   * @return string
   */
  public function getSubAccountId()
  {
    return $this->subAccountId;
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
class_alias(Report::class, 'Google_Service_Dfareporting_Report');
