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

namespace Google\Service\DataprocMetastore;

class Backup extends \Google\Collection
{
  protected $collection_key = 'restoringServices';
  public $createTime;
  public $description;
  public $endTime;
  public $name;
  public $restoringServices;
  protected $serviceRevisionType = Service::class;
  protected $serviceRevisionDataType = '';
  public $state;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRestoringServices($restoringServices)
  {
    $this->restoringServices = $restoringServices;
  }
  public function getRestoringServices()
  {
    return $this->restoringServices;
  }
  /**
   * @param Service
   */
  public function setServiceRevision(Service $serviceRevision)
  {
    $this->serviceRevision = $serviceRevision;
  }
  /**
   * @return Service
   */
  public function getServiceRevision()
  {
    return $this->serviceRevision;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Backup::class, 'Google_Service_DataprocMetastore_Backup');
