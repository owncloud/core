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

namespace Google\Service\Baremetalsolution;

class VRF extends \Google\Collection
{
  protected $collection_key = 'vlanAttachments';
  /**
   * @var string
   */
  public $name;
  protected $qosPolicyType = QosPolicy::class;
  protected $qosPolicyDataType = '';
  /**
   * @var string
   */
  public $state;
  protected $vlanAttachmentsType = VlanAttachment::class;
  protected $vlanAttachmentsDataType = 'array';

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
   * @param QosPolicy
   */
  public function setQosPolicy(QosPolicy $qosPolicy)
  {
    $this->qosPolicy = $qosPolicy;
  }
  /**
   * @return QosPolicy
   */
  public function getQosPolicy()
  {
    return $this->qosPolicy;
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
   * @param VlanAttachment[]
   */
  public function setVlanAttachments($vlanAttachments)
  {
    $this->vlanAttachments = $vlanAttachments;
  }
  /**
   * @return VlanAttachment[]
   */
  public function getVlanAttachments()
  {
    return $this->vlanAttachments;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VRF::class, 'Google_Service_Baremetalsolution_VRF');
