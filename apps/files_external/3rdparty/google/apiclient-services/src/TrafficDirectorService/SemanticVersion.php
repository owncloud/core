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

namespace Google\Service\TrafficDirectorService;

class SemanticVersion extends \Google\Model
{
  /**
   * @var string
   */
  public $majorNumber;
  /**
   * @var string
   */
  public $minorNumber;
  /**
   * @var string
   */
  public $patch;

  /**
   * @param string
   */
  public function setMajorNumber($majorNumber)
  {
    $this->majorNumber = $majorNumber;
  }
  /**
   * @return string
   */
  public function getMajorNumber()
  {
    return $this->majorNumber;
  }
  /**
   * @param string
   */
  public function setMinorNumber($minorNumber)
  {
    $this->minorNumber = $minorNumber;
  }
  /**
   * @return string
   */
  public function getMinorNumber()
  {
    return $this->minorNumber;
  }
  /**
   * @param string
   */
  public function setPatch($patch)
  {
    $this->patch = $patch;
  }
  /**
   * @return string
   */
  public function getPatch()
  {
    return $this->patch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SemanticVersion::class, 'Google_Service_TrafficDirectorService_SemanticVersion');
