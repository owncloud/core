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

class GeostorePriceInfoProto extends \Google\Collection
{
  protected $collection_key = 'priceListUrl';
  protected $priceListType = GeostorePriceListProto::class;
  protected $priceListDataType = 'array';
  protected $priceListUrlType = GeostoreUrlListProto::class;
  protected $priceListUrlDataType = 'array';
  protected $statusType = GeostorePriceInfoStatus::class;
  protected $statusDataType = '';

  /**
   * @param GeostorePriceListProto[]
   */
  public function setPriceList($priceList)
  {
    $this->priceList = $priceList;
  }
  /**
   * @return GeostorePriceListProto[]
   */
  public function getPriceList()
  {
    return $this->priceList;
  }
  /**
   * @param GeostoreUrlListProto[]
   */
  public function setPriceListUrl($priceListUrl)
  {
    $this->priceListUrl = $priceListUrl;
  }
  /**
   * @return GeostoreUrlListProto[]
   */
  public function getPriceListUrl()
  {
    return $this->priceListUrl;
  }
  /**
   * @param GeostorePriceInfoStatus
   */
  public function setStatus(GeostorePriceInfoStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GeostorePriceInfoStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePriceInfoProto::class, 'Google_Service_Contentwarehouse_GeostorePriceInfoProto');
