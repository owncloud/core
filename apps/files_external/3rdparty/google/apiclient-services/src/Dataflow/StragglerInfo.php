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

class StragglerInfo extends \Google\Model
{
  protected $causesType = StragglerDebuggingInfo::class;
  protected $causesDataType = 'map';
  /**
   * @var string
   */
  public $startTime;

  /**
   * @param StragglerDebuggingInfo[]
   */
  public function setCauses($causes)
  {
    $this->causes = $causes;
  }
  /**
   * @return StragglerDebuggingInfo[]
   */
  public function getCauses()
  {
    return $this->causes;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StragglerInfo::class, 'Google_Service_Dataflow_StragglerInfo');
