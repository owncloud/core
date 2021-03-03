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

class Google_Service_CloudRetail_GoogleCloudRetailLoggingImportErrorContext extends Google_Model
{
  public $catalogItem;
  public $gcsPath;
  public $lineNumber;
  public $operationName;
  public $product;
  public $userEvent;

  public function setCatalogItem($catalogItem)
  {
    $this->catalogItem = $catalogItem;
  }
  public function getCatalogItem()
  {
    return $this->catalogItem;
  }
  public function setGcsPath($gcsPath)
  {
    $this->gcsPath = $gcsPath;
  }
  public function getGcsPath()
  {
    return $this->gcsPath;
  }
  public function setLineNumber($lineNumber)
  {
    $this->lineNumber = $lineNumber;
  }
  public function getLineNumber()
  {
    return $this->lineNumber;
  }
  public function setOperationName($operationName)
  {
    $this->operationName = $operationName;
  }
  public function getOperationName()
  {
    return $this->operationName;
  }
  public function setProduct($product)
  {
    $this->product = $product;
  }
  public function getProduct()
  {
    return $this->product;
  }
  public function setUserEvent($userEvent)
  {
    $this->userEvent = $userEvent;
  }
  public function getUserEvent()
  {
    return $this->userEvent;
  }
}
