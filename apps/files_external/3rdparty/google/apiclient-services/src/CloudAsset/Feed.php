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

namespace Google\Service\CloudAsset;

class Feed extends \Google\Collection
{
  protected $collection_key = 'relationshipTypes';
  /**
   * @var string[]
   */
  public $assetNames;
  /**
   * @var string[]
   */
  public $assetTypes;
  protected $conditionType = Expr::class;
  protected $conditionDataType = '';
  /**
   * @var string
   */
  public $contentType;
  protected $feedOutputConfigType = FeedOutputConfig::class;
  protected $feedOutputConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $relationshipTypes;

  /**
   * @param string[]
   */
  public function setAssetNames($assetNames)
  {
    $this->assetNames = $assetNames;
  }
  /**
   * @return string[]
   */
  public function getAssetNames()
  {
    return $this->assetNames;
  }
  /**
   * @param string[]
   */
  public function setAssetTypes($assetTypes)
  {
    $this->assetTypes = $assetTypes;
  }
  /**
   * @return string[]
   */
  public function getAssetTypes()
  {
    return $this->assetTypes;
  }
  /**
   * @param Expr
   */
  public function setCondition(Expr $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return Expr
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param FeedOutputConfig
   */
  public function setFeedOutputConfig(FeedOutputConfig $feedOutputConfig)
  {
    $this->feedOutputConfig = $feedOutputConfig;
  }
  /**
   * @return FeedOutputConfig
   */
  public function getFeedOutputConfig()
  {
    return $this->feedOutputConfig;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setRelationshipTypes($relationshipTypes)
  {
    $this->relationshipTypes = $relationshipTypes;
  }
  /**
   * @return string[]
   */
  public function getRelationshipTypes()
  {
    return $this->relationshipTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Feed::class, 'Google_Service_CloudAsset_Feed');
