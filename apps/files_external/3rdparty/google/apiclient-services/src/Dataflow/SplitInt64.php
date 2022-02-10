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

namespace Google\Service\Dataflow;

class SplitInt64 extends \Google\Model
{
  /**
   * @var int
   */
  public $highBits;
  /**
   * @var string
   */
  public $lowBits;

  /**
   * @param int
   */
  public function setHighBits($highBits)
  {
    $this->highBits = $highBits;
  }
  /**
   * @return int
   */
  public function getHighBits()
  {
    return $this->highBits;
  }
  /**
   * @param string
   */
  public function setLowBits($lowBits)
  {
    $this->lowBits = $lowBits;
  }
  /**
   * @return string
   */
  public function getLowBits()
  {
    return $this->lowBits;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SplitInt64::class, 'Google_Service_Dataflow_SplitInt64');
