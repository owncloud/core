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

class CounterStructuredName extends \Google\Model
{
  /**
   * @var string
   */
  public $componentStepName;
  /**
   * @var string
   */
  public $executionStepName;
  /**
   * @var int
   */
  public $inputIndex;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $origin;
  /**
   * @var string
   */
  public $originNamespace;
  /**
   * @var string
   */
  public $originalRequestingStepName;
  /**
   * @var string
   */
  public $originalStepName;
  /**
   * @var string
   */
  public $portion;
  /**
   * @var string
   */
  public $workerId;

  /**
   * @param string
   */
  public function setComponentStepName($componentStepName)
  {
    $this->componentStepName = $componentStepName;
  }
  /**
   * @return string
   */
  public function getComponentStepName()
  {
    return $this->componentStepName;
  }
  /**
   * @param string
   */
  public function setExecutionStepName($executionStepName)
  {
    $this->executionStepName = $executionStepName;
  }
  /**
   * @return string
   */
  public function getExecutionStepName()
  {
    return $this->executionStepName;
  }
  /**
   * @param int
   */
  public function setInputIndex($inputIndex)
  {
    $this->inputIndex = $inputIndex;
  }
  /**
   * @return int
   */
  public function getInputIndex()
  {
    return $this->inputIndex;
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
   * @param string
   */
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return string
   */
  public function getOrigin()
  {
    return $this->origin;
  }
  /**
   * @param string
   */
  public function setOriginNamespace($originNamespace)
  {
    $this->originNamespace = $originNamespace;
  }
  /**
   * @return string
   */
  public function getOriginNamespace()
  {
    return $this->originNamespace;
  }
  /**
   * @param string
   */
  public function setOriginalRequestingStepName($originalRequestingStepName)
  {
    $this->originalRequestingStepName = $originalRequestingStepName;
  }
  /**
   * @return string
   */
  public function getOriginalRequestingStepName()
  {
    return $this->originalRequestingStepName;
  }
  /**
   * @param string
   */
  public function setOriginalStepName($originalStepName)
  {
    $this->originalStepName = $originalStepName;
  }
  /**
   * @return string
   */
  public function getOriginalStepName()
  {
    return $this->originalStepName;
  }
  /**
   * @param string
   */
  public function setPortion($portion)
  {
    $this->portion = $portion;
  }
  /**
   * @return string
   */
  public function getPortion()
  {
    return $this->portion;
  }
  /**
   * @param string
   */
  public function setWorkerId($workerId)
  {
    $this->workerId = $workerId;
  }
  /**
   * @return string
   */
  public function getWorkerId()
  {
    return $this->workerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CounterStructuredName::class, 'Google_Service_Dataflow_CounterStructuredName');
