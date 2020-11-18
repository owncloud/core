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

class Google_Service_ShoppingContent_Css extends Google_Collection
{
  protected $collection_key = 'labelIds';
  public $cssDomainId;
  public $cssGroupId;
  public $displayName;
  public $fullName;
  public $homepageUri;
  public $labelIds;

  public function setCssDomainId($cssDomainId)
  {
    $this->cssDomainId = $cssDomainId;
  }
  public function getCssDomainId()
  {
    return $this->cssDomainId;
  }
  public function setCssGroupId($cssGroupId)
  {
    $this->cssGroupId = $cssGroupId;
  }
  public function getCssGroupId()
  {
    return $this->cssGroupId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFullName($fullName)
  {
    $this->fullName = $fullName;
  }
  public function getFullName()
  {
    return $this->fullName;
  }
  public function setHomepageUri($homepageUri)
  {
    $this->homepageUri = $homepageUri;
  }
  public function getHomepageUri()
  {
    return $this->homepageUri;
  }
  public function setLabelIds($labelIds)
  {
    $this->labelIds = $labelIds;
  }
  public function getLabelIds()
  {
    return $this->labelIds;
  }
}
