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

class ImageExactBoostNavQuery extends \Google\Collection
{
  protected $collection_key = 'referrerDocid';
  /**
   * @var int
   */
  public $confidence;
  /**
   * @var int
   */
  public $imageClickRank;
  /**
   * @var string
   */
  public $navFp;
  /**
   * @var string
   */
  public $navQuery;
  /**
   * @var string[]
   */
  public $referrerDocid;
  /**
   * @var int
   */
  public $referrerRank;

  /**
   * @param int
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return int
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param int
   */
  public function setImageClickRank($imageClickRank)
  {
    $this->imageClickRank = $imageClickRank;
  }
  /**
   * @return int
   */
  public function getImageClickRank()
  {
    return $this->imageClickRank;
  }
  /**
   * @param string
   */
  public function setNavFp($navFp)
  {
    $this->navFp = $navFp;
  }
  /**
   * @return string
   */
  public function getNavFp()
  {
    return $this->navFp;
  }
  /**
   * @param string
   */
  public function setNavQuery($navQuery)
  {
    $this->navQuery = $navQuery;
  }
  /**
   * @return string
   */
  public function getNavQuery()
  {
    return $this->navQuery;
  }
  /**
   * @param string[]
   */
  public function setReferrerDocid($referrerDocid)
  {
    $this->referrerDocid = $referrerDocid;
  }
  /**
   * @return string[]
   */
  public function getReferrerDocid()
  {
    return $this->referrerDocid;
  }
  /**
   * @param int
   */
  public function setReferrerRank($referrerRank)
  {
    $this->referrerRank = $referrerRank;
  }
  /**
   * @return int
   */
  public function getReferrerRank()
  {
    return $this->referrerRank;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageExactBoostNavQuery::class, 'Google_Service_Contentwarehouse_ImageExactBoostNavQuery');
