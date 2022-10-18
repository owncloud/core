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

class ResearchScienceSearchOrganization extends \Google\Collection
{
  protected $collection_key = 'organizationMidLabel';
  /**
   * @var string[]
   */
  public $organizationMid;
  /**
   * @var string[]
   */
  public $organizationMidLabel;
  /**
   * @var string
   */
  public $organizationName;
  /**
   * @var string
   */
  public $organizationUrl;
  /**
   * @var string
   */
  public $originalOrganizationName;

  /**
   * @param string[]
   */
  public function setOrganizationMid($organizationMid)
  {
    $this->organizationMid = $organizationMid;
  }
  /**
   * @return string[]
   */
  public function getOrganizationMid()
  {
    return $this->organizationMid;
  }
  /**
   * @param string[]
   */
  public function setOrganizationMidLabel($organizationMidLabel)
  {
    $this->organizationMidLabel = $organizationMidLabel;
  }
  /**
   * @return string[]
   */
  public function getOrganizationMidLabel()
  {
    return $this->organizationMidLabel;
  }
  /**
   * @param string
   */
  public function setOrganizationName($organizationName)
  {
    $this->organizationName = $organizationName;
  }
  /**
   * @return string
   */
  public function getOrganizationName()
  {
    return $this->organizationName;
  }
  /**
   * @param string
   */
  public function setOrganizationUrl($organizationUrl)
  {
    $this->organizationUrl = $organizationUrl;
  }
  /**
   * @return string
   */
  public function getOrganizationUrl()
  {
    return $this->organizationUrl;
  }
  /**
   * @param string
   */
  public function setOriginalOrganizationName($originalOrganizationName)
  {
    $this->originalOrganizationName = $originalOrganizationName;
  }
  /**
   * @return string
   */
  public function getOriginalOrganizationName()
  {
    return $this->originalOrganizationName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchOrganization::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchOrganization');
