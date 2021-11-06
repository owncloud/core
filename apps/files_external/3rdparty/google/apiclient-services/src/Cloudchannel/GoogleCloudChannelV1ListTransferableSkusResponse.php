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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1ListTransferableSkusResponse extends \Google\Collection
{
  protected $collection_key = 'transferableSkus';
  public $nextPageToken;
  protected $transferableSkusType = GoogleCloudChannelV1TransferableSku::class;
  protected $transferableSkusDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleCloudChannelV1TransferableSku[]
   */
  public function setTransferableSkus($transferableSkus)
  {
    $this->transferableSkus = $transferableSkus;
  }
  /**
   * @return GoogleCloudChannelV1TransferableSku[]
   */
  public function getTransferableSkus()
  {
    return $this->transferableSkus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1ListTransferableSkusResponse::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableSkusResponse');
