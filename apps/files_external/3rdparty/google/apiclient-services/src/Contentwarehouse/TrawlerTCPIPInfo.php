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

class TrawlerTCPIPInfo extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "destinationIPAddressPacked" => "DestinationIPAddressPacked",
        "destinationPort" => "DestinationPort",
        "sourceIPAddressPacked" => "SourceIPAddressPacked",
        "sourcePort" => "SourcePort",
  ];
  /**
   * @var string
   */
  public $destinationIPAddressPacked;
  /**
   * @var int
   */
  public $destinationPort;
  /**
   * @var string
   */
  public $sourceIPAddressPacked;
  /**
   * @var int
   */
  public $sourcePort;

  /**
   * @param string
   */
  public function setDestinationIPAddressPacked($destinationIPAddressPacked)
  {
    $this->destinationIPAddressPacked = $destinationIPAddressPacked;
  }
  /**
   * @return string
   */
  public function getDestinationIPAddressPacked()
  {
    return $this->destinationIPAddressPacked;
  }
  /**
   * @param int
   */
  public function setDestinationPort($destinationPort)
  {
    $this->destinationPort = $destinationPort;
  }
  /**
   * @return int
   */
  public function getDestinationPort()
  {
    return $this->destinationPort;
  }
  /**
   * @param string
   */
  public function setSourceIPAddressPacked($sourceIPAddressPacked)
  {
    $this->sourceIPAddressPacked = $sourceIPAddressPacked;
  }
  /**
   * @return string
   */
  public function getSourceIPAddressPacked()
  {
    return $this->sourceIPAddressPacked;
  }
  /**
   * @param int
   */
  public function setSourcePort($sourcePort)
  {
    $this->sourcePort = $sourcePort;
  }
  /**
   * @return int
   */
  public function getSourcePort()
  {
    return $this->sourcePort;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerTCPIPInfo::class, 'Google_Service_Contentwarehouse_TrawlerTCPIPInfo');
