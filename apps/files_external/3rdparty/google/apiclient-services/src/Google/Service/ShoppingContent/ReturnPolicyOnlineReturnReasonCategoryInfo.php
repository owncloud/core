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

class Google_Service_ShoppingContent_ReturnPolicyOnlineReturnReasonCategoryInfo extends Google_Model
{
  public $returnLabelSource;
  public $returnReasonCategory;
  protected $returnShippingFeeType = 'Google_Service_ShoppingContent_ReturnPolicyOnlineReturnShippingFee';
  protected $returnShippingFeeDataType = '';

  public function setReturnLabelSource($returnLabelSource)
  {
    $this->returnLabelSource = $returnLabelSource;
  }
  public function getReturnLabelSource()
  {
    return $this->returnLabelSource;
  }
  public function setReturnReasonCategory($returnReasonCategory)
  {
    $this->returnReasonCategory = $returnReasonCategory;
  }
  public function getReturnReasonCategory()
  {
    return $this->returnReasonCategory;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicyOnlineReturnShippingFee
   */
  public function setReturnShippingFee(Google_Service_ShoppingContent_ReturnPolicyOnlineReturnShippingFee $returnShippingFee)
  {
    $this->returnShippingFee = $returnShippingFee;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicyOnlineReturnShippingFee
   */
  public function getReturnShippingFee()
  {
    return $this->returnShippingFee;
  }
}
