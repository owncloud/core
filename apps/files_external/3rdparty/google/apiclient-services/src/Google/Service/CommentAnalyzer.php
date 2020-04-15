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

/**
 * Service definition for CommentAnalyzer (v1alpha1).
 *
 * <p>
 * The Perspective Comment Analyzer API provides information about the potential
 * impact of a comment on a conversation (e.g. it can provide a score for the
 * "toxicity" of a comment). Users can leverage the "SuggestCommentScore" method
 * to submit corrections to improve Perspective over time. Users can set the
 * "doNotStore" flag to ensure that all submitted comments are automatically
 * deleted after scores are returned.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://github.com/conversationai/perspectiveapi/blob/master/README.md" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CommentAnalyzer extends Google_Service
{
  /** View your email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";

  public $comments;
  
  /**
   * Constructs the internal representation of the CommentAnalyzer service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://commentanalyzer.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1alpha1';
    $this->serviceName = 'commentanalyzer';

    $this->comments = new Google_Service_CommentAnalyzer_Resource_Comments(
        $this,
        $this->serviceName,
        'comments',
        array(
          'methods' => array(
            'analyze' => array(
              'path' => 'v1alpha1/comments:analyze',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'suggestscore' => array(
              'path' => 'v1alpha1/comments:suggestscore',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
