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

namespace Google\Service\MyBusinessLodging;

class Services extends \Google\Collection
{
  protected $collection_key = 'languagesSpoken';
  /**
   * @var bool
   */
  public $baggageStorage;
  /**
   * @var string
   */
  public $baggageStorageException;
  /**
   * @var bool
   */
  public $concierge;
  /**
   * @var string
   */
  public $conciergeException;
  /**
   * @var bool
   */
  public $convenienceStore;
  /**
   * @var string
   */
  public $convenienceStoreException;
  /**
   * @var bool
   */
  public $currencyExchange;
  /**
   * @var string
   */
  public $currencyExchangeException;
  /**
   * @var bool
   */
  public $elevator;
  /**
   * @var string
   */
  public $elevatorException;
  /**
   * @var bool
   */
  public $frontDesk;
  /**
   * @var string
   */
  public $frontDeskException;
  /**
   * @var bool
   */
  public $fullServiceLaundry;
  /**
   * @var string
   */
  public $fullServiceLaundryException;
  /**
   * @var bool
   */
  public $giftShop;
  /**
   * @var string
   */
  public $giftShopException;
  protected $languagesSpokenType = LanguageSpoken::class;
  protected $languagesSpokenDataType = 'array';
  /**
   * @var bool
   */
  public $selfServiceLaundry;
  /**
   * @var string
   */
  public $selfServiceLaundryException;
  /**
   * @var bool
   */
  public $socialHour;
  /**
   * @var string
   */
  public $socialHourException;
  /**
   * @var bool
   */
  public $twentyFourHourFrontDesk;
  /**
   * @var string
   */
  public $twentyFourHourFrontDeskException;
  /**
   * @var bool
   */
  public $wakeUpCalls;
  /**
   * @var string
   */
  public $wakeUpCallsException;

