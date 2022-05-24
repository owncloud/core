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

namespace Google\Service\DomainsRDAP;

class Link extends \Google\Model
{
  /**
   * @var string
   */
  public $href;
  /**
   * @var string
   */
  public $hreflang;
  /**
   * @var string
   */
  public $media;
  /**
   * @var string
   */
  public $rel;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setHref($href)
  {
    $this->href = $href;
  }
  /**
   * @return string
   */
  public function getHref()
  {
    return $this->href;
  }
  /**
   * @param string
   */
  public function setHreflang($hreflang)
  {
    $this->hreflang = $hreflang;
  }
  /**
   * @return string
   */
  public function getHreflang()
  {
    return $this->hreflang;
  }
  /**
   * @param string
   */
  public function setMedia($media)
  {
    $this->media = $media;
  }
  /**
   * @return string
   */
  public function getMedia()
  {
    return $this->media;
  }
  /**
   * @param string
   */
  public function setRel($rel)
  {
    $this->rel = $rel;
  }
  /**
   * @return string
   */
  public function getRel()
  {
    return $this->rel;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Link::class, 'Google_Service_DomainsRDAP_Link');
