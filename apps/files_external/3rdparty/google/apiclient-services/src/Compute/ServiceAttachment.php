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

class ServiceAttachment extends \Google\Collection
{
  protected $collection_key = 'natSubnets';
  protected $connectedEndpointsType = ServiceAttachmentConnectedEndpoint::class;
  protected $connectedEndpointsDataType = 'array';
  /**
   * @var string
   */
  public $connectionPreference;
  protected $consumerAcceptListsType = ServiceAttachmentConsumerProjectLimit::class;
  protected $consumerAcceptListsDataType = 'array';
  /**
   * @var string[]
   */
  public $consumerRejectLists;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $domainNames;
  /**
   * @var bool
   */
  public $enableProxyProtocol;
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
  public $name;
  /**
   * @var string[]
   */
  public $natSubnets;
  /**
   * @var string
   */
  public $producerForwardingRule;
  protected $pscServiceAttachmentIdType = Uint128::class;
  protected $pscServiceAttachmentIdDataType = '';
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $targetService;

  /**
   * @param ServiceAttachmentConnectedEndpoint[]
   */
  public function setConnectedEndpoints($connectedEndpoints)
  {
    $this->connectedEndpoints = $connectedEndpoints;
  }
  /**
   * @return ServiceAttachmentConnectedEndpoint[]
   */
  public function getConnectedEndpoints()
  {
    return $this->connectedEndpoints;
  }
  /**
   * @param string
   */
  public function setConnectionPreference($connectionPreference)
  {
    $this->connectionPreference = $connectionPreference;
  }
  /**
   * @return string
   */
  public function getConnectionPreference()
  {
    return $this->connectionPreference;
  }
  /**
   * @param ServiceAttachmentConsumerProjectLimit[]
   */
  public function setConsumerAcceptLists($consumerAcceptLists)
  {
    $this->consumerAcceptLists = $consumerAcceptLists;
  }
  /**
   * @return ServiceAttachmentConsumerProjectLimit[]
   */
  public function getConsumerAcceptLists()
  {
    return $this->consumerAcceptLists;
  }
  /**
   * @param string[]
   */
  public function setConsumerRejectLists($consumerRejectLists)
  {
    $this->consumerRejectLists = $consumerRejectLists;
  }
  /**
   * @return string[]
   */
  public function getConsumerRejectLists()
  {
    return $this->consumerRejectLists;
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
   * @param string[]
   */
  public function setDomainNames($domainNames)
  {
    $this->domainNames = $domainNames;
  }
  /**
   * @return string[]
   */
  public function getDomainNames()
  {
    return $this->domainNames;
  }
  /**
   * @param bool
   */
  public function setEnableProxyProtocol($enableProxyProtocol)
  {
    $this->enableProxyProtocol = $enableProxyProtocol;
  }
  /**
   * @return bool
   */
  public function getEnableProxyProtocol()
  {
    return $this->enableProxyProtocol;
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
   * @param string[]
   */
  public function setNatSubnets($natSubnets)
  {
    $this->natSubnets = $natSubnets;
  }
  /**
   * @return string[]
   */
  public function getNatSubnets()
  {
    return $this->natSubnets;
  }
  /**
   * @param string
   */
  public function setProducerForwardingRule($producerForwardingRule)
  {
    $this->producerForwardingRule = $producerForwardingRule;
  }
  /**
   * @return string
   */
  public function getProducerForwardingRule()
  {
    return $this->producerForwardingRule;
  }
  /**
   * @param Uint128
   */
  public function setPscServiceAttachmentId(Uint128 $pscServiceAttachmentId)
  {
    $this->pscServiceAttachmentId = $pscServiceAttachmentId;
  }
  /**
   * @return Uint128
   */
  public function getPscServiceAttachmentId()
  {
    return $this->pscServiceAttachmentId;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
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
   * @param string
   */
  public function setTargetService($targetService)
  {
    $this->targetService = $targetService;
  }
  /**
   * @return string
   */
  public function getTargetService()
  {
    return $this->targetService;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceAttachment::class, 'Google_Service_Compute_ServiceAttachment');
