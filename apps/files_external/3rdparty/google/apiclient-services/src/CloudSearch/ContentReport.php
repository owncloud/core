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

namespace Google\Service\CloudSearch;

class ContentReport extends \Google\Model
{
  /**
   * @var string
   */
  public $reportCreateTimestamp;
  protected $reportJustificationType = ContentReportJustification::class;
  protected $reportJustificationDataType = '';
  protected $reportTypeType = AppsDynamiteSharedContentReportType::class;
  protected $reportTypeDataType = '';
  protected $reporterUserIdType = UserId::class;
  protected $reporterUserIdDataType = '';
  /**
   * @var string
   */
  public $revisionCreateTimestamp;

  /**
   * @param string
   */
  public function setReportCreateTimestamp($reportCreateTimestamp)
  {
    $this->reportCreateTimestamp = $reportCreateTimestamp;
  }
  /**
   * @return string
   */
  public function getReportCreateTimestamp()
  {
    return $this->reportCreateTimestamp;
  }
  /**
   * @param ContentReportJustification
   */
  public function setReportJustification(ContentReportJustification $reportJustification)
  {
    $this->reportJustification = $reportJustification;
  }
  /**
   * @return ContentReportJustification
   */
  public function getReportJustification()
  {
    return $this->reportJustification;
  }
  /**
   * @param AppsDynamiteSharedContentReportType
   */
  public function setReportType(AppsDynamiteSharedContentReportType $reportType)
  {
    $this->reportType = $reportType;
  }
  /**
   * @return AppsDynamiteSharedContentReportType
   */
  public function getReportType()
  {
    return $this->reportType;
  }
  /**
   * @param UserId
   */
  public function setReporterUserId(UserId $reporterUserId)
  {
    $this->reporterUserId = $reporterUserId;
  }
  /**
   * @return UserId
   */
  public function getReporterUserId()
  {
    return $this->reporterUserId;
  }
  /**
   * @param string
   */
  public function setRevisionCreateTimestamp($revisionCreateTimestamp)
  {
    $this->revisionCreateTimestamp = $revisionCreateTimestamp;
  }
  /**
   * @return string
   */
  public function getRevisionCreateTimestamp()
  {
    return $this->revisionCreateTimestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentReport::class, 'Google_Service_CloudSearch_ContentReport');
