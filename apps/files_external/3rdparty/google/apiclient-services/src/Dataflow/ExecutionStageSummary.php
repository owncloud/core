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

class ExecutionStageSummary extends \Google\Collection
{
  protected $collection_key = 'prerequisiteStage';
  protected $componentSourceType = ComponentSource::class;
  protected $componentSourceDataType = 'array';
  protected $componentTransformType = ComponentTransform::class;
  protected $componentTransformDataType = 'array';
  /**
   * @var string
   */
  public $id;
  protected $inputSourceType = StageSource::class;
  protected $inputSourceDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $outputSourceType = StageSource::class;
  protected $outputSourceDataType = 'array';
  /**
   * @var string[]
   */
  public $prerequisiteStage;

  /**
   * @param ComponentSource[]
   */
  public function setComponentSource($componentSource)
  {
    $this->componentSource = $componentSource;
  }
  /**
   * @return ComponentSource[]
   */
  public function getComponentSource()
  {
    return $this->componentSource;
  }
  /**
   * @param ComponentTransform[]
   */
  public function setComponentTransform($componentTransform)
  {
    $this->componentTransform = $componentTransform;
  }
  /**
   * @return ComponentTransform[]
   */
  public function getComponentTransform()
  {
    return $this->componentTransform;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param StageSource[]
   */
  public function setInputSource($inputSource)
  {
    $this->inputSource = $inputSource;
  }
  /**
   * @return StageSource[]
   */
  public function getInputSource()
  {
    return $this->inputSource;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
   * @param StageSource[]
   */
  public function setOutputSource($outputSource)
  {
    $this->outputSource = $outputSource;
  }
  /**
   * @return StageSource[]
   */
  public function getOutputSource()
  {
    return $this->outputSource;
  }
  /**
   * @param string[]
   */
  public function setPrerequisiteStage($prerequisiteStage)
  {
    $this->prerequisiteStage = $prerequisiteStage;
  }
  /**
   * @return string[]
   */
  public function getPrerequisiteStage()
  {
    return $this->prerequisiteStage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecutionStageSummary::class, 'Google_Service_Dataflow_ExecutionStageSummary');
