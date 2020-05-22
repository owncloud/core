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

class Google_Service_SecurityCommandCenter_ListAssetsResult extends Google_Model
{
  protected $assetType = 'Google_Service_SecurityCommandCenter_Asset';
  protected $assetDataType = '';
  public $stateChange;

  /**
   * @param Google_Service_SecurityCommandCenter_Asset
   */
  public function setAsset(Google_Service_SecurityCommandCenter_Asset $asset)
  {
    $this->asset = $asset;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_Asset
   */
  public function getAsset()
  {
    return $this->asset;
  }
  public function setStateChange($stateChange)
  {
    $this->stateChange = $stateChange;
  }
  public function getStateChange()
  {
    return $this->stateChange;
  }
}
