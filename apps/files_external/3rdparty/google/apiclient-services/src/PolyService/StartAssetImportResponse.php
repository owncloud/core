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

namespace Google\Service\PolyService;

class StartAssetImportResponse extends \Google\Collection
{
  protected $collection_key = 'assetImportMessages';
  /**
   * @var string
   */
  public $assetId;
  /**
   * @var string
   */
  public $assetImportId;
  protected $assetImportMessagesType = AssetImportMessage::class;
  protected $assetImportMessagesDataType = 'array';
  /**
   * @var string
   */
  public $publishUrl;

  /**
   * @param string
   */
  public function setAssetId($assetId)
  {
    $this->assetId = $assetId;
  }
  /**
   * @return string
   */
  public function getAssetId()
  {
    return $this->assetId;
  }
  /**
   * @param string
   */
  public function setAssetImportId($assetImportId)
  {
    $this->assetImportId = $assetImportId;
  }
  /**
   * @return string
   */
  public function getAssetImportId()
  {
    return $this->assetImportId;
  }
  /**
   * @param AssetImportMessage[]
   */
  public function setAssetImportMessages($assetImportMessages)
  {
    $this->assetImportMessages = $assetImportMessages;
  }
  /**
   * @return AssetImportMessage[]
   */
  public function getAssetImportMessages()
  {
    return $this->assetImportMessages;
  }
  /**
   * @param string
   */
  public function setPublishUrl($publishUrl)
  {
    $this->publishUrl = $publishUrl;
  }
  /**
   * @return string
   */
  public function getPublishUrl()
  {
    return $this->publishUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StartAssetImportResponse::class, 'Google_Service_PolyService_StartAssetImportResponse');
