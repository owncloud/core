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

namespace Google\Service\ToolResults;

class MemoryInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $memoryCapInKibibyte;
  /**
   * @var string
   */
  public $memoryTotalInKibibyte;

  /**
   * @param string
   */
  public function setMemoryCapInKibibyte($memoryCapInKibibyte)
  {
    $this->memoryCapInKibibyte = $memoryCapInKibibyte;
  }
  /**
   * @return string
   */
  public function getMemoryCapInKibibyte()
  {
    return $this->memoryCapInKibibyte;
  }
  /**
   * @param string
   */
  public function setMemoryTotalInKibibyte($memoryTotalInKibibyte)
  {
    $this->memoryTotalInKibibyte = $memoryTotalInKibibyte;
  }
  /**
   * @return string
   */
  public function getMemoryTotalInKibibyte()
  {
    return $this->memoryTotalInKibibyte;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MemoryInfo::class, 'Google_Service_ToolResults_MemoryInfo');
