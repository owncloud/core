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

namespace Google\Service\Dfareporting;

class TagData extends \Google\Model
{
  /**
   * @var string
   */
  public $adId;
  /**
   * @var string
   */
  public $clickTag;
  /**
   * @var string
   */
  public $creativeId;
  /**
   * @var string
   */
  public $format;
  /**
   * @var string
   */
  public $impressionTag;

  /**
   * @param string
   */
  public function setAdId($adId)
  {
    $this->adId = $adId;
  }
  /**
   * @return string
   */
  public function getAdId()
  {
    return $this->adId;
  }
  /**
   * @param string
   */
  public function setClickTag($clickTag)
  {
    $this->clickTag = $clickTag;
  }
  /**
   * @return string
   */
  public function getClickTag()
  {
    return $this->clickTag;
  }
  /**
   * @param string
   */
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  /**
   * @return string
   */
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string
   */
  public function setImpressionTag($impressionTag)
  {
    $this->impressionTag = $impressionTag;
  }
  /**
   * @return string
   */
  public function getImpressionTag()
  {
    return $this->impressionTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TagData::class, 'Google_Service_Dfareporting_TagData');
