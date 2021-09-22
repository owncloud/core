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

namespace Google\Service\ShoppingContent;

class LiaCountrySettings extends \Google\Model
{
  protected $aboutType = LiaAboutPageSettings::class;
  protected $aboutDataType = '';
  public $country;
  public $hostedLocalStorefrontActive;
  protected $inventoryType = LiaInventorySettings::class;
  protected $inventoryDataType = '';
  protected $onDisplayToOrderType = LiaOnDisplayToOrderSettings::class;
  protected $onDisplayToOrderDataType = '';
  protected $posDataProviderType = LiaPosDataProvider::class;
  protected $posDataProviderDataType = '';
  public $storePickupActive;

  /**
   * @param LiaAboutPageSettings
   */
  public function setAbout(LiaAboutPageSettings $about)
  {
    $this->about = $about;
  }
  /**
   * @return LiaAboutPageSettings
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
   * @param LiaInventorySettings
   */
  public function setInventory(LiaInventorySettings $inventory)
  {
    $this->inventory = $inventory;
  }
  /**
   * @return LiaInventorySettings
   */
  public function getInventory()
  {
    return $this->inventory;
  }
  /**
   * @param LiaOnDisplayToOrderSettings
   */
  public function setOnDisplayToOrder(LiaOnDisplayToOrderSettings $onDisplayToOrder)
  {
    $this->onDisplayToOrder = $onDisplayToOrder;
  }
  /**
   * @return LiaOnDisplayToOrderSettings
   */
  public function getOnDisplayToOrder()
  {
    return $this->onDisplayToOrder;
  }
  /**
   * @param LiaPosDataProvider
   */
  public function setPosDataProvider(LiaPosDataProvider $posDataProvider)
  {
    $this->posDataProvider = $posDataProvider;
  }
  /**
   * @return LiaPosDataProvider
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiaCountrySettings::class, 'Google_Service_ShoppingContent_LiaCountrySettings');
