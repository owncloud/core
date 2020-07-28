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

class Google_Service_CloudAsset_Feed extends Google_Collection
{
  protected $collection_key = 'assetTypes';
  public $assetNames;
  public $assetTypes;
  protected $conditionType = 'Google_Service_CloudAsset_Expr';
  protected $conditionDataType = '';
  public $contentType;
  protected $feedOutputConfigType = 'Google_Service_CloudAsset_FeedOutputConfig';
  protected $feedOutputConfigDataType = '';
  public $name;

  public function setAssetNames($assetNames)
  {
    $this->assetNames = $assetNames;
  }
  public function getAssetNames()
  {
    return $this->assetNames;
  }
  public function setAssetTypes($assetTypes)
  {
    $this->assetTypes = $assetTypes;
  }
  public function getAssetTypes()
  {
    return $this->assetTypes;
  }
  /**
   * @param Google_Service_CloudAsset_Expr
   */
  public function setCondition(Google_Service_CloudAsset_Expr $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return Google_Service_CloudAsset_Expr
   */
  public function getCondition()
  {
    return $this->condition;
  }
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param Google_Service_CloudAsset_FeedOutputConfig
   */
  public function setFeedOutputConfig(Google_Service_CloudAsset_FeedOutputConfig $feedOutputConfig)
  {
    $this->feedOutputConfig = $feedOutputConfig;
  }
  /**
   * @return Google_Service_CloudAsset_FeedOutputConfig
   */
  public function getFeedOutputConfig()
  {
    return $this->feedOutputConfig;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
