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

class Google_Service_PolyService_StartAssetImportResponse extends Google_Collection
{
  protected $collection_key = 'assetImportMessages';
  public $assetId;
  public $assetImportId;
  protected $assetImportMessagesType = 'Google_Service_PolyService_AssetImportMessage';
  protected $assetImportMessagesDataType = 'array';
  public $publishUrl;

  public function setAssetId($assetId)
  {
    $this->assetId = $assetId;
  }
  public function getAssetId()
  {
    return $this->assetId;
  }
  public function setAssetImportId($assetImportId)
  {
    $this->assetImportId = $assetImportId;
  }
  public function getAssetImportId()
  {
    return $this->assetImportId;
  }
  /**
   * @param Google_Service_PolyService_AssetImportMessage
   */
  public function setAssetImportMessages($assetImportMessages)
  {
    $this->assetImportMessages = $assetImportMessages;
  }
  /**
   * @return Google_Service_PolyService_AssetImportMessage
   */
  public function getAssetImportMessages()
  {
    return $this->assetImportMessages;
  }
  public function setPublishUrl($publishUrl)
  {
    $this->publishUrl = $publishUrl;
  }
  public function getPublishUrl()
  {
    return $this->publishUrl;
  }
}
