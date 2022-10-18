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

namespace Google\Service\Contentwarehouse;

class CompositeDocQualitySignals extends \Google\Model
{
  protected $lastSignificantUpdateType = QualityTimebasedLastSignificantUpdate::class;
  protected $lastSignificantUpdateDataType = '';
  protected $oldnessInfoType = QualityTimebasedOldnessInfo::class;
  protected $oldnessInfoDataType = '';
  protected $pagetypeType = QualityTimebasedPageType::class;
  protected $pagetypeDataType = '';

  /**
   * @param QualityTimebasedLastSignificantUpdate
   */
  public function setLastSignificantUpdate(QualityTimebasedLastSignificantUpdate $lastSignificantUpdate)
  {
    $this->lastSignificantUpdate = $lastSignificantUpdate;
  }
  /**
   * @return QualityTimebasedLastSignificantUpdate
   */
  public function getLastSignificantUpdate()
  {
    return $this->lastSignificantUpdate;
  }
  /**
   * @param QualityTimebasedOldnessInfo
   */
  public function setOldnessInfo(QualityTimebasedOldnessInfo $oldnessInfo)
  {
    $this->oldnessInfo = $oldnessInfo;
  }
  /**
   * @return QualityTimebasedOldnessInfo
   */
  public function getOldnessInfo()
  {
    return $this->oldnessInfo;
  }
  /**
   * @param QualityTimebasedPageType
   */
  public function setPagetype(QualityTimebasedPageType $pagetype)
  {
    $this->pagetype = $pagetype;
  }
  /**
   * @return QualityTimebasedPageType
   */
  public function getPagetype()
  {
    return $this->pagetype;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompositeDocQualitySignals::class, 'Google_Service_Contentwarehouse_CompositeDocQualitySignals');
