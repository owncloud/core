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

class Google_Service_CloudTalentSolution_ListCompaniesResponse extends Google_Collection
{
  protected $collection_key = 'companies';
  protected $companiesType = 'Google_Service_CloudTalentSolution_Company';
  protected $companiesDataType = 'array';
  protected $metadataType = 'Google_Service_CloudTalentSolution_ResponseMetadata';
  protected $metadataDataType = '';
  public $nextPageToken;

  /**
   * @param Google_Service_CloudTalentSolution_Company[]
   */
  public function setCompanies($companies)
  {
    $this->companies = $companies;
  }
  /**
   * @return Google_Service_CloudTalentSolution_Company[]
   */
  public function getCompanies()
  {
    return $this->companies;
  }
  /**
   * @param Google_Service_CloudTalentSolution_ResponseMetadata
   */
  public function setMetadata(Google_Service_CloudTalentSolution_ResponseMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CloudTalentSolution_ResponseMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}
