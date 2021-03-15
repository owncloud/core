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

class Google_Service_CloudHealthcare_ConsentStore extends Google_Model
{
  public $defaultConsentTtl;
  public $enableConsentCreateOnUpdate;
  public $labels;
  public $name;

  public function setDefaultConsentTtl($defaultConsentTtl)
  {
    $this->defaultConsentTtl = $defaultConsentTtl;
  }
  public function getDefaultConsentTtl()
  {
    return $this->defaultConsentTtl;
  }
  public function setEnableConsentCreateOnUpdate($enableConsentCreateOnUpdate)
  {
    $this->enableConsentCreateOnUpdate = $enableConsentCreateOnUpdate;
  }
  public function getEnableConsentCreateOnUpdate()
  {
    return $this->enableConsentCreateOnUpdate;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
