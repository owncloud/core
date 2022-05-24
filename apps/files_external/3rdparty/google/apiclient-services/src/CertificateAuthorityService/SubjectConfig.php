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

namespace Google\Service\CertificateAuthorityService;

class SubjectConfig extends \Google\Model
{
  protected $subjectType = Subject::class;
  protected $subjectDataType = '';
  protected $subjectAltNameType = SubjectAltNames::class;
  protected $subjectAltNameDataType = '';

  /**
   * @param Subject
   */
  public function setSubject(Subject $subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return Subject
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param SubjectAltNames
   */
  public function setSubjectAltName(SubjectAltNames $subjectAltName)
  {
    $this->subjectAltName = $subjectAltName;
  }
  /**
   * @return SubjectAltNames
   */
  public function getSubjectAltName()
  {
    return $this->subjectAltName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubjectConfig::class, 'Google_Service_CertificateAuthorityService_SubjectConfig');
