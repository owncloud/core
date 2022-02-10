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

namespace Google\Service\Analytics;

class UnsampledReport extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "endDate" => "end-date",
        "startDate" => "start-date",
  ];
  /**
   * @var string
   */
  public $accountId;
  protected $cloudStorageDownloadDetailsType = UnsampledReportCloudStorageDownloadDetails::class;
  protected $cloudStorageDownloadDetailsDataType = '';
  /**
   * @var string
   */
  public $created;
  /**
   * @var string
   */
  public $dimensions;
  /**
   * @var string
   */
  public $downloadType;
  protected $driveDownloadDetailsType = UnsampledReportDriveDownloadDetails::class;
  protected $driveDownloadDetailsDataType = '';
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var string
   */
  public $filters;
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
  public $metrics;
  /**
   * @var string
   */
  public $profileId;
  /**
   * @var string
   */
  public $segment;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $startDate;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $webPropertyId;

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
   * @param UnsampledReportCloudStorageDownloadDetails
   */
  public function setCloudStorageDownloadDetails(UnsampledReportCloudStorageDownloadDetails $cloudStorageDownloadDetails)
  {
    $this->cloudStorageDownloadDetails = $cloudStorageDownloadDetails;
  }
  /**
   * @return UnsampledReportCloudStorageDownloadDetails
   */
  public function getCloudStorageDownloadDetails()
  {
    return $this->cloudStorageDownloadDetails;
  }
  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param string
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return string
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setDownloadType($downloadType)
  {
    $this->downloadType = $downloadType;
  }
  /**
   * @return string
   */
  public function getDownloadType()
  {
    return $this->downloadType;
  }
  /**
   * @param UnsampledReportDriveDownloadDetails
   */
  public function setDriveDownloadDetails(UnsampledReportDriveDownloadDetails $driveDownloadDetails)
  {
    $this->driveDownloadDetails = $driveDownloadDetails;
  }
  /**
   * @return UnsampledReportDriveDownloadDetails
   */
  public function getDriveDownloadDetails()
  {
    return $this->driveDownloadDetails;
  }
  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string
   */
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return string
   */
  public function getFilters()
  {
    return $this->filters;
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
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return string
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string
   */
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  /**
   * @return string
   */
  public function getProfileId()
  {
    return $this->profileId;
  }
  /**
   * @param string
   */
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return string
   */
  public function getSegment()
  {
    return $this->segment;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
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
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param string
   */
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  /**
   * @return string
   */
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UnsampledReport::class, 'Google_Service_Analytics_UnsampledReport');
