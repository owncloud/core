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

class ResearchScienceSearchReplica extends \Google\Model
{
  /**
   * @var string
   */
  public $catalogName;
  /**
   * @var string
   */
  public $catalogUrl;
  /**
   * @var int
   */
  public $indexInCluster;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setCatalogName($catalogName)
  {
    $this->catalogName = $catalogName;
  }
  /**
   * @return string
   */
  public function getCatalogName()
  {
    return $this->catalogName;
  }
  /**
   * @param string
   */
  public function setCatalogUrl($catalogUrl)
  {
    $this->catalogUrl = $catalogUrl;
  }
  /**
   * @return string
   */
  public function getCatalogUrl()
  {
    return $this->catalogUrl;
  }
  /**
   * @param int
   */
  public function setIndexInCluster($indexInCluster)
  {
    $this->indexInCluster = $indexInCluster;
  }
  /**
   * @return int
   */
  public function getIndexInCluster()
  {
    return $this->indexInCluster;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchReplica::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchReplica');
