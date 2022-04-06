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

namespace Google\Service\CloudHealthcare;

class ExportResourcesRequest extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "since" => "_since",
        "type" => "_type",
  ];
  /**
   * @var string
   */
  public $since;
  /**
   * @var string
   */
  public $type;
  protected $bigqueryDestinationType = GoogleCloudHealthcareV1FhirBigQueryDestination::class;
  protected $bigqueryDestinationDataType = '';
  protected $gcsDestinationType = GoogleCloudHealthcareV1FhirGcsDestination::class;
  protected $gcsDestinationDataType = '';

  /**
   * @param string
   */
  public function setSince($since)
  {
    $this->since = $since;
  }
  /**
   * @return string
   */
  public function getSince()
  {
    return $this->since;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param GoogleCloudHealthcareV1FhirBigQueryDestination
   */
  public function setBigqueryDestination(GoogleCloudHealthcareV1FhirBigQueryDestination $bigqueryDestination)
  {
    $this->bigqueryDestination = $bigqueryDestination;
  }
  /**
   * @return GoogleCloudHealthcareV1FhirBigQueryDestination
   */
  public function getBigqueryDestination()
  {
    return $this->bigqueryDestination;
  }
  /**
   * @param GoogleCloudHealthcareV1FhirGcsDestination
   */
  public function setGcsDestination(GoogleCloudHealthcareV1FhirGcsDestination $gcsDestination)
  {
    $this->gcsDestination = $gcsDestination;
  }
  /**
   * @return GoogleCloudHealthcareV1FhirGcsDestination
   */
  public function getGcsDestination()
  {
    return $this->gcsDestination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExportResourcesRequest::class, 'Google_Service_CloudHealthcare_ExportResourcesRequest');
