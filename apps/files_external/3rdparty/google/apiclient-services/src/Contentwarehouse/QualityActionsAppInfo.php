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

class QualityActionsAppInfo extends \Google\Collection
{
  protected $collection_key = 'sourceData';
  /**
   * @var string[]
   */
  public $androidIntent;
  /**
   * @var string
   */
  public $appName;
  protected $categoryType = QualityActionsAppUnderstandingCategory::class;
  protected $categoryDataType = '';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $fallbackUrl;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string
   */
  public $source;
  protected $sourceDataType = QualityActionsAppInfoSourceData::class;
  protected $sourceDataDataType = 'array';

  /**
   * @param string[]
   */
  public function setAndroidIntent($androidIntent)
  {
    $this->androidIntent = $androidIntent;
  }
  /**
   * @return string[]
   */
  public function getAndroidIntent()
  {
    return $this->androidIntent;
  }
  /**
   * @param string
   */
  public function setAppName($appName)
  {
    $this->appName = $appName;
  }
  /**
   * @return string
   */
  public function getAppName()
  {
    return $this->appName;
  }
  /**
   * @param QualityActionsAppUnderstandingCategory
   */
  public function setCategory(QualityActionsAppUnderstandingCategory $category)
  {
    $this->category = $category;
  }
  /**
   * @return QualityActionsAppUnderstandingCategory
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setFallbackUrl($fallbackUrl)
  {
    $this->fallbackUrl = $fallbackUrl;
  }
  /**
   * @return string
   */
  public function getFallbackUrl()
  {
    return $this->fallbackUrl;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param QualityActionsAppInfoSourceData[]
   */
  public function setSourceData($sourceData)
  {
    $this->sourceData = $sourceData;
  }
  /**
   * @return QualityActionsAppInfoSourceData[]
   */
  public function getSourceData()
  {
    return $this->sourceData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsAppInfo::class, 'Google_Service_Contentwarehouse_QualityActionsAppInfo');
