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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoConditionResult extends \Google\Model
{
  /**
   * @var string
   */
  public $currentTaskNumber;
  /**
   * @var string
   */
  public $nextTaskNumber;
  /**
   * @var bool
   */
  public $result;

  /**
   * @param string
   */
  public function setCurrentTaskNumber($currentTaskNumber)
  {
    $this->currentTaskNumber = $currentTaskNumber;
  }
  /**
   * @return string
   */
  public function getCurrentTaskNumber()
  {
    return $this->currentTaskNumber;
  }
  /**
   * @param string
   */
  public function setNextTaskNumber($nextTaskNumber)
  {
    $this->nextTaskNumber = $nextTaskNumber;
  }
  /**
   * @return string
   */
  public function getNextTaskNumber()
  {
    return $this->nextTaskNumber;
  }
  /**
   * @param bool
   */
  public function setResult($result)
  {
    $this->result = $result;
  }
  /**
   * @return bool
   */
  public function getResult()
  {
    return $this->result;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoConditionResult::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoConditionResult');
