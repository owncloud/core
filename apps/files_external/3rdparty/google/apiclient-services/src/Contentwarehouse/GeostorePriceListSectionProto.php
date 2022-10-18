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

class GeostorePriceListSectionProto extends \Google\Collection
{
  protected $collection_key = 'nameInfo';
  protected $callToActionType = GeostoreCallToActionProto::class;
  protected $callToActionDataType = '';
  protected $foodItemType = GeostoreFoodMenuItemProto::class;
  protected $foodItemDataType = 'array';
  protected $itemDataType = 'array';
  /**
   * @var string[]
   */
  public $itemType;
  protected $mediaType = GeostoreMediaItemProto::class;
  protected $mediaDataType = 'array';
  protected $nameInfoType = GeostorePriceListNameInfoProto::class;
  protected $nameInfoDataType = 'array';

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
   * @param GeostoreFoodMenuItemProto[]
   */
  public function setFoodItem($foodItem)
  {
    $this->foodItem = $foodItem;
  }
  /**
   * @return GeostoreFoodMenuItemProto[]
   */
  public function getFoodItem()
  {
    return $this->foodItem;
  }
  /**
   * @param GeostoreComposableItemProto[]
   */
  public function setItem($item)
  {
    $this->item = $item;
  }
  /**
   * @return GeostoreComposableItemProto[]
   */
  public function getItem()
  {
    return $this->item;
  }
  /**
   * @param string[]
   */
  public function setItemType($itemType)
  {
    $this->itemType = $itemType;
  }
  /**
   * @return string[]
   */
  public function getItemType()
  {
    return $this->itemType;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePriceListSectionProto::class, 'Google_Service_Contentwarehouse_GeostorePriceListSectionProto');
