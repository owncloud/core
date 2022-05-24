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

namespace Google\Service\ShoppingContent;

class DatafeedsCustomBatchRequestEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $batchId;
  protected $datafeedType = Datafeed::class;
  protected $datafeedDataType = '';
  /**
   * @var string
   */
  public $datafeedId;
  /**
   * @var string
   */
  public $merchantId;
  /**
   * @var string
   */
  public $method;

  /**
   * @param string
   */
  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  /**
   * @return string
   */
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param Datafeed
   */
  public function setDatafeed(Datafeed $datafeed)
  {
    $this->datafeed = $datafeed;
  }
  /**
   * @return Datafeed
   */
  public function getDatafeed()
  {
    return $this->datafeed;
  }
  /**
   * @param string
   */
  public function setDatafeedId($datafeedId)
  {
    $this->datafeedId = $datafeedId;
  }
  /**
   * @return string
   */
  public function getDatafeedId()
  {
    return $this->datafeedId;
  }
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatafeedsCustomBatchRequestEntry::class, 'Google_Service_ShoppingContent_DatafeedsCustomBatchRequestEntry');
