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

namespace Google\Service\Datastore;

class GoogleDatastoreAdminV1MigrationProgressEvent extends \Google\Model
{
  protected $prepareStepDetailsType = GoogleDatastoreAdminV1PrepareStepDetails::class;
  protected $prepareStepDetailsDataType = '';
  protected $redirectWritesStepDetailsType = GoogleDatastoreAdminV1RedirectWritesStepDetails::class;
  protected $redirectWritesStepDetailsDataType = '';
  /**
   * @var string
   */
  public $step;

  /**
   * @param GoogleDatastoreAdminV1PrepareStepDetails
   */
  public function setPrepareStepDetails(GoogleDatastoreAdminV1PrepareStepDetails $prepareStepDetails)
  {
    $this->prepareStepDetails = $prepareStepDetails;
  }
  /**
   * @return GoogleDatastoreAdminV1PrepareStepDetails
   */
  public function getPrepareStepDetails()
  {
    return $this->prepareStepDetails;
  }
  /**
   * @param GoogleDatastoreAdminV1RedirectWritesStepDetails
   */
  public function setRedirectWritesStepDetails(GoogleDatastoreAdminV1RedirectWritesStepDetails $redirectWritesStepDetails)
  {
    $this->redirectWritesStepDetails = $redirectWritesStepDetails;
  }
  /**
   * @return GoogleDatastoreAdminV1RedirectWritesStepDetails
   */
  public function getRedirectWritesStepDetails()
  {
    return $this->redirectWritesStepDetails;
  }
  /**
   * @param string
   */
  public function setStep($step)
  {
    $this->step = $step;
  }
  /**
   * @return string
   */
  public function getStep()
  {
    return $this->step;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDatastoreAdminV1MigrationProgressEvent::class, 'Google_Service_Datastore_GoogleDatastoreAdminV1MigrationProgressEvent');
