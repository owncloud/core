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

class NodeGroup extends \Google\Model
{
  protected $autoscalingPolicyType = NodeGroupAutoscalingPolicy::class;
  protected $autoscalingPolicyDataType = '';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $locationHint;
  /**
   * @var string
   */
  public $maintenancePolicy;
  protected $maintenanceWindowType = NodeGroupMaintenanceWindow::class;
  protected $maintenanceWindowDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nodeTemplate;
  /**
   * @var string
   */
  public $selfLink;
  protected $shareSettingsType = ShareSettings::class;
  protected $shareSettingsDataType = '';
  /**
   * @var int
   */
  public $size;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $zone;

  /**
   * @param NodeGroupAutoscalingPolicy
   */
  public function setAutoscalingPolicy(NodeGroupAutoscalingPolicy $autoscalingPolicy)
  {
    $this->autoscalingPolicy = $autoscalingPolicy;
  }
  /**
   * @return NodeGroupAutoscalingPolicy
   */
  public function getAutoscalingPolicy()
  {
    return $this->autoscalingPolicy;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
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
  public function setLocationHint($locationHint)
  {
    $this->locationHint = $locationHint;
  }
  /**
   * @return string
   */
  public function getLocationHint()
  {
    return $this->locationHint;
  }
  /**
   * @param string
   */
  public function setMaintenancePolicy($maintenancePolicy)
  {
    $this->maintenancePolicy = $maintenancePolicy;
  }
  /**
   * @return string
   */
  public function getMaintenancePolicy()
  {
    return $this->maintenancePolicy;
  }
  /**
   * @param NodeGroupMaintenanceWindow
   */
  public function setMaintenanceWindow(NodeGroupMaintenanceWindow $maintenanceWindow)
  {
    $this->maintenanceWindow = $maintenanceWindow;
  }
  /**
   * @return NodeGroupMaintenanceWindow
   */
  public function getMaintenanceWindow()
  {
    return $this->maintenanceWindow;
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
  public function setNodeTemplate($nodeTemplate)
  {
    $this->nodeTemplate = $nodeTemplate;
  }
  /**
   * @return string
   */
  public function getNodeTemplate()
  {
    return $this->nodeTemplate;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param ShareSettings
   */
  public function setShareSettings(ShareSettings $shareSettings)
  {
    $this->shareSettings = $shareSettings;
  }
  /**
   * @return ShareSettings
   */
  public function getShareSettings()
  {
    return $this->shareSettings;
  }
  /**
   * @param int
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return int
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeGroup::class, 'Google_Service_Compute_NodeGroup');
