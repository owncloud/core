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

class GeostoreComposableItemProto extends \Google\Collection
{
  protected $collection_key = 'nameInfo';
  protected $callToActionType = GeostoreCallToActionProto::class;
  protected $callToActionDataType = '';
  protected $jobMetadataType = GeostoreJobMetadata::class;
  protected $jobMetadataDataType = '';
  protected $mediaType = GeostoreMediaItemProto::class;
  protected $mediaDataType = 'array';
  protected $nameInfoType = GeostorePriceListNameInfoProto::class;
  protected $nameInfoDataType = 'array';
  /**
   * @var string
   */
  public $offered;
  protected $priceType = GeostorePriceRangeProto::class;
  protected $priceDataType = '';

  /**
   * @param GeostoreCallToActionProto
   */
  public function setCallToAction(GeostoreCallToActionProto $callToAction)
  {
    $this->callToAction = $callToAction;
  }
  /**
   * @return GeostoreCallToActionProto
   */
  public function getCallToAction()
  {
    return $this->callToAction;
  }
  /**
   * @param GeostoreJobMetadata
   */
  public function setJobMetadata(GeostoreJobMetadata $jobMetadata)
  {
    $this->jobMetadata = $jobMetadata;
  }
  /**
   * @return GeostoreJobMetadata
   */
  public function getJobMetadata()
  {
    return $this->jobMetadata;
  }
  /**
   * @param GeostoreMediaItemProto[]
   */
  public function setMedia($media)
  {
    $this->media = $media;
  }
  /**
   * @return GeostoreMediaItemProto[]
   */
  public function getMedia()
  {
    return $this->media;
  }
  /**
   * @param GeostorePriceListNameInfoProto[]
   */
  public function setNameInfo($nameInfo)
  {
    $this->nameInfo = $nameInfo;
  }
  /**
   * @return GeostorePriceListNameInfoProto[]
   */
  public function getNameInfo()
  {
    return $this->nameInfo;
  }
  /**
   * @param string
   */
  public function setOffered($offered)
  {
    $this->offered = $offered;
  }
  /**
   * @return string
   */
  public function getOffered()
  {
    return $this->offered;
  }
  /**
   * @param GeostorePriceRangeProto
   */
  public function setPrice(GeostorePriceRangeProto $price)
  {
    $this->price = $price;
  }
  /**
   * @return GeostorePriceRangeProto
   */
  public function getPrice()
  {
    return $this->price;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreComposableItemProto::class, 'Google_Service_Contentwarehouse_GeostoreComposableItemProto');
