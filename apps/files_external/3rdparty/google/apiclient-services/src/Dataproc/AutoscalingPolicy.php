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

namespace Google\Service\Dataproc;

class AutoscalingPolicy extends \Google\Model
{
  protected $basicAlgorithmType = BasicAutoscalingAlgorithm::class;
  protected $basicAlgorithmDataType = '';
  public $id;
  public $name;
  protected $secondaryWorkerConfigType = InstanceGroupAutoscalingPolicyConfig::class;
  protected $secondaryWorkerConfigDataType = '';
  protected $workerConfigType = InstanceGroupAutoscalingPolicyConfig::class;
  protected $workerConfigDataType = '';

  /**
   * @param BasicAutoscalingAlgorithm
   */
  public function setBasicAlgorithm(BasicAutoscalingAlgorithm $basicAlgorithm)
  {
    $this->basicAlgorithm = $basicAlgorithm;
  }
  /**
   * @return BasicAutoscalingAlgorithm
   */
  public function getBasicAlgorithm()
  {
    return $this->basicAlgorithm;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param InstanceGroupAutoscalingPolicyConfig
   */
  public function setSecondaryWorkerConfig(InstanceGroupAutoscalingPolicyConfig $secondaryWorkerConfig)
  {
    $this->secondaryWorkerConfig = $secondaryWorkerConfig;
  }
  /**
   * @return InstanceGroupAutoscalingPolicyConfig
   */
  public function getSecondaryWorkerConfig()
  {
    return $this->secondaryWorkerConfig;
  }
  /**
   * @param InstanceGroupAutoscalingPolicyConfig
   */
  public function setWorkerConfig(InstanceGroupAutoscalingPolicyConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return InstanceGroupAutoscalingPolicyConfig
   */
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingPolicy::class, 'Google_Service_Dataproc_AutoscalingPolicy');
