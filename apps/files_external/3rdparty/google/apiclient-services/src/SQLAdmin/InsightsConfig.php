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

namespace Google\Service\SQLAdmin;

class InsightsConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $queryInsightsEnabled;
  /**
   * @var int
   */
  public $queryPlansPerMinute;
  /**
   * @var int
   */
  public $queryStringLength;
  /**
   * @var bool
   */
  public $recordApplicationTags;
  /**
   * @var bool
   */
  public $recordClientAddress;

  /**
   * @param bool
   */
  public function setQueryInsightsEnabled($queryInsightsEnabled)
  {
    $this->queryInsightsEnabled = $queryInsightsEnabled;
  }
  /**
   * @return bool
   */
  public function getQueryInsightsEnabled()
  {
    return $this->queryInsightsEnabled;
  }
  /**
   * @param int
   */
  public function setQueryPlansPerMinute($queryPlansPerMinute)
  {
    $this->queryPlansPerMinute = $queryPlansPerMinute;
  }
  /**
   * @return int
   */
  public function getQueryPlansPerMinute()
  {
    return $this->queryPlansPerMinute;
  }
  /**
   * @param int
   */
  public function setQueryStringLength($queryStringLength)
  {
    $this->queryStringLength = $queryStringLength;
  }
  /**
   * @return int
   */
  public function getQueryStringLength()
  {
    return $this->queryStringLength;
  }
  /**
   * @param bool
   */
  public function setRecordApplicationTags($recordApplicationTags)
  {
    $this->recordApplicationTags = $recordApplicationTags;
  }
  /**
   * @return bool
   */
  public function getRecordApplicationTags()
  {
    return $this->recordApplicationTags;
  }
  /**
   * @param bool
   */
  public function setRecordClientAddress($recordClientAddress)
  {
    $this->recordClientAddress = $recordClientAddress;
  }
  /**
   * @return bool
   */
  public function getRecordClientAddress()
  {
    return $this->recordClientAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InsightsConfig::class, 'Google_Service_SQLAdmin_InsightsConfig');
