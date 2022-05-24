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

namespace Google\Service\RealTimeBidding;

class Endpoint extends \Google\Model
{
  /**
   * @var string
   */
  public $bidProtocol;
  /**
   * @var string
   */
  public $maximumQps;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $tradingLocation;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setBidProtocol($bidProtocol)
  {
    $this->bidProtocol = $bidProtocol;
  }
  /**
   * @return string
   */
  public function getBidProtocol()
  {
    return $this->bidProtocol;
  }
  /**
   * @param string
   */
  public function setMaximumQps($maximumQps)
  {
    $this->maximumQps = $maximumQps;
  }
  /**
   * @return string
   */
  public function getMaximumQps()
  {
    return $this->maximumQps;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setTradingLocation($tradingLocation)
  {
    $this->tradingLocation = $tradingLocation;
  }
  /**
   * @return string
   */
  public function getTradingLocation()
  {
    return $this->tradingLocation;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Endpoint::class, 'Google_Service_RealTimeBidding_Endpoint');
