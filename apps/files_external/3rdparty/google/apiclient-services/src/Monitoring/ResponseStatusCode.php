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

namespace Google\Service\Monitoring;

class ResponseStatusCode extends \Google\Model
{
  /**
   * @var string
   */
  public $statusClass;
  /**
   * @var int
   */
  public $statusValue;

  /**
   * @param string
   */
  public function setStatusClass($statusClass)
  {
    $this->statusClass = $statusClass;
  }
  /**
   * @return string
   */
  public function getStatusClass()
  {
    return $this->statusClass;
  }
  /**
   * @param int
   */
  public function setStatusValue($statusValue)
  {
    $this->statusValue = $statusValue;
  }
  /**
   * @return int
   */
  public function getStatusValue()
  {
    return $this->statusValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponseStatusCode::class, 'Google_Service_Monitoring_ResponseStatusCode');
