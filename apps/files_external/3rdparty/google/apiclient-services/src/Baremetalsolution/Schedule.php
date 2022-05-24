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

namespace Google\Service\Baremetalsolution;

class Schedule extends \Google\Model
{
  /**
   * @var string
   */
  public $crontabSpec;
  /**
   * @var string
   */
  public $prefix;
  /**
   * @var int
   */
  public $retentionCount;

  /**
   * @param string
   */
  public function setCrontabSpec($crontabSpec)
  {
    $this->crontabSpec = $crontabSpec;
  }
  /**
   * @return string
   */
  public function getCrontabSpec()
  {
    return $this->crontabSpec;
  }
  /**
   * @param string
   */
  public function setPrefix($prefix)
  {
    $this->prefix = $prefix;
  }
  /**
   * @return string
   */
  public function getPrefix()
  {
    return $this->prefix;
  }
  /**
   * @param int
   */
  public function setRetentionCount($retentionCount)
  {
    $this->retentionCount = $retentionCount;
  }
  /**
   * @return int
   */
  public function getRetentionCount()
  {
    return $this->retentionCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Schedule::class, 'Google_Service_Baremetalsolution_Schedule');
