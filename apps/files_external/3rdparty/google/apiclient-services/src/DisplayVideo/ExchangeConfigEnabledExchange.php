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

namespace Google\Service\DisplayVideo;

class ExchangeConfigEnabledExchange extends \Google\Model
{
  public $exchange;
  public $googleAdManagerAgencyId;
  public $googleAdManagerBuyerNetworkId;
  public $seatId;

  public function setExchange($exchange)
  {
    $this->exchange = $exchange;
  }
  public function getExchange()
  {
    return $this->exchange;
  }
  public function setGoogleAdManagerAgencyId($googleAdManagerAgencyId)
  {
    $this->googleAdManagerAgencyId = $googleAdManagerAgencyId;
  }
  public function getGoogleAdManagerAgencyId()
  {
    return $this->googleAdManagerAgencyId;
  }
  public function setGoogleAdManagerBuyerNetworkId($googleAdManagerBuyerNetworkId)
  {
    $this->googleAdManagerBuyerNetworkId = $googleAdManagerBuyerNetworkId;
  }
  public function getGoogleAdManagerBuyerNetworkId()
  {
    return $this->googleAdManagerBuyerNetworkId;
  }
  public function setSeatId($seatId)
  {
    $this->seatId = $seatId;
  }
  public function getSeatId()
  {
    return $this->seatId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExchangeConfigEnabledExchange::class, 'Google_Service_DisplayVideo_ExchangeConfigEnabledExchange');
