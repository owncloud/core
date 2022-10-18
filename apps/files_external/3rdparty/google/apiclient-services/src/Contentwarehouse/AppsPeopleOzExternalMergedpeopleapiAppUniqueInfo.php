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

class AppsPeopleOzExternalMergedpeopleapiAppUniqueInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $appUniqueId;
  /**
   * @var string
   */
  public $displayAppUniqueId;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $mimetype;

  /**
   * @param string
   */
  public function setAppUniqueId($appUniqueId)
  {
    $this->appUniqueId = $appUniqueId;
  }
  /**
   * @return string
   */
  public function getAppUniqueId()
  {
    return $this->appUniqueId;
  }
  /**
   * @param string
   */
  public function setDisplayAppUniqueId($displayAppUniqueId)
  {
    $this->displayAppUniqueId = $displayAppUniqueId;
  }
  /**
   * @return string
   */
  public function getDisplayAppUniqueId()
  {
    return $this->displayAppUniqueId;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setMimetype($mimetype)
  {
    $this->mimetype = $mimetype;
  }
  /**
   * @return string
   */
  public function getMimetype()
  {
    return $this->mimetype;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiAppUniqueInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiAppUniqueInfo');
