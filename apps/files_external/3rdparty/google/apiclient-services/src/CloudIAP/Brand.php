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

namespace Google\Service\CloudIAP;

class Brand extends \Google\Model
{
  /**
   * @var string
   */
  public $applicationTitle;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $orgInternalOnly;
  /**
   * @var string
   */
  public $supportEmail;

  /**
   * @param string
   */
  public function setApplicationTitle($applicationTitle)
  {
    $this->applicationTitle = $applicationTitle;
  }
  /**
   * @return string
   */
  public function getApplicationTitle()
  {
    return $this->applicationTitle;
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
   * @param bool
   */
  public function setOrgInternalOnly($orgInternalOnly)
  {
    $this->orgInternalOnly = $orgInternalOnly;
  }
  /**
   * @return bool
   */
  public function getOrgInternalOnly()
  {
    return $this->orgInternalOnly;
  }
  /**
   * @param string
   */
  public function setSupportEmail($supportEmail)
  {
    $this->supportEmail = $supportEmail;
  }
  /**
   * @return string
   */
  public function getSupportEmail()
  {
    return $this->supportEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Brand::class, 'Google_Service_CloudIAP_Brand');
