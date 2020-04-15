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

class Google_Service_CloudHealthcare_DicomConfig extends Google_Model
{
  public $filterProfile;
  protected $keepListType = 'Google_Service_CloudHealthcare_TagFilterList';
  protected $keepListDataType = '';
  protected $removeListType = 'Google_Service_CloudHealthcare_TagFilterList';
  protected $removeListDataType = '';
  public $skipIdRedaction;

  public function setFilterProfile($filterProfile)
  {
    $this->filterProfile = $filterProfile;
  }
  public function getFilterProfile()
  {
    return $this->filterProfile;
  }
  /**
   * @param Google_Service_CloudHealthcare_TagFilterList
   */
  public function setKeepList(Google_Service_CloudHealthcare_TagFilterList $keepList)
  {
    $this->keepList = $keepList;
  }
  /**
   * @return Google_Service_CloudHealthcare_TagFilterList
   */
  public function getKeepList()
  {
    return $this->keepList;
  }
  /**
   * @param Google_Service_CloudHealthcare_TagFilterList
   */
  public function setRemoveList(Google_Service_CloudHealthcare_TagFilterList $removeList)
  {
    $this->removeList = $removeList;
  }
  /**
   * @return Google_Service_CloudHealthcare_TagFilterList
   */
  public function getRemoveList()
  {
    return $this->removeList;
  }
  public function setSkipIdRedaction($skipIdRedaction)
  {
    $this->skipIdRedaction = $skipIdRedaction;
  }
  public function getSkipIdRedaction()
  {
    return $this->skipIdRedaction;
  }
}
