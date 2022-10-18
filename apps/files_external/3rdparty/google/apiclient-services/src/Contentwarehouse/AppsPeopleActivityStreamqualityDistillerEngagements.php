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

class AppsPeopleActivityStreamqualityDistillerEngagements extends \Google\Model
{
  /**
   * @var string
   */
  public $reportCompromised;
  /**
   * @var string
   */
  public $reportHarassment;
  /**
   * @var string
   */
  public $reportHate;
  /**
   * @var string
   */
  public $reportPorn;
  /**
   * @var string
   */
  public $reportSpam;
  /**
   * @var string
   */
  public $serveCount;
  /**
   * @var string
   */
  public $timeSec;
  /**
   * @var string
   */
  public $ytThumbsDown;

  /**
   * @param string
   */
  public function setReportCompromised($reportCompromised)
  {
    $this->reportCompromised = $reportCompromised;
  }
  /**
   * @return string
   */
  public function getReportCompromised()
  {
    return $this->reportCompromised;
  }
  /**
   * @param string
   */
  public function setReportHarassment($reportHarassment)
  {
    $this->reportHarassment = $reportHarassment;
  }
  /**
   * @return string
   */
  public function getReportHarassment()
  {
    return $this->reportHarassment;
  }
  /**
   * @param string
   */
  public function setReportHate($reportHate)
  {
    $this->reportHate = $reportHate;
  }
  /**
   * @return string
   */
  public function getReportHate()
  {
    return $this->reportHate;
  }
  /**
   * @param string
   */
  public function setReportPorn($reportPorn)
  {
    $this->reportPorn = $reportPorn;
  }
  /**
   * @return string
   */
  public function getReportPorn()
  {
    return $this->reportPorn;
  }
  /**
   * @param string
   */
  public function setReportSpam($reportSpam)
  {
    $this->reportSpam = $reportSpam;
  }
  /**
   * @return string
   */
  public function getReportSpam()
  {
    return $this->reportSpam;
  }
  /**
   * @param string
   */
  public function setServeCount($serveCount)
  {
    $this->serveCount = $serveCount;
  }
  /**
   * @return string
   */
  public function getServeCount()
  {
    return $this->serveCount;
  }
  /**
   * @param string
   */
  public function setTimeSec($timeSec)
  {
    $this->timeSec = $timeSec;
  }
  /**
   * @return string
   */
  public function getTimeSec()
  {
    return $this->timeSec;
  }
  /**
   * @param string
   */
  public function setYtThumbsDown($ytThumbsDown)
  {
    $this->ytThumbsDown = $ytThumbsDown;
  }
  /**
   * @return string
   */
  public function getYtThumbsDown()
  {
    return $this->ytThumbsDown;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleActivityStreamqualityDistillerEngagements::class, 'Google_Service_Contentwarehouse_AppsPeopleActivityStreamqualityDistillerEngagements');
