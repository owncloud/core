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

class ResearchScienceSearchLicense extends \Google\Model
{
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $licenseClass;
  /**
   * @var string
   */
  public $licenseMid;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setLicenseClass($licenseClass)
  {
    $this->licenseClass = $licenseClass;
  }
  /**
   * @return string
   */
  public function getLicenseClass()
  {
    return $this->licenseClass;
  }
  /**
   * @param string
   */
  public function setLicenseMid($licenseMid)
  {
    $this->licenseMid = $licenseMid;
  }
  /**
   * @return string
   */
  public function getLicenseMid()
  {
    return $this->licenseMid;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
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
class_alias(ResearchScienceSearchLicense::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchLicense');
