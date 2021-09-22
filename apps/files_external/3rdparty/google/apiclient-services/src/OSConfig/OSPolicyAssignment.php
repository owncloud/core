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

namespace Google\Service\OSConfig;

class OSPolicyAssignment extends \Google\Collection
{
  protected $collection_key = 'osPolicies';
  public $baseline;
  public $deleted;
  public $description;
  public $etag;
  protected $instanceFilterType = OSPolicyAssignmentInstanceFilter::class;
  protected $instanceFilterDataType = '';
  public $name;
  protected $osPoliciesType = OSPolicy::class;
  protected $osPoliciesDataType = 'array';
  public $reconciling;
  public $revisionCreateTime;
  public $revisionId;
  protected $rolloutType = OSPolicyAssignmentRollout::class;
  protected $rolloutDataType = '';
  public $rolloutState;
  public $uid;

  public function setBaseline($baseline)
  {
    $this->baseline = $baseline;
  }
  public function getBaseline()
  {
    return $this->baseline;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param OSPolicyAssignmentInstanceFilter
   */
  public function setInstanceFilter(OSPolicyAssignmentInstanceFilter $instanceFilter)
  {
    $this->instanceFilter = $instanceFilter;
  }
  /**
   * @return OSPolicyAssignmentInstanceFilter
   */
  public function getInstanceFilter()
  {
    return $this->instanceFilter;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param OSPolicy[]
   */
  public function setOsPolicies($osPolicies)
  {
    $this->osPolicies = $osPolicies;
  }
  /**
   * @return OSPolicy[]
   */
  public function getOsPolicies()
  {
    return $this->osPolicies;
  }
  public function setReconciling($reconciling)
  {
    $this->reconciling = $reconciling;
  }
  public function getReconciling()
  {
    return $this->reconciling;
  }
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param OSPolicyAssignmentRollout
   */
  public function setRollout(OSPolicyAssignmentRollout $rollout)
  {
    $this->rollout = $rollout;
  }
  /**
   * @return OSPolicyAssignmentRollout
   */
  public function getRollout()
  {
    return $this->rollout;
  }
  public function setRolloutState($rolloutState)
  {
    $this->rolloutState = $rolloutState;
  }
  public function getRolloutState()
  {
    return $this->rolloutState;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyAssignment::class, 'Google_Service_OSConfig_OSPolicyAssignment');
