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

class FreshnessOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $freshnessDuration;
  /**
   * @var string
   */
  public $freshnessProperty;

  /**
   * @param string
   */
  public function setFreshnessDuration($freshnessDuration)
  {
    $this->freshnessDuration = $freshnessDuration;
  }
  /**
   * @return string
   */
  public function getFreshnessDuration()
  {
    return $this->freshnessDuration;
  }
  /**
   * @param string
   */
  public function setFreshnessProperty($freshnessProperty)
  {
    $this->freshnessProperty = $freshnessProperty;
  }
  /**
   * @return string
   */
  public function getFreshnessProperty()
  {
    return $this->freshnessProperty;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FreshnessOptions::class, 'Google_Service_CloudSearch_FreshnessOptions');
