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

class CisBenchmark extends \Google\Model
{
  /**
   * @var int
   */
  public $profileLevel;
  /**
   * @var string
   */
  public $severity;

  /**
   * @param int
   */
  public function setProfileLevel($profileLevel)
  {
    $this->profileLevel = $profileLevel;
  }
  /**
   * @return int
   */
  public function getProfileLevel()
  {
    return $this->profileLevel;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CisBenchmark::class, 'Google_Service_ContainerAnalysis_CisBenchmark');
