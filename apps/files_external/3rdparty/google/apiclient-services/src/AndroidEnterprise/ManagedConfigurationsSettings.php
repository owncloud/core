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

namespace Google\Service\AndroidEnterprise;

class ManagedConfigurationsSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $lastUpdatedTimestampMillis;
  /**
   * @var string
   */
  public $mcmId;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setLastUpdatedTimestampMillis($lastUpdatedTimestampMillis)
  {
    $this->lastUpdatedTimestampMillis = $lastUpdatedTimestampMillis;
  }
  /**
   * @return string
   */
  public function getLastUpdatedTimestampMillis()
  {
    return $this->lastUpdatedTimestampMillis;
  }
  /**
   * @param string
   */
  public function setMcmId($mcmId)
  {
    $this->mcmId = $mcmId;
  }
  /**
   * @return string
   */
  public function getMcmId()
  {
    return $this->mcmId;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedConfigurationsSettings::class, 'Google_Service_AndroidEnterprise_ManagedConfigurationsSettings');
