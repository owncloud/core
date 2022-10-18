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

class GeostoreTelephoneProto extends \Google\Collection
{
  protected $collection_key = 'serviceLocationFeature';
  protected $callRateType = GeostorePriceRangeProto::class;
  protected $callRateDataType = 'array';
  /**
   * @var string
   */
  public $contactCategory;
  /**
   * @var string[]
   */
  public $flag;
  /**
   * @var bool
   */
  public $isSharedNumber;
  protected $labelType = GeostoreNameProto::class;
  protected $labelDataType = 'array';
  /**
   * @var string[]
   */
  public $language;
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $numberType = TelephoneNumber::class;
  protected $numberDataType = '';
  protected $phoneNumberType = I18nPhonenumbersPhoneNumber::class;
  protected $phoneNumberDataType = '';
  protected $serviceLocationFeatureType = GeostoreFeatureIdProto::class;
  protected $serviceLocationFeatureDataType = 'array';
  /**
   * @var string
   */
  public $type;

  /**
   * @param GeostorePriceRangeProto[]
   */
  public function setCallRate($callRate)
  {
    $this->callRate = $callRate;
  }
  /**
   * @return GeostorePriceRangeProto[]
   */
  public function getCallRate()
  {
    return $this->callRate;
  }
  /**
   * @param string
   */
  public function setContactCategory($contactCategory)
  {
    $this->contactCategory = $contactCategory;
  }
  /**
   * @return string
   */
  public function getContactCategory()
  {
    return $this->contactCategory;
  }
  /**
   * @param string[]
   */
  public function setFlag($flag)
  {
    $this->flag = $flag;
  }
  /**
   * @return string[]
   */
  public function getFlag()
  {
    return $this->flag;
  }
  /**
   * @param bool
   */
  public function setIsSharedNumber($isSharedNumber)
  {
    $this->isSharedNumber = $isSharedNumber;
  }
  /**
   * @return bool
   */
  public function getIsSharedNumber()
  {
    return $this->isSharedNumber;
  }
  /**
   * @param GeostoreNameProto[]
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return GeostoreNameProto[]
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string[]
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string[]
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param TelephoneNumber
   */
  public function setNumber(TelephoneNumber $number)
  {
    $this->number = $number;
  }
  /**
   * @return TelephoneNumber
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param I18nPhonenumbersPhoneNumber
   */
  public function setPhoneNumber(I18nPhonenumbersPhoneNumber $phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return I18nPhonenumbersPhoneNumber
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setServiceLocationFeature($serviceLocationFeature)
  {
    $this->serviceLocationFeature = $serviceLocationFeature;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getServiceLocationFeature()
  {
    return $this->serviceLocationFeature;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreTelephoneProto::class, 'Google_Service_Contentwarehouse_GeostoreTelephoneProto');
