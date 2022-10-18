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

class GeostoreEstablishmentProto extends \Google\Collection
{
  protected $collection_key = 'telephone';
  protected $bizbuilderReferenceType = GeostoreBizBuilderReferenceProto::class;
  protected $bizbuilderReferenceDataType = '';
  protected $hoursType = GeostoreTimeScheduleProto::class;
  protected $hoursDataType = '';
  protected $openingHoursType = GeostoreOpeningHoursProto::class;
  protected $openingHoursDataType = '';
  protected $priceInfoType = GeostorePriceInfoProto::class;
  protected $priceInfoDataType = '';
  protected $serviceAreaType = GeostoreServiceAreaProto::class;
  protected $serviceAreaDataType = '';
  protected $telephoneType = GeostoreTelephoneProto::class;
  protected $telephoneDataType = 'array';
  /**
   * @var string
   */
  public $type;

  /**
   * @param GeostoreBizBuilderReferenceProto
   */
  public function setBizbuilderReference(GeostoreBizBuilderReferenceProto $bizbuilderReference)
  {
    $this->bizbuilderReference = $bizbuilderReference;
  }
  /**
   * @return GeostoreBizBuilderReferenceProto
   */
  public function getBizbuilderReference()
  {
    return $this->bizbuilderReference;
  }
  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setHours(GeostoreTimeScheduleProto $hours)
  {
    $this->hours = $hours;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getHours()
  {
    return $this->hours;
  }
  /**
   * @param GeostoreOpeningHoursProto
   */
  public function setOpeningHours(GeostoreOpeningHoursProto $openingHours)
  {
    $this->openingHours = $openingHours;
  }
  /**
   * @return GeostoreOpeningHoursProto
   */
  public function getOpeningHours()
  {
    return $this->openingHours;
  }
  /**
   * @param GeostorePriceInfoProto
   */
  public function setPriceInfo(GeostorePriceInfoProto $priceInfo)
  {
    $this->priceInfo = $priceInfo;
  }
  /**
   * @return GeostorePriceInfoProto
   */
  public function getPriceInfo()
  {
    return $this->priceInfo;
  }
  /**
   * @param GeostoreServiceAreaProto
   */
  public function setServiceArea(GeostoreServiceAreaProto $serviceArea)
  {
    $this->serviceArea = $serviceArea;
  }
  /**
   * @return GeostoreServiceAreaProto
   */
  public function getServiceArea()
  {
    return $this->serviceArea;
  }
  /**
   * @param GeostoreTelephoneProto[]
   */
  public function setTelephone($telephone)
  {
    $this->telephone = $telephone;
  }
  /**
   * @return GeostoreTelephoneProto[]
   */
  public function getTelephone()
  {
    return $this->telephone;
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
class_alias(GeostoreEstablishmentProto::class, 'Google_Service_Contentwarehouse_GeostoreEstablishmentProto');
