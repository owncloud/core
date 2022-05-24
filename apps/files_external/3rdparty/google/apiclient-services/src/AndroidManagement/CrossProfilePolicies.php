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

namespace Google\Service\AndroidManagement;

class CrossProfilePolicies extends \Google\Model
{
  /**
   * @var string
   */
  public $crossProfileCopyPaste;
  /**
   * @var string
   */
  public $crossProfileDataSharing;
  /**
   * @var string
   */
  public $showWorkContactsInPersonalProfile;

  /**
   * @param string
   */
  public function setCrossProfileCopyPaste($crossProfileCopyPaste)
  {
    $this->crossProfileCopyPaste = $crossProfileCopyPaste;
  }
  /**
   * @return string
   */
  public function getCrossProfileCopyPaste()
  {
    return $this->crossProfileCopyPaste;
  }
  /**
   * @param string
   */
  public function setCrossProfileDataSharing($crossProfileDataSharing)
  {
    $this->crossProfileDataSharing = $crossProfileDataSharing;
  }
  /**
   * @return string
   */
  public function getCrossProfileDataSharing()
  {
    return $this->crossProfileDataSharing;
  }
  /**
   * @param string
   */
  public function setShowWorkContactsInPersonalProfile($showWorkContactsInPersonalProfile)
  {
    $this->showWorkContactsInPersonalProfile = $showWorkContactsInPersonalProfile;
  }
  /**
   * @return string
   */
  public function getShowWorkContactsInPersonalProfile()
  {
    return $this->showWorkContactsInPersonalProfile;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrossProfilePolicies::class, 'Google_Service_AndroidManagement_CrossProfilePolicies');
