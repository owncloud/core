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

namespace Google\Service\DoubleClickBidManager;

class ReportStatus extends \Google\Model
{
  protected $failureType = ReportFailure::class;
  protected $failureDataType = '';
  public $finishTimeMs;
  public $format;
  public $state;

  /**
   * @param ReportFailure
   */
  public function setFailure(ReportFailure $failure)
  {
    $this->failure = $failure;
  }
  /**
   * @return ReportFailure
   */
  public function getFailure()
  {
    return $this->failure;
  }
  public function setFinishTimeMs($finishTimeMs)
  {
    $this->finishTimeMs = $finishTimeMs;
  }
  public function getFinishTimeMs()
  {
    return $this->finishTimeMs;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportStatus::class, 'Google_Service_DoubleClickBidManager_ReportStatus');
