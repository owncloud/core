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

class AccessDeniedPageSettings extends \Google\Model
{
  public $accessDeniedPageUri;
  public $generateTroubleshootingUri;

  public function setAccessDeniedPageUri($accessDeniedPageUri)
  {
    $this->accessDeniedPageUri = $accessDeniedPageUri;
  }
  public function getAccessDeniedPageUri()
  {
    return $this->accessDeniedPageUri;
  }
  public function setGenerateTroubleshootingUri($generateTroubleshootingUri)
  {
    $this->generateTroubleshootingUri = $generateTroubleshootingUri;
  }
  public function getGenerateTroubleshootingUri()
  {
    return $this->generateTroubleshootingUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccessDeniedPageSettings::class, 'Google_Service_CloudIAP_AccessDeniedPageSettings');
