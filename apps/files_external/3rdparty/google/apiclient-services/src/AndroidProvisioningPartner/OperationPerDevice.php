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

namespace Google\Service\AndroidProvisioningPartner;

class OperationPerDevice extends \Google\Model
{
  protected $claimType = PartnerClaim::class;
  protected $claimDataType = '';
  protected $resultType = PerDeviceStatusInBatch::class;
  protected $resultDataType = '';
  protected $unclaimType = PartnerUnclaim::class;
  protected $unclaimDataType = '';
  protected $updateMetadataType = UpdateMetadataArguments::class;
  protected $updateMetadataDataType = '';

  /**
   * @param PartnerClaim
   */
  public function setClaim(PartnerClaim $claim)
  {
    $this->claim = $claim;
  }
  /**
   * @return PartnerClaim
   */
  public function getClaim()
  {
    return $this->claim;
  }
  /**
   * @param PerDeviceStatusInBatch
   */
  public function setResult(PerDeviceStatusInBatch $result)
  {
    $this->result = $result;
  }
  /**
   * @return PerDeviceStatusInBatch
   */
  public function getResult()
  {
    return $this->result;
  }
  /**
   * @param PartnerUnclaim
   */
  public function setUnclaim(PartnerUnclaim $unclaim)
  {
    $this->unclaim = $unclaim;
  }
  /**
   * @return PartnerUnclaim
   */
  public function getUnclaim()
  {
    return $this->unclaim;
  }
  /**
   * @param UpdateMetadataArguments
   */
  public function setUpdateMetadata(UpdateMetadataArguments $updateMetadata)
  {
    $this->updateMetadata = $updateMetadata;
  }
  /**
   * @return UpdateMetadataArguments
   */
  public function getUpdateMetadata()
  {
    return $this->updateMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationPerDevice::class, 'Google_Service_AndroidProvisioningPartner_OperationPerDevice');
