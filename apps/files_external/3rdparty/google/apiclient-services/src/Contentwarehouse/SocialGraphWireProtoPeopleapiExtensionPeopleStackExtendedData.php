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

class SocialGraphWireProtoPeopleapiExtensionPeopleStackExtendedData extends \Google\Collection
{
  protected $collection_key = 'hiddenKeys';
  /**
   * @var string
   */
  public $familyStatus;
  protected $hiddenKeysType = SocialDiscoveryExternalEntityKey::class;
  protected $hiddenKeysDataType = 'array';
  /**
   * @var string
   */
  public $hideType;

  /**
   * @param string
   */
  public function setFamilyStatus($familyStatus)
  {
    $this->familyStatus = $familyStatus;
  }
  /**
   * @return string
   */
  public function getFamilyStatus()
  {
    return $this->familyStatus;
  }
  /**
   * @param SocialDiscoveryExternalEntityKey[]
   */
  public function setHiddenKeys($hiddenKeys)
  {
    $this->hiddenKeys = $hiddenKeys;
  }
  /**
   * @return SocialDiscoveryExternalEntityKey[]
   */
  public function getHiddenKeys()
  {
    return $this->hiddenKeys;
  }
  /**
   * @param string
   */
  public function setHideType($hideType)
  {
    $this->hideType = $hideType;
  }
  /**
   * @return string
   */
  public function getHideType()
  {
    return $this->hideType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphWireProtoPeopleapiExtensionPeopleStackExtendedData::class, 'Google_Service_Contentwarehouse_SocialGraphWireProtoPeopleapiExtensionPeopleStackExtendedData');
