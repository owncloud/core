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

namespace Google\Service\SecurityCommandCenter;

class ListAssetsResult extends \Google\Model
{
  protected $assetType = Asset::class;
  protected $assetDataType = '';
  public $stateChange;

  /**
   * @param Asset
   */
  public function setAsset(Asset $asset)
  {
    $this->asset = $asset;
  }
  /**
   * @return Asset
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListAssetsResult::class, 'Google_Service_SecurityCommandCenter_ListAssetsResult');
