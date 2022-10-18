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

class SecurityCredentialsHostProto extends \Google\Model
{
  /**
   * @var string
   */
  public $hostName;
  /**
   * @var string
   */
  public $hostOwner;

  /**
   * @param string
   */
  public function setHostName($hostName)
  {
    $this->hostName = $hostName;
  }
  /**
   * @return string
   */
  public function getHostName()
  {
    return $this->hostName;
  }
  /**
   * @param string
   */
  public function setHostOwner($hostOwner)
  {
    $this->hostOwner = $hostOwner;
  }
  /**
   * @return string
   */
  public function getHostOwner()
  {
    return $this->hostOwner;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityCredentialsHostProto::class, 'Google_Service_Contentwarehouse_SecurityCredentialsHostProto');
