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

class Google_Service_Compute_AccessConfig extends Google_Model
{
  public $externalIpv6;
  public $externalIpv6PrefixLength;
  public $kind;
  public $name;
  public $natIP;
  public $networkTier;
  public $publicPtrDomainName;
  public $setPublicPtr;
  public $type;

  public function setExternalIpv6($externalIpv6)
  {
    $this->externalIpv6 = $externalIpv6;
  }
  public function getExternalIpv6()
  {
    return $this->externalIpv6;
  }
  public function setExternalIpv6PrefixLength($externalIpv6PrefixLength)
  {
    $this->externalIpv6PrefixLength = $externalIpv6PrefixLength;
  }
  public function getExternalIpv6PrefixLength()
  {
    return $this->externalIpv6PrefixLength;
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
  public function setNatIP($natIP)
  {
    $this->natIP = $natIP;
  }
  public function getNatIP()
  {
    return $this->natIP;
  }
  public function setNetworkTier($networkTier)
  {
    $this->networkTier = $networkTier;
  }
  public function getNetworkTier()
  {
    return $this->networkTier;
  }
  public function setPublicPtrDomainName($publicPtrDomainName)
  {
    $this->publicPtrDomainName = $publicPtrDomainName;
  }
  public function getPublicPtrDomainName()
  {
    return $this->publicPtrDomainName;
  }
  public function setSetPublicPtr($setPublicPtr)
  {
    $this->setPublicPtr = $setPublicPtr;
  }
  public function getSetPublicPtr()
  {
    return $this->setPublicPtr;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
