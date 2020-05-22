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

class Google_Service_ShoppingContent_ReturnpolicyCustomBatchRequestEntry extends Google_Model
{
  public $batchId;
  public $merchantId;
  public $method;
  protected $returnPolicyType = 'Google_Service_ShoppingContent_ReturnPolicy';
  protected $returnPolicyDataType = '';
  public $returnPolicyId;

  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  public function getBatchId()
  {
    return $this->batchId;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicy
   */
  public function setReturnPolicy(Google_Service_ShoppingContent_ReturnPolicy $returnPolicy)
  {
    $this->returnPolicy = $returnPolicy;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicy
   */
  public function getReturnPolicy()
  {
    return $this->returnPolicy;
  }
  public function setReturnPolicyId($returnPolicyId)
  {
    $this->returnPolicyId = $returnPolicyId;
  }
  public function getReturnPolicyId()
  {
    return $this->returnPolicyId;
  }
}
