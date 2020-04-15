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

class Google_Service_Dataproc_AutoscalingPolicy extends Google_Model
{
  protected $basicAlgorithmType = 'Google_Service_Dataproc_BasicAutoscalingAlgorithm';
  protected $basicAlgorithmDataType = '';
  public $id;
  public $name;
  protected $secondaryWorkerConfigType = 'Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig';
  protected $secondaryWorkerConfigDataType = '';
  protected $workerConfigType = 'Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig';
  protected $workerConfigDataType = '';

  /**
   * @param Google_Service_Dataproc_BasicAutoscalingAlgorithm
   */
  public function setBasicAlgorithm(Google_Service_Dataproc_BasicAutoscalingAlgorithm $basicAlgorithm)
  {
    $this->basicAlgorithm = $basicAlgorithm;
  }
  /**
   * @return Google_Service_Dataproc_BasicAutoscalingAlgorithm
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
   * @param Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig
   */
  public function setSecondaryWorkerConfig(Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig $secondaryWorkerConfig)
  {
    $this->secondaryWorkerConfig = $secondaryWorkerConfig;
  }
  /**
   * @return Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig
   */
  public function getSecondaryWorkerConfig()
  {
    return $this->secondaryWorkerConfig;
  }
  /**
   * @param Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig
   */
  public function setWorkerConfig(Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return Google_Service_Dataproc_InstanceGroupAutoscalingPolicyConfig
   */
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
}
