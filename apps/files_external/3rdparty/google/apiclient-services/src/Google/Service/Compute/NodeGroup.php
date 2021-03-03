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

class Google_Service_Compute_NodeGroup extends Google_Model
{
  protected $autoscalingPolicyType = 'Google_Service_Compute_NodeGroupAutoscalingPolicy';
  protected $autoscalingPolicyDataType = '';
  public $creationTimestamp;
  public $description;
  public $fingerprint;
  public $id;
  public $kind;
  public $locationHint;
  public $maintenancePolicy;
  protected $maintenanceWindowType = 'Google_Service_Compute_NodeGroupMaintenanceWindow';
  protected $maintenanceWindowDataType = '';
  public $name;
  public $nodeTemplate;
  public $selfLink;
  public $size;
  public $status;
  public $zone;

  /**
   * @param Google_Service_Compute_NodeGroupAutoscalingPolicy
   */
  public function setAutoscalingPolicy(Google_Service_Compute_NodeGroupAutoscalingPolicy $autoscalingPolicy)
  {
    $this->autoscalingPolicy = $autoscalingPolicy;
  }
  /**
   * @return Google_Service_Compute_NodeGroupAutoscalingPolicy
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
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
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
  public function setLocationHint($locationHint)
  {
    $this->locationHint = $locationHint;
  }
  public function getLocationHint()
  {
    return $this->locationHint;
  }
  public function setMaintenancePolicy($maintenancePolicy)
  {
    $this->maintenancePolicy = $maintenancePolicy;
  }
  public function getMaintenancePolicy()
  {
    return $this->maintenancePolicy;
  }
  /**
   * @param Google_Service_Compute_NodeGroupMaintenanceWindow
   */
  public function setMaintenanceWindow(Google_Service_Compute_NodeGroupMaintenanceWindow $maintenanceWindow)
  {
    $this->maintenanceWindow = $maintenanceWindow;
  }
  /**
   * @return Google_Service_Compute_NodeGroupMaintenanceWindow
   */
  public function getMaintenanceWindow()
  {
    return $this->maintenanceWindow;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNodeTemplate($nodeTemplate)
  {
    $this->nodeTemplate = $nodeTemplate;
  }
  public function getNodeTemplate()
  {
    return $this->nodeTemplate;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
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
