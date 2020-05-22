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

class Google_Service_CloudSearch_GSuitePrincipal extends Google_Model
{
  public $gsuiteDomain;
  public $gsuiteGroupEmail;
  public $gsuiteUserEmail;

  public function setGsuiteDomain($gsuiteDomain)
  {
    $this->gsuiteDomain = $gsuiteDomain;
  }
  public function getGsuiteDomain()
  {
    return $this->gsuiteDomain;
  }
  public function setGsuiteGroupEmail($gsuiteGroupEmail)
  {
    $this->gsuiteGroupEmail = $gsuiteGroupEmail;
  }
  public function getGsuiteGroupEmail()
  {
    return $this->gsuiteGroupEmail;
  }
  public function setGsuiteUserEmail($gsuiteUserEmail)
  {
    $this->gsuiteUserEmail = $gsuiteUserEmail;
  }
  public function getGsuiteUserEmail()
  {
    return $this->gsuiteUserEmail;
  }
}
