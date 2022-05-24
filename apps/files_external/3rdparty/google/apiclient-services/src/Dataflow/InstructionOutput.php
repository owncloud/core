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

class InstructionOutput extends \Google\Model
{
  /**
   * @var array[]
   */
  public $codec;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $onlyCountKeyBytes;
  /**
   * @var bool
   */
  public $onlyCountValueBytes;
  /**
   * @var string
   */
  public $originalName;
  /**
   * @var string
   */
  public $systemName;

  /**
   * @param array[]
   */
  public function setCodec($codec)
  {
    $this->codec = $codec;
  }
  /**
   * @return array[]
   */
  public function getCodec()
  {
    return $this->codec;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setOnlyCountKeyBytes($onlyCountKeyBytes)
  {
    $this->onlyCountKeyBytes = $onlyCountKeyBytes;
  }
  /**
   * @return bool
   */
  public function getOnlyCountKeyBytes()
  {
    return $this->onlyCountKeyBytes;
  }
  /**
   * @param bool
   */
  public function setOnlyCountValueBytes($onlyCountValueBytes)
  {
    $this->onlyCountValueBytes = $onlyCountValueBytes;
  }
  /**
   * @return bool
   */
  public function getOnlyCountValueBytes()
  {
    return $this->onlyCountValueBytes;
  }
  /**
   * @param string
   */
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  /**
   * @return string
   */
  public function getOriginalName()
  {
    return $this->originalName;
  }
  /**
   * @param string
   */
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  /**
   * @return string
   */
  public function getSystemName()
  {
    return $this->systemName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstructionOutput::class, 'Google_Service_Dataflow_InstructionOutput');
