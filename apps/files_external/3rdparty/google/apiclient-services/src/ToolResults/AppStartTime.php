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

class AppStartTime extends \Google\Model
{
  protected $fullyDrawnTimeType = Duration::class;
  protected $fullyDrawnTimeDataType = '';
  protected $initialDisplayTimeType = Duration::class;
  protected $initialDisplayTimeDataType = '';

  /**
   * @param Duration
   */
  public function setFullyDrawnTime(Duration $fullyDrawnTime)
  {
    $this->fullyDrawnTime = $fullyDrawnTime;
  }
  /**
   * @return Duration
   */
  public function getFullyDrawnTime()
  {
    return $this->fullyDrawnTime;
  }
  /**
   * @param Duration
   */
  public function setInitialDisplayTime(Duration $initialDisplayTime)
  {
    $this->initialDisplayTime = $initialDisplayTime;
  }
  /**
   * @return Duration
   */
  public function getInitialDisplayTime()
  {
    return $this->initialDisplayTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppStartTime::class, 'Google_Service_ToolResults_AppStartTime');
