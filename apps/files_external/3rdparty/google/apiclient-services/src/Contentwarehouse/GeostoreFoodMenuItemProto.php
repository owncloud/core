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

class GeostoreFoodMenuItemProto extends \Google\Collection
{
  protected $collection_key = 'nameInfo';
  protected $itemOptionType = GeostoreFoodMenuItemOptionProto::class;
  protected $itemOptionDataType = 'array';
  protected $nameInfoType = GeostorePriceListNameInfoProto::class;
  protected $nameInfoDataType = 'array';

  /**
   * @param GeostoreFoodMenuItemOptionProto[]
   */
  public function setItemOption($itemOption)
  {
    $this->itemOption = $itemOption;
  }
  /**
   * @return GeostoreFoodMenuItemOptionProto[]
   */
  public function getItemOption()
  {
    return $this->itemOption;
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
class_alias(GeostoreFoodMenuItemProto::class, 'Google_Service_Contentwarehouse_GeostoreFoodMenuItemProto');
