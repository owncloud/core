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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1ChromeAppPermission extends \Google\Model
{
  /**
   * @var bool
   */
  public $accessUserData;
  /**
   * @var string
   */
  public $documentationUri;
  /**
   * @var string
   */
  public $type;

  /**
   * @param bool
   */
  public function setAccessUserData($accessUserData)
  {
    $this->accessUserData = $accessUserData;
  }
  /**
   * @return bool
   */
  public function getAccessUserData()
  {
    return $this->accessUserData;
  }
  /**
   * @param string
   */
  public function setDocumentationUri($documentationUri)
  {
    $this->documentationUri = $documentationUri;
  }
  /**
   * @return string
   */
  public function getDocumentationUri()
  {
    return $this->documentationUri;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1ChromeAppPermission::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1ChromeAppPermission');
