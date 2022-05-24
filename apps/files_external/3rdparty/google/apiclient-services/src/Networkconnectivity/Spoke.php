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

namespace Google\Service\Networkconnectivity;

class Spoke extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $hub;
  /**
   * @var string[]
   */
  public $labels;
  protected $linkedInterconnectAttachmentsType = LinkedInterconnectAttachments::class;
  protected $linkedInterconnectAttachmentsDataType = '';
  protected $linkedRouterApplianceInstancesType = LinkedRouterApplianceInstances::class;
  protected $linkedRouterApplianceInstancesDataType = '';
  protected $linkedVpnTunnelsType = LinkedVpnTunnels::class;
  protected $linkedVpnTunnelsDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $uniqueId;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setHub($hub)
  {
    $this->hub = $hub;
  }
  /**
   * @return string
   */
  public function getHub()
  {
    return $this->hub;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param LinkedInterconnectAttachments
   */
  public function setLinkedInterconnectAttachments(LinkedInterconnectAttachments $linkedInterconnectAttachments)
  {
    $this->linkedInterconnectAttachments = $linkedInterconnectAttachments;
  }
  /**
   * @return LinkedInterconnectAttachments
   */
  public function getLinkedInterconnectAttachments()
  {
    return $this->linkedInterconnectAttachments;
  }
  /**
   * @param LinkedRouterApplianceInstances
   */
  public function setLinkedRouterApplianceInstances(LinkedRouterApplianceInstances $linkedRouterApplianceInstances)
  {
    $this->linkedRouterApplianceInstances = $linkedRouterApplianceInstances;
  }
  /**
   * @return LinkedRouterApplianceInstances
   */
  public function getLinkedRouterApplianceInstances()
  {
    return $this->linkedRouterApplianceInstances;
  }
  /**
   * @param LinkedVpnTunnels
   */
  public function setLinkedVpnTunnels(LinkedVpnTunnels $linkedVpnTunnels)
  {
    $this->linkedVpnTunnels = $linkedVpnTunnels;
  }
  /**
   * @return LinkedVpnTunnels
   */
  public function getLinkedVpnTunnels()
  {
    return $this->linkedVpnTunnels;
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
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUniqueId($uniqueId)
  {
    $this->uniqueId = $uniqueId;
  }
  /**
   * @return string
   */
  public function getUniqueId()
  {
    return $this->uniqueId;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Spoke::class, 'Google_Service_Networkconnectivity_Spoke');
