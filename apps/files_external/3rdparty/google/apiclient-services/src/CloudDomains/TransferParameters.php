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

namespace Google\Service\CloudDomains;

class TransferParameters extends \Google\Collection
{
  protected $collection_key = 'supportedPrivacy';
  public $currentRegistrar;
  public $domainName;
  public $nameServers;
  public $supportedPrivacy;
  public $transferLockState;
  protected $yearlyPriceType = Money::class;
  protected $yearlyPriceDataType = '';

  public function setCurrentRegistrar($currentRegistrar)
  {
    $this->currentRegistrar = $currentRegistrar;
  }
  public function getCurrentRegistrar()
  {
    return $this->currentRegistrar;
  }
  public function setDomainName($domainName)
  {
    $this->domainName = $domainName;
  }
  public function getDomainName()
  {
    return $this->domainName;
  }
  public function setNameServers($nameServers)
  {
    $this->nameServers = $nameServers;
  }
  public function getNameServers()
  {
    return $this->nameServers;
  }
  public function setSupportedPrivacy($supportedPrivacy)
  {
    $this->supportedPrivacy = $supportedPrivacy;
  }
  public function getSupportedPrivacy()
  {
    return $this->supportedPrivacy;
  }
  public function setTransferLockState($transferLockState)
  {
    $this->transferLockState = $transferLockState;
  }
  public function getTransferLockState()
  {
    return $this->transferLockState;
  }
  /**
   * @param Money
   */
  public function setYearlyPrice(Money $yearlyPrice)
  {
    $this->yearlyPrice = $yearlyPrice;
  }
  /**
   * @return Money
   */
  public function getYearlyPrice()
  {
    return $this->yearlyPrice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferParameters::class, 'Google_Service_CloudDomains_TransferParameters');
