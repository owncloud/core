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

namespace Google\Service\RecaptchaEnterprise\Resource;

use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentRequest;
use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentResponse;
use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1Assessment;

/**
 * The "assessments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recaptchaenterpriseService = new Google\Service\RecaptchaEnterprise(...);
 *   $assessments = $recaptchaenterpriseService->assessments;
 *  </code>
 */
class ProjectsAssessments extends \Google\Service\Resource
{
  /**
   * Annotates a previously created Assessment to provide additional information
   * on whether the event turned out to be authentic or fraudulent.
   * (assessments.annotate)
   *
   * @param string $name Required. The resource name of the Assessment, in the
   * format "projects/{project}/assessments/{assessment}".
   * @param GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentResponse
   */
  public function annotate($name, GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('annotate', [$params], GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentResponse::class);
  }
  /**
   * Creates an Assessment of the likelihood an event is legitimate.
   * (assessments.create)
   *
   * @param string $parent Required. The name of the project in which the
   * assessment will be created, in the format "projects/{project}".
   * @param GoogleCloudRecaptchaenterpriseV1Assessment $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecaptchaenterpriseV1Assessment
   */
  public function create($parent, GoogleCloudRecaptchaenterpriseV1Assessment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudRecaptchaenterpriseV1Assessment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAssessments::class, 'Google_Service_RecaptchaEnterprise_Resource_ProjectsAssessments');
