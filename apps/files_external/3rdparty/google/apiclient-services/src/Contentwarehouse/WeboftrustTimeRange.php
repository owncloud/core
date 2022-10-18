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

class WeboftrustTimeRange extends \Google\Model
{
  /**
   * @var string
   */
  public $endUnixTime;
  /**
   * @var string
   */
  public $startUnixTime;

  /**
   * @param string
   */
  public function setEndUnixTime($endUnixTime)
  {
    $this->endUnixTime = $endUnixTime;
  }
  /**
   * @return string
   */
  public function getEndUnixTime()
  {
    return $this->endUnixTime;
  }
  /**
   * @param string
   */
  public function setStartUnixTime($startUnixTime)
  {
    $this->startUnixTime = $startUnixTime;
  }
  /**
   * @return string
   */
  public function getStartUnixTime()
  {
    return $this->startUnixTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WeboftrustTimeRange::class, 'Google_Service_Contentwarehouse_WeboftrustTimeRange');
