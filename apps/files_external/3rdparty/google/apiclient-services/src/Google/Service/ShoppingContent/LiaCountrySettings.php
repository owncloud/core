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

class Google_Service_ShoppingContent_LiaCountrySettings extends Google_Model
{
  protected $aboutType = 'Google_Service_ShoppingContent_LiaAboutPageSettings';
  protected $aboutDataType = '';
  public $country;
  public $hostedLocalStorefrontActive;
  protected $inventoryType = 'Google_Service_ShoppingContent_LiaInventorySettings';
  protected $inventoryDataType = '';
  protected $onDisplayToOrderType = 'Google_Service_ShoppingContent_LiaOnDisplayToOrderSettings';
  protected $onDisplayToOrderDataType = '';
  protected $posDataProviderType = 'Google_Service_ShoppingContent_LiaPosDataProvider';
  protected $posDataProviderDataType = '';
  public $storePickupActive;

  /**
   * @param Google_Service_ShoppingContent_LiaAboutPageSettings
   */
  public function setAbout(Google_Service_ShoppingContent_LiaAboutPageSettings $about)
  {
    $this->about = $about;
  }
  /**
   * @return Google_Service_ShoppingContent_LiaAboutPageSettings
   */
  public function getAbout()
  {
    return $this->about;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setHostedLocalStorefrontActive($hostedLocalStorefrontActive)
  {
    $this->hostedLocalStorefrontActive = $hostedLocalStorefrontActive;
  }
  public function getHostedLocalStorefrontActive()
  {
    return $this->hostedLocalStorefrontActive;
  }
  /**
   * @param Google_Service_ShoppingContent_LiaInventorySettings
   */
  public function setInventory(Google_Service_ShoppingContent_LiaInventorySettings $inventory)
  {
    $this->inventory = $inventory;
  }
  /**
   * @return Google_Service_ShoppingContent_LiaInventorySettings
   */
  public function getInventory()
  {
    return $this->inventory;
  }
  /**
   * @param Google_Service_ShoppingContent_LiaOnDisplayToOrderSettings
   */
  public function setOnDisplayToOrder(Google_Service_ShoppingContent_LiaOnDisplayToOrderSettings $onDisplayToOrder)
  {
    $this->onDisplayToOrder = $onDisplayToOrder;
  }
  /**
   * @return Google_Service_ShoppingContent_LiaOnDisplayToOrderSettings
   */
  public function getOnDisplayToOrder()
  {
    return $this->onDisplayToOrder;
  }
  /**
   * @param Google_Service_ShoppingContent_LiaPosDataProvider
   */
  public function setPosDataProvider(Google_Service_ShoppingContent_LiaPosDataProvider $posDataProvider)
  {
    $this->posDataProvider = $posDataProvider;
  }
  /**
   * @return Google_Service_ShoppingContent_LiaPosDataProvider
   */
  public function getPosDataProvider()
  {
    return $this->posDataProvider;
  }
  public function setStorePickupActive($storePickupActive)
  {
    $this->storePickupActive = $storePickupActive;
  }
  public function getStorePickupActive()
  {
    return $this->storePickupActive;
  }
}
