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

class DfareportingFile extends \Google\Model
{
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $fileName;
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
  public $reportId;
  /**
   * @var string
   */
  public $status;
  protected $urlsType = DfareportingFileUrls::class;
  protected $urlsDataType = '';

  /**
   * @param DateRange
   */
  public function setDateRange(DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
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
  public function setReportId($reportId)
  {
    $this->reportId = $reportId;
  }
  /**
   * @return string
   */
  public function getReportId()
  {
    return $this->reportId;
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
   * @param DfareportingFileUrls
   */
  public function setUrls(DfareportingFileUrls $urls)
  {
    $this->urls = $urls;
  }
  /**
   * @return DfareportingFileUrls
   */
  public function getUrls()
  {
    return $this->urls;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DfareportingFile::class, 'Google_Service_Dfareporting_DfareportingFile');
