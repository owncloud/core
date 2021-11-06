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

class DicomConfig extends \Google\Model
{
  public $filterProfile;
  protected $keepListType = TagFilterList::class;
  protected $keepListDataType = '';
  protected $removeListType = TagFilterList::class;
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
   * @param TagFilterList
   */
  public function setKeepList(TagFilterList $keepList)
  {
    $this->keepList = $keepList;
  }
  /**
   * @return TagFilterList
   */
  public function getKeepList()
  {
    return $this->keepList;
  }
  /**
   * @param TagFilterList
   */
  public function setRemoveList(TagFilterList $removeList)
  {
    $this->removeList = $removeList;
  }
  /**
   * @return TagFilterList
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DicomConfig::class, 'Google_Service_CloudHealthcare_DicomConfig');
