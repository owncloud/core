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

class Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2ConstraintListConstraint extends Google_Model
{
  public $supportsIn;
  public $supportsUnder;

  public function setSupportsIn($supportsIn)
  {
    $this->supportsIn = $supportsIn;
  }
  public function getSupportsIn()
  {
    return $this->supportsIn;
  }
  public function setSupportsUnder($supportsUnder)
  {
    $this->supportsUnder = $supportsUnder;
  }
  public function getSupportsUnder()
  {
    return $this->supportsUnder;
  }
}
