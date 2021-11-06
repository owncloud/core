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

class VmEndpointNatMappingsList extends \Google\Collection
{
  protected $collection_key = 'result';
  public $id;
  public $kind;
  public $nextPageToken;
  protected $resultType = VmEndpointNatMappings::class;
  protected $resultDataType = 'array';
  public $selfLink;
  protected $warningType = VmEndpointNatMappingsListWarning::class;
  protected $warningDataType = '';

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
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param VmEndpointNatMappings[]
   */
  public function setResult($result)
  {
    $this->result = $result;
  }
  /**
   * @return VmEndpointNatMappings[]
   */
  public function getResult()
  {
    return $this->result;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param VmEndpointNatMappingsListWarning
   */
  public function setWarning(VmEndpointNatMappingsListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return VmEndpointNatMappingsListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmEndpointNatMappingsList::class, 'Google_Service_Compute_VmEndpointNatMappingsList');
