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

class Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1beta1Filter extends Google_Collection
{
  protected $collection_key = 'services';
  public $creditTypesTreatment;
  public $projects;
  public $services;

  public function setCreditTypesTreatment($creditTypesTreatment)
  {
    $this->creditTypesTreatment = $creditTypesTreatment;
  }
  public function getCreditTypesTreatment()
  {
    return $this->creditTypesTreatment;
  }
  public function setProjects($projects)
  {
    $this->projects = $projects;
  }
  public function getProjects()
  {
    return $this->projects;
  }
  public function setServices($services)
  {
    $this->services = $services;
  }
  public function getServices()
  {
    return $this->services;
  }
}
