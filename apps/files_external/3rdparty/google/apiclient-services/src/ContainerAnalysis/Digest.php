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

namespace Google\Service\ContainerAnalysis;

class Digest extends \Google\Model
{
  /**
   * @var string
   */
  public $algo;
  /**
   * @var string
   */
  public $digestValue;

  /**
   * @param string
   */
  public function setAlgo($algo)
  {
    $this->algo = $algo;
  }
  /**
   * @return string
   */
  public function getAlgo()
  {
    return $this->algo;
  }
  /**
   * @param string
   */
  public function setDigestValue($digestValue)
  {
    $this->digestValue = $digestValue;
  }
  /**
   * @return string
   */
  public function getDigestValue()
  {
    return $this->digestValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Digest::class, 'Google_Service_ContainerAnalysis_Digest');
