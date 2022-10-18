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

namespace Google\Service\Contentwarehouse;

class PremiumPerDocData extends \Google\Collection
{
  protected $collection_key = 'Entitlement';
  protected $internal_gapi_mappings = [
        "currency" => "Currency",
        "date" => "Date",
        "entitlement" => "Entitlement",
        "isArchival" => "IsArchival",
        "isEntitled" => "IsEntitled",
        "price" => "Price",
        "publication" => "Publication",
  ];
  /**
   * @var int
   */
  public $currency;
  /**
   * @var string
   */
  public $date;
  /**
   * @var int[]
   */
  public $entitlement;
  /**
   * @var bool
   */
  public $isArchival;
  /**
   * @var bool
   */
  public $isEntitled;
  /**
   * @var int
   */
  public $price;
  /**
   * @var string
   */
  public $publication;

  /**
   * @param int
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  /**
   * @return int
   */
  public function getCurrency()
  {
    return $this->currency;
  }
  /**
   * @param string
   */
  public function setDate($date)
  {
    $this->date = $date;
  }
  /**
   * @return string
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param int[]
   */
  public function setEntitlement($entitlement)
  {
    $this->entitlement = $entitlement;
  }
  /**
   * @return int[]
   */
  public function getEntitlement()
  {
    return $this->entitlement;
  }
  /**
   * @param bool
   */
  public function setIsArchival($isArchival)
  {
    $this->isArchival = $isArchival;
  }
  /**
   * @return bool
   */
  public function getIsArchival()
  {
    return $this->isArchival;
  }
  /**
   * @param bool
   */
  public function setIsEntitled($isEntitled)
  {
    $this->isEntitled = $isEntitled;
  }
  /**
   * @return bool
   */
  public function getIsEntitled()
  {
    return $this->isEntitled;
  }
  /**
   * @param int
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }
  /**
   * @return int
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string
   */
  public function setPublication($publication)
  {
    $this->publication = $publication;
  }
  /**
   * @return string
   */
  public function getPublication()
  {
    return $this->publication;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PremiumPerDocData::class, 'Google_Service_Contentwarehouse_PremiumPerDocData');
