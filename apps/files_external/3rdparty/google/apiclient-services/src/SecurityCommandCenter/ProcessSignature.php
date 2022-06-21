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

namespace Google\Service\SecurityCommandCenter;

class ProcessSignature extends \Google\Model
{
  protected $memoryHashSignatureType = MemoryHashSignature::class;
  protected $memoryHashSignatureDataType = '';
  protected $yaraRuleSignatureType = YaraRuleSignature::class;
  protected $yaraRuleSignatureDataType = '';

  /**
   * @param MemoryHashSignature
   */
  public function setMemoryHashSignature(MemoryHashSignature $memoryHashSignature)
  {
    $this->memoryHashSignature = $memoryHashSignature;
  }
  /**
   * @return MemoryHashSignature
   */
  public function getMemoryHashSignature()
  {
    return $this->memoryHashSignature;
  }
  /**
   * @param YaraRuleSignature
   */
  public function setYaraRuleSignature(YaraRuleSignature $yaraRuleSignature)
  {
    $this->yaraRuleSignature = $yaraRuleSignature;
  }
  /**
   * @return YaraRuleSignature
   */
  public function getYaraRuleSignature()
  {
    return $this->yaraRuleSignature;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProcessSignature::class, 'Google_Service_SecurityCommandCenter_ProcessSignature');
