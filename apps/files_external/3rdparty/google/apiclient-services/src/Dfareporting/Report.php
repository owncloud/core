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
  public $accountId;
  protected $criteriaType = ReportCriteria::class;
  protected $criteriaDataType = '';
  protected $crossDimensionReachCriteriaType = ReportCrossDimensionReachCriteria::class;
  protected $crossDimensionReachCriteriaDataType = '';
  protected $deliveryType = ReportDelivery::class;
  protected $deliveryDataType = '';
  public $etag;
  public $fileName;
  protected $floodlightCriteriaType = ReportFloodlightCriteria::class;
  protected $floodlightCriteriaDataType = '';
  public $format;
  public $id;
  public $kind;
  public $lastModifiedTime;
  public $name;
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
  public $subAccountId;
  public $type;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
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
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }
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
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwnerProfileId($ownerProfileId)
  {
    $this->ownerProfileId = $ownerProfileId;
  }
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
  public function setSubAccountId($subAccountId)
  {
    $this->subAccountId = $subAccountId;
  }
  public function getSubAccountId()
  {
    return $this->subAccountId;
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
class_alias(Report::class, 'Google_Service_Dfareporting_Report');