  /**
   * @param bool
   */
  public function setBaggageStorage($baggageStorage)
  {
    $this->baggageStorage = $baggageStorage;
  }
  /**
   * @return bool
   */
  public function getBaggageStorage()
  {
    return $this->baggageStorage;
  }
  /**
   * @param string
   */
  public function setBaggageStorageException($baggageStorageException)
  {
    $this->baggageStorageException = $baggageStorageException;
  }
  /**
   * @return string
   */
  public function getBaggageStorageException()
  {
    return $this->baggageStorageException;
  }
  /**
   * @param bool
   */
  public function setConcierge($concierge)
  {
    $this->concierge = $concierge;
  }
  /**
   * @return bool
   */
  public function getConcierge()
  {
    return $this->concierge;
  }
  /**
   * @param string
   */
  public function setConciergeException($conciergeException)
  {
    $this->conciergeException = $conciergeException;
  }
  /**
   * @return string
   */
  public function getConciergeException()
  {
    return $this->conciergeException;
  }
  /**
   * @param bool
   */
  public function setConvenienceStore($convenienceStore)
  {
    $this->convenienceStore = $convenienceStore;
  }
  /**
   * @return bool
   */
  public function getConvenienceStore()
  {
    return $this->convenienceStore;
  }
  /**
   * @param string
   */
  public function setConvenienceStoreException($convenienceStoreException)
  {
    $this->convenienceStoreException = $convenienceStoreException;
  }
  /**
   * @return string
   */
  public function getConvenienceStoreException()
  {
    return $this->convenienceStoreException;
  }
  /**
   * @param bool
   */
  public function setCurrencyExchange($currencyExchange)
  {
    $this->currencyExchange = $currencyExchange;
  }
  /**
   * @return bool
   */
  public function getCurrencyExchange()
  {
    return $this->currencyExchange;
  }
  /**
   * @param string
   */
  public function setCurrencyExchangeException($currencyExchangeException)
  {
    $this->currencyExchangeException = $currencyExchangeException;
  }
  /**
   * @return string
   */
  public function getCurrencyExchangeException()
  {
    return $this->currencyExchangeException;
  }
  /**
   * @param bool
   */
  public function setElevator($elevator)
  {
    $this->elevator = $elevator;
  }
  /**
   * @return bool
   */
  public function getElevator()
  {
    return $this->elevator;
  }
  /**
   * @param string
   */
  public function setElevatorException($elevatorException)
  {
    $this->elevatorException = $elevatorException;
  }
  /**
   * @return string
   */
  public function getElevatorException()
  {
    return $this->elevatorException;
  }
  /**
   * @param bool
   */
  public function setFrontDesk($frontDesk)
  {
    $this->frontDesk = $frontDesk;
  }
  /**
   * @return bool
   */
  public function getFrontDesk()
  {
    return $this->frontDesk;
  }
  /**
   * @param string
   */
  public function setFrontDeskException($frontDeskException)
  {
    $this->frontDeskException = $frontDeskException;
  }
  /**
   * @return string
   */
  public function getFrontDeskException()
  {
    return $this->frontDeskException;
  }
  /**
   * @param bool
   */
  public function setFullServiceLaundry($fullServiceLaundry)
  {
    $this->fullServiceLaundry = $fullServiceLaundry;
  }
  /**
   * @return bool
   */
  public function getFullServiceLaundry()
  {
    return $this->fullServiceLaundry;
  }
  /**
   * @param string
   */
  public function setFullServiceLaundryException($fullServiceLaundryException)
  {
    $this->fullServiceLaundryException = $fullServiceLaundryException;
  }
  /**
   * @return string
   */
  public function getFullServiceLaundryException()
  {
    return $this->fullServiceLaundryException;
  }
  /**
   * @param bool
   */
  public function setGiftShop($giftShop)
  {
    $this->giftShop = $giftShop;
  }
  /**
   * @return bool
   */
  public function getGiftShop()
  {
    return $this->giftShop;
  }
  /**
   * @param string
   */
  public function setGiftShopException($giftShopException)
  {
    $this->giftShopException = $giftShopException;
  }
  /**
   * @return string
   */
  public function getGiftShopException()
  {
    return $this->giftShopException;
  }
  /**
   * @param LanguageSpoken[]
   */
  public function setLanguagesSpoken($languagesSpoken)
  {
    $this->languagesSpoken = $languagesSpoken;
  }
  /**
   * @return LanguageSpoken[]
   */
  public function getLanguagesSpoken()
  {
    return $this->languagesSpoken;
  }
  /**
   * @param bool
   */
  public function setSelfServiceLaundry($selfServiceLaundry)
  {
    $this->selfServiceLaundry = $selfServiceLaundry;
  }
  /**
   * @return bool
   */
  public function getSelfServiceLaundry()
  {
    return $this->selfServiceLaundry;
  }
  /**
   * @param string
   */
  public function setSelfServiceLaundryException($selfServiceLaundryException)
  {
    $this->selfServiceLaundryException = $selfServiceLaundryException;
  }
  /**
   * @return string
   */
  public function getSelfServiceLaundryException()
  {
    return $this->selfServiceLaundryException;
  }
  /**
   * @param bool
   */
  public function setSocialHour($socialHour)
  {
    $this->socialHour = $socialHour;
  }
  /**
   * @return bool
   */
  public function getSocialHour()
  {
    return $this->socialHour;
  }
  /**
   * @param string
   */
  public function setSocialHourException($socialHourException)
  {
    $this->socialHourException = $socialHourException;
  }
  /**
   * @return string
   */
  public function getSocialHourException()
  {
    return $this->socialHourException;
  }
  /**
   * @param bool
   */
  public function setTwentyFourHourFrontDesk($twentyFourHourFrontDesk)
  {
    $this->twentyFourHourFrontDesk = $twentyFourHourFrontDesk;
  }
  /**
   * @return bool
   */
  public function getTwentyFourHourFrontDesk()
  {
    return $this->twentyFourHourFrontDesk;
  }
  /**
   * @param string
   */
  public function setTwentyFourHourFrontDeskException($twentyFourHourFrontDeskException)
  {
    $this->twentyFourHourFrontDeskException = $twentyFourHourFrontDeskException;
  }
  /**
   * @return string
   */
  public function getTwentyFourHourFrontDeskException()
  {
    return $this->twentyFourHourFrontDeskException;
  }
  /**
   * @param bool
   */
  public function setWakeUpCalls($wakeUpCalls)
  {
    $this->wakeUpCalls = $wakeUpCalls;
  }
  /**
   * @return bool
   */
  public function getWakeUpCalls()
  {
    return $this->wakeUpCalls;
  }
  /**
   * @param string
   */
  public function setWakeUpCallsException($wakeUpCallsException)
  {
    $this->wakeUpCallsException = $wakeUpCallsException;
  }
  /**
   * @return string
   */
  public function getWakeUpCallsException()
  {
    return $this->wakeUpCallsException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Services::class, 'Google_Service_MyBusinessLodging_Services');
