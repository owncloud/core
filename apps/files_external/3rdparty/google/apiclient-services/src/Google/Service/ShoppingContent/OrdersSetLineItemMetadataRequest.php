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

class Google_Service_ShoppingContent_OrdersSetLineItemMetadataRequest extends Google_Collection
{
  protected $collection_key = 'annotations';
  protected $annotationsType = 'Google_Service_ShoppingContent_OrderMerchantProvidedAnnotation';
  protected $annotationsDataType = 'array';
  public $lineItemId;
  public $operationId;
  public $productId;

  /**
   * @param Google_Service_ShoppingContent_OrderMerchantProvidedAnnotation
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderMerchantProvidedAnnotation
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  public function setLineItemId($lineItemId)
  {
    $this->lineItemId = $lineItemId;
  }
  public function getLineItemId()
  {
    return $this->lineItemId;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
}
