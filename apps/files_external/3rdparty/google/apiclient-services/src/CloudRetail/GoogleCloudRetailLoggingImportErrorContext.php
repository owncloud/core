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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailLoggingImportErrorContext extends \Google\Model
{
  /**
   * @var string
   */
  public $catalogItem;
  /**
   * @var string
   */
  public $gcsPath;
  /**
   * @var string
   */
  public $inventoryActivity;
  /**
   * @var string
   */
  public $lineNumber;
  /**
   * @var string
   */
  public $operationName;
  /**
   * @var string
   */
  public $order;
  /**
   * @var string
   */
  public $place;
  /**
   * @var string
   */
  public $placeAsset;
  /**
   * @var string
   */
  public $placeProductPrice;
  /**
   * @var string
   */
  public $placeProductSettings;
  /**
   * @var string
   */
  public $product;
  /**
   * @var string
   */
  public $userEvent;

  /**
   * @param string
   */
  public function setCatalogItem($catalogItem)
  {
    $this->catalogItem = $catalogItem;
  }
  /**
   * @return string
   */
  public function getCatalogItem()
  {
    return $this->catalogItem;
  }
  /**
   * @param string
   */
  public function setGcsPath($gcsPath)
  {
    $this->gcsPath = $gcsPath;
  }
  /**
   * @return string
   */
  public function getGcsPath()
  {
    return $this->gcsPath;
  }
  /**
   * @param string
   */
  public function setInventoryActivity($inventoryActivity)
  {
    $this->inventoryActivity = $inventoryActivity;
  }
  /**
   * @return string
   */
  public function getInventoryActivity()
  {
    return $this->inventoryActivity;
  }
  /**
   * @param string
   */
  public function setLineNumber($lineNumber)
  {
    $this->lineNumber = $lineNumber;
  }
  /**
   * @return string
   */
  public function getLineNumber()
  {
    return $this->lineNumber;
  }
  /**
   * @param string
   */
  public function setOperationName($operationName)
  {
    $this->operationName = $operationName;
  }
  /**
   * @return string
   */
  public function getOperationName()
  {
    return $this->operationName;
  }
  /**
   * @param string
   */
  public function setOrder($order)
  {
    $this->order = $order;
  }
  /**
   * @return string
   */
  public function getOrder()
  {
    return $this->order;
  }
  /**
   * @param string
   */
  public function setPlace($place)
  {
    $this->place = $place;
  }
  /**
   * @return string
   */
  public function getPlace()
  {
    return $this->place;
  }
  /**
   * @param string
   */
  public function setPlaceAsset($placeAsset)
  {
    $this->placeAsset = $placeAsset;
  }
  /**
   * @return string
   */
  public function getPlaceAsset()
  {
    return $this->placeAsset;
  }
  /**
   * @param string
   */
  public function setPlaceProductPrice($placeProductPrice)
  {
    $this->placeProductPrice = $placeProductPrice;
  }
  /**
   * @return string
   */
  public function getPlaceProductPrice()
  {
    return $this->placeProductPrice;
  }
  /**
   * @param string
   */
  public function setPlaceProductSettings($placeProductSettings)
  {
    $this->placeProductSettings = $placeProductSettings;
  }
  /**
   * @return string
   */
  public function getPlaceProductSettings()
  {
    return $this->placeProductSettings;
  }
  /**
   * @param string
   */
  public function setProduct($product)
  {
    $this->product = $product;
  }
  /**
   * @return string
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param string
   */
  public function setUserEvent($userEvent)
  {
    $this->userEvent = $userEvent;
  }
  /**
   * @return string
   */
  public function getUserEvent()
  {
    return $this->userEvent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailLoggingImportErrorContext::class, 'Google_Service_CloudRetail_GoogleCloudRetailLoggingImportErrorContext');
