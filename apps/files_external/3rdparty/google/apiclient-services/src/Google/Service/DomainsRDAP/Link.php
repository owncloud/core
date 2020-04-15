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

class Google_Service_DomainsRDAP_Link extends Google_Model
{
  public $href;
  public $hreflang;
  public $media;
  public $rel;
  public $title;
  public $type;
  public $value;

  public function setHref($href)
  {
    $this->href = $href;
  }
  public function getHref()
  {
    return $this->href;
  }
  public function setHreflang($hreflang)
  {
    $this->hreflang = $hreflang;
  }
  public function getHreflang()
  {
    return $this->hreflang;
  }
  public function setMedia($media)
  {
    $this->media = $media;
  }
  public function getMedia()
  {
    return $this->media;
  }
  public function setRel($rel)
  {
    $this->rel = $rel;
  }
  public function getRel()
  {
    return $this->rel;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}
