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

namespace Google\Service\Bigquery;

class DatasetAccess extends \Google\Model
{
  protected $datasetType = DatasetAccessEntry::class;
  protected $datasetDataType = '';
  public $domain;
  public $groupByEmail;
  public $iamMember;
  public $role;
  protected $routineType = RoutineReference::class;
  protected $routineDataType = '';
  public $specialGroup;
  public $userByEmail;
  protected $viewType = TableReference::class;
  protected $viewDataType = '';

  /**
   * @param DatasetAccessEntry
   */
  public function setDataset(DatasetAccessEntry $dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return DatasetAccessEntry
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  public function setGroupByEmail($groupByEmail)
  {
    $this->groupByEmail = $groupByEmail;
  }
  public function getGroupByEmail()
  {
    return $this->groupByEmail;
  }
  public function setIamMember($iamMember)
  {
    $this->iamMember = $iamMember;
  }
  public function getIamMember()
  {
    return $this->iamMember;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param RoutineReference
   */
  public function setRoutine(RoutineReference $routine)
  {
    $this->routine = $routine;
  }
  /**
   * @return RoutineReference
   */
  public function getRoutine()
  {
    return $this->routine;
  }
  public function setSpecialGroup($specialGroup)
  {
    $this->specialGroup = $specialGroup;
  }
  public function getSpecialGroup()
  {
    return $this->specialGroup;
  }
  public function setUserByEmail($userByEmail)
  {
    $this->userByEmail = $userByEmail;
  }
  public function getUserByEmail()
  {
    return $this->userByEmail;
  }
  /**
   * @param TableReference
   */
  public function setView(TableReference $view)
  {
    $this->view = $view;
  }
  /**
   * @return TableReference
   */
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatasetAccess::class, 'Google_Service_Bigquery_DatasetAccess');
