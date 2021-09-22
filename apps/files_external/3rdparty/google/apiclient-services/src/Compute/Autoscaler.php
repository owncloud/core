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

namespace Google\Service\Compute;

class Autoscaler extends \Google\Collection
{
  protected $collection_key = 'statusDetails';
  protected $autoscalingPolicyType = AutoscalingPolicy::class;
  protected $autoscalingPolicyDataType = '';
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $name;
  public $recommendedSize;
  public $region;
  protected $scalingScheduleStatusType = ScalingScheduleStatus::class;
  protected $scalingScheduleStatusDataType = 'map';
  public $selfLink;
  public $status;
  protected $statusDetailsType = AutoscalerStatusDetails::class;
  protected $statusDetailsDataType = 'array';
  public $target;
  public $zone;

  /**
   * @param AutoscalingPolicy
   */
  public function setAutoscalingPolicy(AutoscalingPolicy $autoscalingPolicy)
  {
    $this->autoscalingPolicy = $autoscalingPolicy;
  }
  /**
   * @return AutoscalingPolicy
   */
  public function getAutoscalingPolicy()
  {
    return $this->autoscalingPolicy;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRecommendedSize($recommendedSize)
  {
    $this->recommendedSize = $recommendedSize;
  }
  public function getRecommendedSize()
  {
    return $this->recommendedSize;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param ScalingScheduleStatus[]
   */
  public function setScalingScheduleStatus($scalingScheduleStatus)
  {
    $this->scalingScheduleStatus = $scalingScheduleStatus;
  }
  /**
   * @return ScalingScheduleStatus[]
   */
  public function getScalingScheduleStatus()
  {
    return $this->scalingScheduleStatus;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param AutoscalerStatusDetails[]
   */
  public function setStatusDetails($statusDetails)
  {
    $this->statusDetails = $statusDetails;
  }
  /**
   * @return AutoscalerStatusDetails[]
   */
  public function getStatusDetails()
  {
    return $this->statusDetails;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Autoscaler::class, 'Google_Service_Compute_Autoscaler');
