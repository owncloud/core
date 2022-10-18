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

class QualityPreviewSnippetExperimentalFeatures extends \Google\Model
{
  /**
   * @var bool
   */
  public $isLikelyHomepage;
  /**
   * @var string
   */
  public $numQueryItems;
  /**
   * @var string
   */
  public $numTidbits;
  /**
   * @var string
   */
  public $numVisibleTokens;
  protected $radishType = QualityPreviewSnippetRadishFeatures::class;
  protected $radishDataType = '';

  /**
   * @param bool
   */
  public function setIsLikelyHomepage($isLikelyHomepage)
  {
    $this->isLikelyHomepage = $isLikelyHomepage;
  }
  /**
   * @return bool
   */
  public function getIsLikelyHomepage()
  {
    return $this->isLikelyHomepage;
  }
  /**
   * @param string
   */
  public function setNumQueryItems($numQueryItems)
  {
    $this->numQueryItems = $numQueryItems;
  }
  /**
   * @return string
   */
  public function getNumQueryItems()
  {
    return $this->numQueryItems;
  }
  /**
   * @param string
   */
  public function setNumTidbits($numTidbits)
  {
    $this->numTidbits = $numTidbits;
  }
  /**
   * @return string
   */
  public function getNumTidbits()
  {
    return $this->numTidbits;
  }
  /**
   * @param string
   */
  public function setNumVisibleTokens($numVisibleTokens)
  {
    $this->numVisibleTokens = $numVisibleTokens;
  }
  /**
   * @return string
   */
  public function getNumVisibleTokens()
  {
    return $this->numVisibleTokens;
  }
  /**
   * @param QualityPreviewSnippetRadishFeatures
   */
  public function setRadish(QualityPreviewSnippetRadishFeatures $radish)
  {
    $this->radish = $radish;
  }
  /**
   * @return QualityPreviewSnippetRadishFeatures
   */
  public function getRadish()
  {
    return $this->radish;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewSnippetExperimentalFeatures::class, 'Google_Service_Contentwarehouse_QualityPreviewSnippetExperimentalFeatures');
