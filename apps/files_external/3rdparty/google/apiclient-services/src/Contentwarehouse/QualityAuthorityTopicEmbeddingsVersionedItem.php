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

class QualityAuthorityTopicEmbeddingsVersionedItem extends \Google\Model
{
  /**
   * @var string
   */
  public $pageEmbedding;
  /**
   * @var string
   */
  public $siteEmbedding;
  /**
   * @var float
   */
  public $siteFocusScore;
  /**
   * @var float
   */
  public $siteRadius;
  /**
   * @var int
   */
  public $versionId;

  /**
   * @param string
   */
  public function setPageEmbedding($pageEmbedding)
  {
    $this->pageEmbedding = $pageEmbedding;
  }
  /**
   * @return string
   */
  public function getPageEmbedding()
  {
    return $this->pageEmbedding;
  }
  /**
   * @param string
   */
  public function setSiteEmbedding($siteEmbedding)
  {
    $this->siteEmbedding = $siteEmbedding;
  }
  /**
   * @return string
   */
  public function getSiteEmbedding()
  {
    return $this->siteEmbedding;
  }
  /**
   * @param float
   */
  public function setSiteFocusScore($siteFocusScore)
  {
    $this->siteFocusScore = $siteFocusScore;
  }
  /**
   * @return float
   */
  public function getSiteFocusScore()
  {
    return $this->siteFocusScore;
  }
  /**
   * @param float
   */
  public function setSiteRadius($siteRadius)
  {
    $this->siteRadius = $siteRadius;
  }
  /**
   * @return float
   */
  public function getSiteRadius()
  {
    return $this->siteRadius;
  }
  /**
   * @param int
   */
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  /**
   * @return int
   */
  public function getVersionId()
  {
    return $this->versionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityAuthorityTopicEmbeddingsVersionedItem::class, 'Google_Service_Contentwarehouse_QualityAuthorityTopicEmbeddingsVersionedItem');
