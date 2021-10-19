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

class NetworkConfig extends \Google\Collection
{
  protected $collection_key = 'vlanAttachments';
  /**
   * @var string
   */
  public $bandwidth;
  /**
   * @var string
   */
  public $cidr;
  /**
   * @var string
   */
  public $gcpService;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $jumboFramesEnabled;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $serviceCidr;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $userNote;
  protected $vlanAttachmentsType = IntakeVlanAttachment::class;
  protected $vlanAttachmentsDataType = 'array';
  /**
   * @var bool
   */
  public $vlanSameProject;

  /**
   * @param string
   */
  public function setBandwidth($bandwidth)
  {
    $this->bandwidth = $bandwidth;
  }
  /**
   * @return string
   */
  public function getBandwidth()
  {
    return $this->bandwidth;
  }
  /**
   * @param string
   */
  public function setCidr($cidr)
  {
    $this->cidr = $cidr;
  }
  /**
   * @return string
   */
  public function getCidr()
  {
    return $this->cidr;
  }
  /**
   * @param string
   */
  public function setGcpService($gcpService)
  {
    $this->gcpService = $gcpService;
  }
  /**
   * @return string
   */
  public function getGcpService()
  {
    return $this->gcpService;
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
   * @param bool
   */
  public function setJumboFramesEnabled($jumboFramesEnabled)
  {
    $this->jumboFramesEnabled = $jumboFramesEnabled;
  }
  /**
   * @return bool
   */
  public function getJumboFramesEnabled()
  {
    return $this->jumboFramesEnabled;
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
  public function setServiceCidr($serviceCidr)
  {
    $this->serviceCidr = $serviceCidr;
  }
  /**
   * @return string
   */
  public function getServiceCidr()
  {
    return $this->serviceCidr;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUserNote($userNote)
  {
    $this->userNote = $userNote;
  }
  /**
   * @return string
   */
  public function getUserNote()
  {
    return $this->userNote;
  }
  /**
   * @param IntakeVlanAttachment[]
   */
  public function setVlanAttachments($vlanAttachments)
  {
    $this->vlanAttachments = $vlanAttachments;
  }
  /**
   * @return IntakeVlanAttachment[]
   */
  public function getVlanAttachments()
  {
    return $this->vlanAttachments;
  }
  /**
   * @param bool
   */
  public function setVlanSameProject($vlanSameProject)
  {
    $this->vlanSameProject = $vlanSameProject;
  }
  /**
   * @return bool
   */
  public function getVlanSameProject()
  {
    return $this->vlanSameProject;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkConfig::class, 'Google_Service_Baremetalsolution_NetworkConfig');
