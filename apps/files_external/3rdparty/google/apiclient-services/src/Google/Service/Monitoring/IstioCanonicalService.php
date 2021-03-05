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

class Google_Service_Monitoring_IstioCanonicalService extends Google_Model
{
  public $canonicalService;
  public $canonicalServiceNamespace;
  public $meshUid;

  public function setCanonicalService($canonicalService)
  {
    $this->canonicalService = $canonicalService;
  }
  public function getCanonicalService()
  {
    return $this->canonicalService;
  }
  public function setCanonicalServiceNamespace($canonicalServiceNamespace)
  {
    $this->canonicalServiceNamespace = $canonicalServiceNamespace;
  }
  public function getCanonicalServiceNamespace()
  {
    return $this->canonicalServiceNamespace;
  }
  public function setMeshUid($meshUid)
  {
    $this->meshUid = $meshUid;
  }
  public function getMeshUid()
  {
    return $this->meshUid;
  }
}
