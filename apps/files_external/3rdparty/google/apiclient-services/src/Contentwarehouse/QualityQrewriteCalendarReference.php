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

class QualityQrewriteCalendarReference extends \Google\Model
{
  protected $calendarAliasType = QualityQrewriteQRewriteAccountAwareCalendarAliasWrapper::class;
  protected $calendarAliasDataType = '';
  protected $contactCalendarNameType = QualityQrewriteContactCalendarName::class;
  protected $contactCalendarNameDataType = '';
  protected $familyCalendarAliasType = QualityQrewriteFamilyCalendarAlias::class;
  protected $familyCalendarAliasDataType = '';
  protected $primaryCalendarAliasType = QualityQrewritePrimaryCalendarAlias::class;
  protected $primaryCalendarAliasDataType = '';

  /**
   * @param QualityQrewriteQRewriteAccountAwareCalendarAliasWrapper
   */
  public function setCalendarAlias(QualityQrewriteQRewriteAccountAwareCalendarAliasWrapper $calendarAlias)
  {
    $this->calendarAlias = $calendarAlias;
  }
  /**
   * @return QualityQrewriteQRewriteAccountAwareCalendarAliasWrapper
   */
  public function getCalendarAlias()
  {
    return $this->calendarAlias;
  }
  /**
   * @param QualityQrewriteContactCalendarName
   */
  public function setContactCalendarName(QualityQrewriteContactCalendarName $contactCalendarName)
  {
    $this->contactCalendarName = $contactCalendarName;
  }
  /**
   * @return QualityQrewriteContactCalendarName
   */
  public function getContactCalendarName()
  {
    return $this->contactCalendarName;
  }
  /**
   * @param QualityQrewriteFamilyCalendarAlias
   */
  public function setFamilyCalendarAlias(QualityQrewriteFamilyCalendarAlias $familyCalendarAlias)
  {
    $this->familyCalendarAlias = $familyCalendarAlias;
  }
  /**
   * @return QualityQrewriteFamilyCalendarAlias
   */
  public function getFamilyCalendarAlias()
  {
    return $this->familyCalendarAlias;
  }
  /**
   * @param QualityQrewritePrimaryCalendarAlias
   */
  public function setPrimaryCalendarAlias(QualityQrewritePrimaryCalendarAlias $primaryCalendarAlias)
  {
    $this->primaryCalendarAlias = $primaryCalendarAlias;
  }
  /**
   * @return QualityQrewritePrimaryCalendarAlias
   */
  public function getPrimaryCalendarAlias()
  {
    return $this->primaryCalendarAlias;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityQrewriteCalendarReference::class, 'Google_Service_Contentwarehouse_QualityQrewriteCalendarReference');
