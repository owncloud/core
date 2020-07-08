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

class Google_Service_Dataflow_Artifact extends Google_Model
{
  protected $containerSpecType = 'Google_Service_Dataflow_ContainerSpec';
  protected $containerSpecDataType = '';
  public $jobGraphGcsPath;
  protected $metadataType = 'Google_Service_Dataflow_TemplateMetadata';
  protected $metadataDataType = '';

  /**
   * @param Google_Service_Dataflow_ContainerSpec
   */
  public function setContainerSpec(Google_Service_Dataflow_ContainerSpec $containerSpec)
  {
    $this->containerSpec = $containerSpec;
  }
  /**
   * @return Google_Service_Dataflow_ContainerSpec
   */
  public function getContainerSpec()
  {
    return $this->containerSpec;
  }
  public function setJobGraphGcsPath($jobGraphGcsPath)
  {
    $this->jobGraphGcsPath = $jobGraphGcsPath;
  }
  public function getJobGraphGcsPath()
  {
    return $this->jobGraphGcsPath;
  }
  /**
   * @param Google_Service_Dataflow_TemplateMetadata
   */
  public function setMetadata(Google_Service_Dataflow_TemplateMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_Dataflow_TemplateMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}
