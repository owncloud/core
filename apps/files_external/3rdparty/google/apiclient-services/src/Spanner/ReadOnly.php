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

namespace Google\Service\Spanner;

class ReadOnly extends \Google\Model
{
  /**
   * @var string
   */
  public $exactStaleness;
  /**
   * @var string
   */
  public $maxStaleness;
  /**
   * @var string
   */
  public $minReadTimestamp;
  /**
   * @var string
   */
  public $readTimestamp;
  /**
   * @var bool
   */
  public $returnReadTimestamp;
  /**
   * @var bool
   */
  public $strong;

  /**
   * @param string
   */
  public function setExactStaleness($exactStaleness)
  {
    $this->exactStaleness = $exactStaleness;
  }
  /**
   * @return string
   */
  public function getExactStaleness()
  {
    return $this->exactStaleness;
  }
  /**
   * @param string
   */
  public function setMaxStaleness($maxStaleness)
  {
    $this->maxStaleness = $maxStaleness;
  }
  /**
   * @return string
   */
  public function getMaxStaleness()
  {
    return $this->maxStaleness;
  }
  /**
   * @param string
   */
  public function setMinReadTimestamp($minReadTimestamp)
  {
    $this->minReadTimestamp = $minReadTimestamp;
  }
  /**
   * @return string
   */
  public function getMinReadTimestamp()
  {
    return $this->minReadTimestamp;
  }
  /**
   * @param string
   */
  public function setReadTimestamp($readTimestamp)
  {
    $this->readTimestamp = $readTimestamp;
  }
  /**
   * @return string
   */
  public function getReadTimestamp()
  {
    return $this->readTimestamp;
  }
  /**
   * @param bool
   */
  public function setReturnReadTimestamp($returnReadTimestamp)
  {
    $this->returnReadTimestamp = $returnReadTimestamp;
  }
  /**
   * @return bool
   */
  public function getReturnReadTimestamp()
  {
    return $this->returnReadTimestamp;
  }
  /**
   * @param bool
   */
  public function setStrong($strong)
  {
    $this->strong = $strong;
  }
  /**
   * @return bool
   */
  public function getStrong()
  {
    return $this->strong;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReadOnly::class, 'Google_Service_Spanner_ReadOnly');
