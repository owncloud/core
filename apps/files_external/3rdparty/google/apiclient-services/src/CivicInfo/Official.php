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

namespace Google\Service\CivicInfo;

class Official extends \Google\Collection
{
  protected $collection_key = 'urls';
  protected $addressType = SimpleAddressType::class;
  protected $addressDataType = 'array';
  protected $channelsType = Channel::class;
  protected $channelsDataType = 'array';
  /**
   * @var string[]
   */
  public $emails;
  protected $geocodingSummariesType = GeocodingSummary::class;
  protected $geocodingSummariesDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $party;
  /**
   * @var string[]
   */
  public $phones;
  /**
   * @var string
   */
  public $photoUrl;
  /**
   * @var string[]
   */
  public $urls;

  /**
   * @param SimpleAddressType[]
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return SimpleAddressType[]
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param Channel[]
   */
  public function setChannels($channels)
  {
    $this->channels = $channels;
  }
  /**
   * @return Channel[]
   */
  public function getChannels()
  {
    return $this->channels;
  }
  /**
   * @param string[]
   */
  public function setEmails($emails)
  {
    $this->emails = $emails;
  }
  /**
   * @return string[]
   */
  public function getEmails()
  {
    return $this->emails;
  }
  /**
   * @param GeocodingSummary[]
   */
  public function setGeocodingSummaries($geocodingSummaries)
  {
    $this->geocodingSummaries = $geocodingSummaries;
  }
  /**
   * @return GeocodingSummary[]
   */
  public function getGeocodingSummaries()
  {
    return $this->geocodingSummaries;
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
  public function setParty($party)
  {
    $this->party = $party;
  }
  /**
   * @return string
   */
  public function getParty()
  {
    return $this->party;
  }
  /**
   * @param string[]
   */
  public function setPhones($phones)
  {
    $this->phones = $phones;
  }
  /**
   * @return string[]
   */
  public function getPhones()
  {
    return $this->phones;
  }
  /**
   * @param string
   */
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  /**
   * @return string
   */
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
  /**
   * @param string[]
   */
  public function setUrls($urls)
  {
    $this->urls = $urls;
  }
  /**
   * @return string[]
   */
  public function getUrls()
  {
    return $this->urls;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Official::class, 'Google_Service_CivicInfo_Official');
