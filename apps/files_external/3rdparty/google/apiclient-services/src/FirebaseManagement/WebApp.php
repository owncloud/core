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

namespace Google\Service\FirebaseManagement;

class WebApp extends \Google\Collection
{
  protected $collection_key = 'appUrls';
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string[]
   */
  public $appUrls;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $webId;

  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param string[]
   */
  public function setAppUrls($appUrls)
  {
    $this->appUrls = $appUrls;
  }
  /**
   * @return string[]
   */
  public function getAppUrls()
  {
    return $this->appUrls;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setWebId($webId)
  {
    $this->webId = $webId;
  }
  /**
   * @return string
   */
  public function getWebId()
  {
    return $this->webId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WebApp::class, 'Google_Service_FirebaseManagement_WebApp');
