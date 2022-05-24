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

namespace Google\Service\Dataproc;

class JobScheduling extends \Google\Model
{
  /**
   * @var int
   */
  public $maxFailuresPerHour;
  /**
   * @var int
   */
  public $maxFailuresTotal;

  /**
   * @param int
   */
  public function setMaxFailuresPerHour($maxFailuresPerHour)
  {
    $this->maxFailuresPerHour = $maxFailuresPerHour;
  }
  /**
   * @return int
   */
  public function getMaxFailuresPerHour()
  {
    return $this->maxFailuresPerHour;
  }
  /**
   * @param int
   */
  public function setMaxFailuresTotal($maxFailuresTotal)
  {
    $this->maxFailuresTotal = $maxFailuresTotal;
  }
  /**
   * @return int
   */
  public function getMaxFailuresTotal()
  {
    return $this->maxFailuresTotal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobScheduling::class, 'Google_Service_Dataproc_JobScheduling');
