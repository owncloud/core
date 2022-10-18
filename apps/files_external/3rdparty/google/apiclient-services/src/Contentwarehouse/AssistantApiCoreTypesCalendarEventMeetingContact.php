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

class AssistantApiCoreTypesCalendarEventMeetingContact extends \Google\Collection
{
  protected $collection_key = 'dialInNumberClasses';
  /**
   * @var string
   */
  public $conferenceId;
  /**
   * @var string[]
   */
  public $dialInNumberClasses;
  /**
   * @var string
   */
  public $phoneNumberUri;
  /**
   * @var string
   */
  public $pinNumber;
  protected $providerType = AssistantApiCoreTypesProvider::class;
  protected $providerDataType = '';
  /**
   * @var string
   */
  public $regionCode;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $universalPinNumber;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setConferenceId($conferenceId)
  {
    $this->conferenceId = $conferenceId;
  }
  /**
   * @return string
   */
  public function getConferenceId()
  {
    return $this->conferenceId;
  }
  /**
   * @param string[]
   */
  public function setDialInNumberClasses($dialInNumberClasses)
  {
    $this->dialInNumberClasses = $dialInNumberClasses;
  }
  /**
   * @return string[]
   */
  public function getDialInNumberClasses()
  {
    return $this->dialInNumberClasses;
  }
  /**
   * @param string
   */
  public function setPhoneNumberUri($phoneNumberUri)
  {
    $this->phoneNumberUri = $phoneNumberUri;
  }
  /**
   * @return string
   */
  public function getPhoneNumberUri()
  {
    return $this->phoneNumberUri;
  }
  /**
   * @param string
   */
  public function setPinNumber($pinNumber)
  {
    $this->pinNumber = $pinNumber;
  }
  /**
   * @return string
   */
  public function getPinNumber()
  {
    return $this->pinNumber;
  }
  /**
   * @param AssistantApiCoreTypesProvider
   */
  public function setProvider(AssistantApiCoreTypesProvider $provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return AssistantApiCoreTypesProvider
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setUniversalPinNumber($universalPinNumber)
  {
    $this->universalPinNumber = $universalPinNumber;
  }
  /**
   * @return string
   */
  public function getUniversalPinNumber()
  {
    return $this->universalPinNumber;
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
class_alias(AssistantApiCoreTypesCalendarEventMeetingContact::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesCalendarEventMeetingContact');
