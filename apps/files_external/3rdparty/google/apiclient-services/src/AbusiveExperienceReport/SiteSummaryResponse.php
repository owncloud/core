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

namespace Google\Service\AbusiveExperienceReport;

class SiteSummaryResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $abusiveStatus;
  /**
   * @var string
   */
  public $enforcementTime;
  /**
   * @var string
   */
  public $filterStatus;
  /**
   * @var string
   */
  public $lastChangeTime;
  /**
   * @var string
   */
  public $reportUrl;
  /**
   * @var string
   */
  public $reviewedSite;
  /**
   * @var bool
   */
  public $underReview;

  /**
   * @param string
   */
  public function setAbusiveStatus($abusiveStatus)
  {
    $this->abusiveStatus = $abusiveStatus;
  }
  /**
   * @return string
   */
  public function getAbusiveStatus()
  {
    return $this->abusiveStatus;
  }
  /**
   * @param string
   */
  public function setEnforcementTime($enforcementTime)
  {
    $this->enforcementTime = $enforcementTime;
  }
  /**
   * @return string
   */
  public function getEnforcementTime()
  {
    return $this->enforcementTime;
  }
  /**
   * @param string
   */
  public function setFilterStatus($filterStatus)
  {
    $this->filterStatus = $filterStatus;
  }
  /**
   * @return string
   */
  public function getFilterStatus()
  {
    return $this->filterStatus;
  }
  /**
   * @param string
   */
  public function setLastChangeTime($lastChangeTime)
  {
    $this->lastChangeTime = $lastChangeTime;
  }
  /**
   * @return string
   */
  public function getLastChangeTime()
  {
    return $this->lastChangeTime;
  }
  /**
   * @param string
   */
  public function setReportUrl($reportUrl)
  {
    $this->reportUrl = $reportUrl;
  }
  /**
   * @return string
   */
  public function getReportUrl()
  {
    return $this->reportUrl;
  }
  /**
   * @param string
   */
  public function setReviewedSite($reviewedSite)
  {
    $this->reviewedSite = $reviewedSite;
  }
  /**
   * @return string
   */
  public function getReviewedSite()
  {
    return $this->reviewedSite;
  }
  /**
   * @param bool
   */
  public function setUnderReview($underReview)
  {
    $this->underReview = $underReview;
  }
  /**
   * @return bool
   */
  public function getUnderReview()
  {
    return $this->underReview;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SiteSummaryResponse::class, 'Google_Service_AbusiveExperienceReport_SiteSummaryResponse');
