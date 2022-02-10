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
  /**
   * @var bool
   */
  public $baseline;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  protected $instanceFilterType = OSPolicyAssignmentInstanceFilter::class;
  protected $instanceFilterDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $osPoliciesType = OSPolicy::class;
  protected $osPoliciesDataType = 'array';
  /**
   * @var bool
   */
  public $reconciling;
  /**
   * @var string
   */
  public $revisionCreateTime;
  /**
   * @var string
   */
  public $revisionId;
  protected $rolloutType = OSPolicyAssignmentRollout::class;
  protected $rolloutDataType = '';
  /**
   * @var string
   */
  public $rolloutState;
  /**
   * @var string
   */
  public $uid;

  /**
   * @param bool
   */
  public function setBaseline($baseline)
  {
    $this->baseline = $baseline;
  }
  /**
   * @return bool
   */
  public function getBaseline()
  {
    return $this->baseline;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
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
  /**
   * @param bool
   */
  public function setReconciling($reconciling)
  {
    $this->reconciling = $reconciling;
  }
  /**
   * @return bool
   */
  public function getReconciling()
  {
    return $this->reconciling;
  }
  /**
   * @param string
   */
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  /**
   * @return string
   */
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setRolloutState($rolloutState)
  {
    $this->rolloutState = $rolloutState;
  }
  /**
   * @return string
   */
  public function getRolloutState()
  {
    return $this->rolloutState;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyAssignment::class, 'Google_Service_OSConfig_OSPolicyAssignment');
