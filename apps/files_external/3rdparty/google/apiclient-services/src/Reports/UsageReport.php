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

namespace Google\Service\Reports;

class UsageReport extends \Google\Collection
{
  protected $collection_key = 'parameters';
  public $date;
  protected $entityType = UsageReportEntity::class;
  protected $entityDataType = '';
  public $etag;
  public $kind;
  protected $parametersType = UsageReportParameters::class;
  protected $parametersDataType = 'array';

  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param UsageReportEntity
   */
  public function setEntity(UsageReportEntity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return UsageReportEntity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param UsageReportParameters[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return UsageReportParameters[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsageReport::class, 'Google_Service_Reports_UsageReport');
