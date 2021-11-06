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

namespace Google\Service\ServiceNetworking;

class ValidateConsumerConfigResponse extends \Google\Collection
{
  protected $collection_key = 'existingSubnetworkCandidates';
  protected $existingSubnetworkCandidatesType = Subnetwork::class;
  protected $existingSubnetworkCandidatesDataType = 'array';
  public $isValid;
  public $validationError;

  /**
   * @param Subnetwork[]
   */
  public function setExistingSubnetworkCandidates($existingSubnetworkCandidates)
  {
    $this->existingSubnetworkCandidates = $existingSubnetworkCandidates;
  }
  /**
   * @return Subnetwork[]
   */
  public function getExistingSubnetworkCandidates()
  {
    return $this->existingSubnetworkCandidates;
  }
  public function setIsValid($isValid)
  {
    $this->isValid = $isValid;
  }
  public function getIsValid()
  {
    return $this->isValid;
  }
  public function setValidationError($validationError)
  {
    $this->validationError = $validationError;
  }
  public function getValidationError()
  {
    return $this->validationError;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ValidateConsumerConfigResponse::class, 'Google_Service_ServiceNetworking_ValidateConsumerConfigResponse');
