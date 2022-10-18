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

class Anchors extends \Google\Collection
{
  protected $collection_key = 'redundantanchorinfo';
  protected $anchorType = AnchorsAnchor::class;
  protected $anchorDataType = 'array';
  /**
   * @var string
   */
  public $homepageAnchorsDropped;
  /**
   * @var int
   */
  public $indexTier;
  /**
   * @var string
   */
  public $localAnchorsDropped;
  /**
   * @var string
   */
  public $nonlocalAnchorsDropped;
  /**
   * @var string
   */
  public $redundantAnchorsDropped;
  protected $redundantanchorinfoType = AnchorsRedundantAnchorInfo::class;
  protected $redundantanchorinfoDataType = 'array';
  /**
   * @var string
   */
  public $supplementalAnchorsDropped;
  /**
   * @var string
   */
  public $targetDocid;
  /**
   * @var string
   */
  public $targetSite;
  /**
   * @var string
   */
  public $targetUrl;

  /**
   * @param AnchorsAnchor[]
   */
  public function setAnchor($anchor)
  {
    $this->anchor = $anchor;
  }
  /**
   * @return AnchorsAnchor[]
   */
  public function getAnchor()
  {
    return $this->anchor;
  }
  /**
   * @param string
   */
  public function setHomepageAnchorsDropped($homepageAnchorsDropped)
  {
    $this->homepageAnchorsDropped = $homepageAnchorsDropped;
  }
  /**
   * @return string
   */
  public function getHomepageAnchorsDropped()
  {
    return $this->homepageAnchorsDropped;
  }
  /**
   * @param int
   */
  public function setIndexTier($indexTier)
  {
    $this->indexTier = $indexTier;
  }
  /**
   * @return int
   */
  public function getIndexTier()
  {
    return $this->indexTier;
  }
  /**
   * @param string
   */
  public function setLocalAnchorsDropped($localAnchorsDropped)
  {
    $this->localAnchorsDropped = $localAnchorsDropped;
  }
  /**
   * @return string
   */
  public function getLocalAnchorsDropped()
  {
    return $this->localAnchorsDropped;
  }
  /**
   * @param string
   */
  public function setNonlocalAnchorsDropped($nonlocalAnchorsDropped)
  {
    $this->nonlocalAnchorsDropped = $nonlocalAnchorsDropped;
  }
  /**
   * @return string
   */
  public function getNonlocalAnchorsDropped()
  {
    return $this->nonlocalAnchorsDropped;
  }
  /**
   * @param string
   */
  public function setRedundantAnchorsDropped($redundantAnchorsDropped)
  {
    $this->redundantAnchorsDropped = $redundantAnchorsDropped;
  }
  /**
   * @return string
   */
  public function getRedundantAnchorsDropped()
  {
    return $this->redundantAnchorsDropped;
  }
  /**
   * @param AnchorsRedundantAnchorInfo[]
   */
  public function setRedundantanchorinfo($redundantanchorinfo)
  {
    $this->redundantanchorinfo = $redundantanchorinfo;
  }
  /**
   * @return AnchorsRedundantAnchorInfo[]
   */
  public function getRedundantanchorinfo()
  {
    return $this->redundantanchorinfo;
  }
  /**
   * @param string
   */
  public function setSupplementalAnchorsDropped($supplementalAnchorsDropped)
  {
    $this->supplementalAnchorsDropped = $supplementalAnchorsDropped;
  }
  /**
   * @return string
   */
  public function getSupplementalAnchorsDropped()
  {
    return $this->supplementalAnchorsDropped;
  }
  /**
   * @param string
   */
  public function setTargetDocid($targetDocid)
  {
    $this->targetDocid = $targetDocid;
  }
  /**
   * @return string
   */
  public function getTargetDocid()
  {
    return $this->targetDocid;
  }
  /**
   * @param string
   */
  public function setTargetSite($targetSite)
  {
    $this->targetSite = $targetSite;
  }
  /**
   * @return string
   */
  public function getTargetSite()
  {
    return $this->targetSite;
  }
  /**
   * @param string
   */
  public function setTargetUrl($targetUrl)
  {
    $this->targetUrl = $targetUrl;
  }
  /**
   * @return string
   */
  public function getTargetUrl()
  {
    return $this->targetUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Anchors::class, 'Google_Service_Contentwarehouse_Anchors');
