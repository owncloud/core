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

class Google_Service_MyBusinessLodging_Services extends Google_Collection
{
  protected $collection_key = 'languagesSpoken';
  public $baggageStorage;
  public $baggageStorageException;
  public $concierge;
  public $conciergeException;
  public $convenienceStore;
  public $convenienceStoreException;
  public $currencyExchange;
  public $currencyExchangeException;
  public $elevator;
  public $elevatorException;
  public $frontDesk;
  public $frontDeskException;
  public $fullServiceLaundry;
  public $fullServiceLaundryException;
  public $giftShop;
  public $giftShopException;
  protected $languagesSpokenType = 'Google_Service_MyBusinessLodging_LanguageSpoken';
  protected $languagesSpokenDataType = 'array';
  public $selfServiceLaundry;
  public $selfServiceLaundryException;
  public $socialHour;
  public $socialHourException;
  public $twentyFourHourFrontDesk;
  public $twentyFourHourFrontDeskException;
  public $wakeUpCalls;
  public $wakeUpCallsException;

  public function setBaggageStorage($baggageStorage)
  {
    $this->baggageStorage = $baggageStorage;
  }
  public function getBaggageStorage()
  {
    return $this->baggageStorage;
  }
  public function setBaggageStorageException($baggageStorageException)
  {
    $this->baggageStorageException = $baggageStorageException;
  }
  public function getBaggageStorageException()
  {
    return $this->baggageStorageException;
  }
  public function setConcierge($concierge)
  {
    $this->concierge = $concierge;
  }
  public function getConcierge()
  {
    return $this->concierge;
  }
  public function setConciergeException($conciergeException)
  {
    $this->conciergeException = $conciergeException;
  }
  public function getConciergeException()
  {
    return $this->conciergeException;
  }
  public function setConvenienceStore($convenienceStore)
  {
    $this->convenienceStore = $convenienceStore;
  }
  public function getConvenienceStore()
  {
    return $this->convenienceStore;
  }
  public function setConvenienceStoreException($convenienceStoreException)
  {
    $this->convenienceStoreException = $convenienceStoreException;
  }
  public function getConvenienceStoreException()
  {
    return $this->convenienceStoreException;
  }
  public function setCurrencyExchange($currencyExchange)
  {
    $this->currencyExchange = $currencyExchange;
  }
  public function getCurrencyExchange()
  {
    return $this->currencyExchange;
  }
  public function setCurrencyExchangeException($currencyExchangeException)
  {
    $this->currencyExchangeException = $currencyExchangeException;
  }
  public function getCurrencyExchangeException()
  {
    return $this->currencyExchangeException;
  }
  public function setElevator($elevator)
  {
    $this->elevator = $elevator;
  }
  public function getElevator()
  {
    return $this->elevator;
  }
  public function setElevatorException($elevatorException)
  {
    $this->elevatorException = $elevatorException;
  }
  public function getElevatorException()
  {
    return $this->elevatorException;
  }
  public function setFrontDesk($frontDesk)
  {
    $this->frontDesk = $frontDesk;
  }
  public function getFrontDesk()
  {
    return $this->frontDesk;
  }
  public function setFrontDeskException($frontDeskException)
  {
    $this->frontDeskException = $frontDeskException;
  }
  public function getFrontDeskException()
  {
    return $this->frontDeskException;
  }
  public function setFullServiceLaundry($fullServiceLaundry)
  {
    $this->fullServiceLaundry = $fullServiceLaundry;
  }
  public function getFullServiceLaundry()
  {
    return $this->fullServiceLaundry;
  }
  public function setFullServiceLaundryException($fullServiceLaundryException)
  {
    $this->fullServiceLaundryException = $fullServiceLaundryException;
  }
  public function getFullServiceLaundryException()
  {
    return $this->fullServiceLaundryException;
  }
  public function setGiftShop($giftShop)
  {
    $this->giftShop = $giftShop;
  }
  public function getGiftShop()
  {
    return $this->giftShop;
  }
  public function setGiftShopException($giftShopException)
  {
    $this->giftShopException = $giftShopException;
  }
  public function getGiftShopException()
  {
    return $this->giftShopException;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LanguageSpoken[]
   */
  public function setLanguagesSpoken($languagesSpoken)
  {
    $this->languagesSpoken = $languagesSpoken;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LanguageSpoken[]
   */
  public function getLanguagesSpoken()
  {
    return $this->languagesSpoken;
  }
  public function setSelfServiceLaundry($selfServiceLaundry)
  {
    $this->selfServiceLaundry = $selfServiceLaundry;
  }
  public function getSelfServiceLaundry()
  {
    return $this->selfServiceLaundry;
  }
  public function setSelfServiceLaundryException($selfServiceLaundryException)
  {
    $this->selfServiceLaundryException = $selfServiceLaundryException;
  }
  public function getSelfServiceLaundryException()
  {
    return $this->selfServiceLaundryException;
  }
  public function setSocialHour($socialHour)
  {
    $this->socialHour = $socialHour;
  }
  public function getSocialHour()
  {
    return $this->socialHour;
  }
  public function setSocialHourException($socialHourException)
  {
    $this->socialHourException = $socialHourException;
  }
  public function getSocialHourException()
  {
    return $this->socialHourException;
  }
  public function setTwentyFourHourFrontDesk($twentyFourHourFrontDesk)
  {
    $this->twentyFourHourFrontDesk = $twentyFourHourFrontDesk;
  }
  public function getTwentyFourHourFrontDesk()
  {
    return $this->twentyFourHourFrontDesk;
  }
  public function setTwentyFourHourFrontDeskException($twentyFourHourFrontDeskException)
  {
    $this->twentyFourHourFrontDeskException = $twentyFourHourFrontDeskException;
  }
  public function getTwentyFourHourFrontDeskException()
  {
    return $this->twentyFourHourFrontDeskException;
  }
  public function setWakeUpCalls($wakeUpCalls)
  {
    $this->wakeUpCalls = $wakeUpCalls;
  }
  public function getWakeUpCalls()
  {
    return $this->wakeUpCalls;
  }
  public function setWakeUpCallsException($wakeUpCallsException)
  {
    $this->wakeUpCallsException = $wakeUpCallsException;
  }
  public function getWakeUpCallsException()
  {
    return $this->wakeUpCallsException;
  }
}
