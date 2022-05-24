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

namespace Google\Service\ShoppingContent;

class Css extends \Google\Collection
{
  protected $collection_key = 'labelIds';
  /**
   * @var string
   */
  public $cssDomainId;
  /**
   * @var string
   */
  public $cssGroupId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $fullName;
  /**
   * @var string
   */
  public $homepageUri;
  /**
   * @var string[]
   */
  public $labelIds;

  /**
   * @param string
   */
  public function setCssDomainId($cssDomainId)
  {
    $this->cssDomainId = $cssDomainId;
  }
  /**
   * @return string
   */
  public function getCssDomainId()
  {
    return $this->cssDomainId;
  }
  /**
   * @param string
   */
  public function setCssGroupId($cssGroupId)
  {
    $this->cssGroupId = $cssGroupId;
  }
  /**
   * @return string
   */
  public function getCssGroupId()
  {
    return $this->cssGroupId;
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
  public function setFullName($fullName)
  {
    $this->fullName = $fullName;
  }
  /**
   * @return string
   */
  public function getFullName()
  {
    return $this->fullName;
  }
  /**
   * @param string
   */
  public function setHomepageUri($homepageUri)
  {
    $this->homepageUri = $homepageUri;
  }
  /**
   * @return string
   */
  public function getHomepageUri()
  {
    return $this->homepageUri;
  }
  /**
   * @param string[]
   */
  public function setLabelIds($labelIds)
  {
    $this->labelIds = $labelIds;
  }
  /**
   * @return string[]
   */
  public function getLabelIds()
  {
    return $this->labelIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Css::class, 'Google_Service_ShoppingContent_Css');
